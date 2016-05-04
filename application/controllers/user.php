<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class user extends CI_Controller {

	protected $attributes;
	
	public function __construct(){
		parent::__construct();
		$role = $this->session->userdata('role');
		
		$this->attributes = array(
			'dp'             => $this->get_data->getDpViaID(pid()),
			'personal_info'  => $this->get_data->getPersonalInfoViaID(pid()),
			'selected'       => "",
			'openable'       => "",
			'website_title'  => $this->get_data->getSettings("WebsiteTitle"),
			'pending_count'  => getData('COUNT(a.TaskID) as cnt','tbl_assignment as a JOIN tbl_tasks as b ON a.TaskID = b.TaskID','WHERE AssignedTo = "'.pid().'" and b.TaskPercentage!=100 '),
			'user_role'      => $role
		);
		
		if($role!="user"){
			authenticate($role);
		}
	}
	public function index(){
		$data = $this->attributes;
		$monday = date( 'Y-m-d', strtotime( 'monday this week' )  );
		$friday = date( 'Y-m-d', strtotime( 'friday this week' ) );
		$data['high'] = $this->get_data->getCount("a.TaskID","tbl_tasks as a JOIN tbl_assignment as b ON a.TaskID = b.TaskID","WHERE TaskPercentage != 100 AND PriorityLevel = 'high' AND b.AssignedTo = '".pid()."'");
		$data['task'] = $this->get_data->getCount("a.TaskID","tbl_tasks as a JOIN tbl_assignment as b ON a.TaskID = b.TaskID","WHERE TaskPercentage != 100 AND b.AssignedTo = '".pid()."' ");
		//weekly $data['total_time'] = getData('SUM(RenderedHours) as total','tbl_time_entry','WHERE InputedBy = "'.pid().'" AND (DateInputted <= "'.$friday.'" AND DateInputted >= "'.$monday.'") ');
		$data['total_time'] = getData('SUM(RenderedHours) as total','tbl_time_entry','WHERE InputedBy = "'.pid().'" AND (DateInputted LIKE "'.date('Y-m-d').'%") ');
		
		$this->load->view('user/dashboard',$data);
	}
	public function view($module){
		$data = $this->attributes;
		
		//Profile View
		if($module == "profile"){
			$data['selected'] = "profile";
			$this->load->view('user/profile',$data);
		}
		else if($module == "pending-task"){
			$data['openable'] = "tasks";
			$data['selected'] = "pending-task";
			$data['tasks'] = $this->get_data->getPendingTaskperDev(pid());
			$this->load->view('user/pending-task',$data);
		}		
		else if($module == "timesheet"){
			$data['selected'] = "timesheet";	
			$data['time_entry'] = $this->get_data->getUserTimesheet(pid());
			$this->load->view('user/timesheet',$data);
		}
		else if($module == "filter-task"){
			$data['openable'] = "tasks";
			$data['selected'] = "filter-tasks";	
			$data['tasks'] = $this->get_data->getTaskperDev(pid());
			$this->load->view('user/filter-task',$data);
		}
		else{
			redirect(base_url('user'));
		}
	}
	public function edit($mode,$module){
		if($mode == null || $module == null){
			redirect(base_url());
		}
		$data = $this->attributes;
		$response;
		//$mode = "view" or "process"
		//$module = "save-login","","save-profile","save-settings"
		//Saving engine
		if($mode == "process"){
			extract($_POST);
			
			//Save login info
			if($module == "save-login"){
				$file['allowed'] = array('gif','png' ,'jpg','jpeg');
				$file['file_name'] = $_FILES['fileDP']['name'];
				$file['extension'] = pathinfo($file['file_name'], PATHINFO_EXTENSION);
				$file['path'] = getcwd().'/assets/img/user-uploads/';
				$data['response'] = false;
				$data['upload-response'] = false;
				
				//Check if there is selected image.
				if($_FILES['fileDP']['size'] != 0){
					if(in_array($file['extension'],$file['allowed'])){		
						generateRandomString(40);
						$data['upload-response'] = $this->edit_data->uploadDpViaID(pid(),getRandomString().'.'.$file['extension']);
						
						move_uploaded_file($_FILES['fileDP']['tmp_name'], $file['path'].getRandomString().'.'.$file['extension']);	
						clearRandomString();					
					}					
				}	
				
				$data['response'] = $this->edit_data->updateLoginViaID(pid(),$txtUsername,$txtPassword,$txtEmail);
				
				if($data['response']){
					$response = array(
						'login' => "success"
					);
				}else{
					$response = array(
						'login' => "error"
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('user/view/profile'));
			}
			//Save personal info
			else if($module == "save-profile"){
				$data['response'] = $this->edit_data->updateProfileViaID(pid(),$txtFname,$txtMName,$txtLName,$txtBday,$rdGender);
				if($data['response']){
					$response = array(
						'profile' => "success"
					);
				}else{
					$response = array(
						'profile' => "error"
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('user/view/profile'));			
			}
			//Add Time Entry
			else if($module == "add-time-entry"){
				$data['tbl_assignment'] = $this->add_data->addTimeEntry(pid(),$txtID,$txtHours,$txtTimeEntryDesc);
				if($data['tbl_assignment']){
					$data['tbl_tasks'] = $this->edit_data->UpdateTaskPercentate($txtID,$txtPercent);
					if($data['tbl_tasks']){
						//SEND EMAIL TO ADMIN HERE//
								/*EMAIL SETTINGS*/
									$this->load->library('email');
									$config = array(
									  'mailtype' => 'html'
									);
									$this->email->initialize($config);
									$systemEmail = $this->get_data->getSettings("SystemMailer");
									$systemSender = $this->get_data->getSettings("SystemSender");
									$adminEmail     = getData('EmailAddress','tbl_personalinfo','WHERE PersonalInfoID = "'.$hdAssignedBy.'" ');
								/*END EMAIL SETTINGS*/		
								$content = '
									<html> 
										<head></head>
										<body>
											<h1>New time entry has been added!</h1><br/><br/>
											<b>TASK ID :</b> '.$txtID.'<br/>
											<b>COMMENT :</b> '.$txtTimeEntryDesc.'<br/>
											<b>HOURS :</b> '.$txtHours.'<br/><br/>
											<b>PROGRESS :</b> '.$txtPercent.'<br/><br/>
											This is system generated, do not reply.
										</body>
									</html>';
								
								$this->email->from(''.$systemEmail[0]->Value.'', ''.$systemSender[0]->Value.'');
								$this->email->to($adminEmail[0]->EmailAddress); 
								$this->email->subject('New time entry has been added.');
								$this->email->message($content);						
								$this->email->send();									
								//SEND EMAIL//
						$response = array(
							'resp' => "success"
						);
					}else{
						$response = array(
							'resp' => "failed"
						);
					}
				}else{
					$response = array(
						'resp' => "failed"
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('user/view/pending-task'));			
			}


			//No module, default View.
			else{
				redirect(base_url('user'));
			}
		}
		
	}
	public function load($module,$args){	
		$data = $this->attributes;
		//Load Task
		if($module == "tasks"){
			$data['openable'] = "tasks";
			$data['assigned_date'] = getData('AssignedDate','tbl_assignment','WHERE TaskID = '.$args.' ');
			$data['developers'] = $this->get_data->getDevelopers($args);
			$data['task'] = $this->get_data->getTaskViaID($args);
			$data['pending_count'] = getData('COUNT(AssignmentID) as cnt','tbl_assignment','WHERE AssignedTo = '.pid().' ');
			$data['total_hours'] = getData('SUM(RenderedHours) as TotalHours','tbl_time_entry','WHERE TaskID = '.$args.' ');
			$data['dev'] = getData('FName,LName','tbl_assignment as a JOIN tbl_personalinfo as b ON a.AssignedTo = b.PersonalInfoID','WHERE a.TaskID = '.$args.' ');
			$this->load->view('user/load-task',$data);
		}	
		//Ajax Call Filter
		else if($module == "ajax-filter"){
			if($args == "all"){
				$data['tasks'] = $this->get_data->getFilteredDevTasks("WHERE  b.AssignedTo = '".pid()."'");
			}else if($args == "pending"){
				$data['tasks'] = $this->get_data->getFilteredDevTasks("WHERE a.TaskPercentage!=100 AND b.AssignedTo = '".pid()."'");
			}else if($args == "finish"){
				$data['tasks'] = $this->get_data->getFilteredDevTasks("WHERE a.TaskPercentage=100 AND b.AssignedTo = '".pid()."'");
			}else if($args == "low"){
				$data['tasks'] = $this->get_data->getFilteredDevTasks("WHERE a.PriorityLevel='low' AND b.AssignedTo = '".pid()."'");
			}else if($args == "med"){
				$data['tasks'] = $this->get_data->getFilteredDevTasks("WHERE a.PriorityLevel='medium' AND b.AssignedTo = '".pid()."'");
			}else if($args == "high"){
				$data['tasks'] = $this->get_data->getFilteredDevTasks("WHERE a.PriorityLevel='high' AND b.AssignedTo = '".pid()."'");
			}
			$this->load->view('user/ajax-filter',$data);
		}
		else if($module == "timesheet"){	
			$data['timesheet'] = $this->get_data->getTimesheetViaID($args);
			$this->load->view('user/load-timesheet',$data);
		}	
		//Default View
		else{
			redirect(base_url('user'));
		}
	}
}
