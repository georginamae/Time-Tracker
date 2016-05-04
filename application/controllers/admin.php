<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class admin extends CI_Controller {

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
			'user_role'      => $role             
		);
		
		if($role!="admin"){
			authenticate($role);
		}
	}
	public function index(){
		$data = $this->attributes;
		$data['selected'] = "dashboard";
		$data['time_entry_dev'] = $this->get_data->getDeveloperTimeEntry();
		$data['rates'] = $this->get_data->getRate();
		$data['project'] = $this->get_data->getCount("ProjectID","tbl_projects","WHERE Status = 1 ");
		$data['task'] = $this->get_data->getCount("TaskID","tbl_tasks","WHERE TaskPercentage != 100 ");
		$data['user'] = $this->get_data->getCount("tbl_personalinfo.PersonalInfoID","tbl_personalinfo"," JOIN tbl_login ON tbl_personalinfo.PersonalInfoID = tbl_login.PersonalInfoID  WHERE tbl_login.Status != 0 ");
		$data['recent_projects'] = $this->get_data->getProjects();
		$data['developers'] = $this->get_data->getDeveloperLoad();
		$this->load->view('admin/dashboard',$data);
	}
	public function view($module){
		$data = $this->attributes;
		
		//Profile View
		if($module == "profile"){
			$data['selected'] = "profile";
			$this->load->view('admin/profile',$data);
		}
		//Settings View
		else if($module == "settings"){
			$data['selected'] = "settings";
			$data['date_format'] = $this->get_data->getSettings("SystemDate");
			$data['time_format'] = $this->get_data->getSettings("SystemTime");
			$data['forgot_password'] = $this->get_data->getSettings("ForgotPassword");
			$data['site_url'] = $this->get_data->getSettings("UnsecuredSiteAddress");
			$data['website_title'] = $this->get_data->getSettings("WebsiteTitle");
			$data['system_mailer'] = $this->get_data->getSettings("SystemMailer");
			$data['system_sender'] = $this->get_data->getSettings("SystemSender");
			$this->load->view('admin/settings',$data);
		}
		//Companies View
		else if($module == "companies"){
			$data['openable'] = "companies";
			$data['selected'] = "view-companies";
			$data['companies'] = $this->get_data->getCompanies();
			$this->load->view('admin/companies',$data);
		}	
		//Deleted Companies View
		else if($module == "deleted-companies"){
			$data['openable'] = "companies";
			$data['selected'] = "deleted-companies";
			$data['companies'] = $this->get_data->getDeletedCompanies();
			$this->load->view('admin/deleted-companies',$data);
		}
		//Add Company View
		else if($module == "add-company"){
			$data['openable'] = "companies";
			$data['selected'] = "add-company";
			$this->load->view('admin/add-company',$data);
		}
		//Users view
		else if($module == "users"){
			$data['openable'] = "users";
			$data['selected'] = "view-users";
			$data['users'] = $this->get_data->getUsers();
			$this->load->view('admin/users',$data);
		}
		//Add users view
		else if($module == "add-user"){
			$data['openable'] = "users";
			$data['selected'] = "add-user";
			$data['department'] = $this->get_data->getDepartments();
			$this->load->view('admin/add-user',$data);
		}
		//Deactivated Users View
		else if($module == "deactivated-users"){
			$data['openable'] = "users";
			$data['selected'] = "deactivated-users";
			$data['users'] = $this->get_data->getDeactivatedUsers();
			$this->load->view('admin/deactivated-users',$data);
		}
		//Deactivated Projects
		else if($module == "deactivated-projects"){
			$data['openable'] = "projects";
			$data['selected'] = "deactivated-projects";
			$data['projects'] = $this->get_data->getDeactivatedProjects();
			$this->load->view('admin/deactivated-projects',$data);
		}
		//Departments view
		else if($module == "departments"){
			$data['openable'] = "departments";
			$data['selected'] = "view-departments";
			$data['departments'] = $this->get_data->getDepartments();
			$this->load->view('admin/departments',$data);
		}
		//Deactivated Departments View
		else if($module == "deactivated-departments"){
			$data['openable'] = "departments";
			$data['selected'] = "deactivated-departments";
			$data['departments'] = $this->get_data->getDeletedDepartments();
			$this->load->view('admin/deactivated-departments',$data);
		}
		//Add Departments View
		else if($module == "add-department"){
			$data['openable'] = "departments";
			$data['selected'] = "add-department";
			$this->load->view('admin/add-departments',$data);
		}
		//Users view
		else if($module == "rates"){
			$data['openable'] = "rates";
			$data['selected'] = "view-rates";
			$data['rates'] = $this->get_data->getRate();
			$this->load->view('admin/rates',$data);
		}
		//Project View
		else if($module == "projects"){
			$data['openable'] = "projects";
			$data['selected'] = "view-projects";
			$data['projects'] = $this->get_data->getProjects();
			$this->load->view('admin/projects',$data);
		}
		//Add Project View
		else if($module == "add-project"){
			$data['openable'] = "projects";
			$data['selected'] = "add-project";
			$data['company'] = $this->get_data->getCompanies();
			$this->load->view('admin/add-project',$data);
		}
		//Single Task View
		else if($module == "single-task"){
			$data['openable'] = "tasks";
			$data['selected'] = "single-task";
			$data['users']  = $this->get_data->getAllUsers();
			$data['category'] = $this->get_data->getCategories();
			$data['projects'] = $this->get_data->getProjects();
			$this->load->view('admin/single-task',$data);
		}
		//Joint Task View
		else if($module == "joint-task"){
			$data['openable'] = "tasks";
			$data['selected'] = "joint-task";
			$data['category'] = $this->get_data->getCategories();
			$data['users']  = $this->get_data->getAllUsers();
			$data['projects'] = $this->get_data->getProjects();
			$this->load->view('admin/joint-task',$data);
		}
		//Pending Task
		else if($module == "pending-task"){
			$data['openable'] = "tasks";
			$data['selected'] = "pending-task";
			$data['tasks'] = $this->get_data->getPendingTaskAndDev();
			$this->load->view('admin/pending-task',$data);
		}
		/*Filter Tasks*/
		else if($module == "filter-tasks"){
			$data['openable'] = "tasks";
			$data['selected'] = "filter-tasks";	
			$data['tasks'] = $this->get_data->getAllTasks();
			$this->load->view('admin/filter-tasks',$data);
		}
		/*timesheet*/
		else if($module == "timesheet"){
			$data['selected'] = "timesheet";	
			$data['time_entry'] = $this->get_data->getTimesheet();
			$this->load->view('admin/timesheet',$data);
		}
		//Default View
		else{
			redirect(base_url('admin'));
		}
	}
	public function load($module,$args){
		$data = $this->attributes;
		//Load Company View
		if($module == "company"){
			$data['openable'] = "companies";
			$data['company'] = $this->get_data->getCompanyViaID($args);
			$this->load->view('admin/load-company',$data);
		}	
		//Load User View
		else if($module == "users"){
			$data['openable'] = "users";
			$data['edit_user'] = $this->get_data->getPersonalInfoViaID($args);
			$data['edit_dp'] = $this->get_data->getDpViaID($args);
			$data['departments'] = $this->get_data->getDepartments();
			$this->load->view('admin/load-user',$data);
		}	
		//Load Department
		else if($module == "departments"){
			$data['openable'] = "departments";
			$data['department'] = $this->get_data->getDepartmentViaID($args);
			$this->load->view('admin/load-department',$data);
		}		
		//Load Project
		else if($module == "project"){
			$data['openable'] = "projects";
			$data['project'] = $this->get_data->getProjectViaID($args);
			$data['company'] = $this->get_data->getCompanies();
			$data['total_hours'] = $this->get_data->getTaskAndDevViaProjectID($args);
			$data['rendered'] = $this->get_data->countHourPerProjectViaID($args);
			$data['category_name'] = $this->get_data->getCategoryViaProjectID($args);
			$this->load->view('admin/load-project',$data);
		}
		//Ajax Call sub category
		else if($module == "ajax-subcat"){
			$data['subcat'] = $this->get_data->getSubcatViaCatID($args);
			$this->load->view('admin/ajax-sub-cat',$data);
		}
		//Ajax Call Filter
		else if($module == "ajax-filter"){
			if($args == "all"){
				$data['tasks'] = $this->get_data->getAllTasks();
			}else if($args == "pending"){
				$data['tasks'] = $this->get_data->getFilteredTasks("WHERE a.TaskPercentage!=100");
			}else if($args == "finish"){
				$data['tasks'] = $this->get_data->getFilteredTasks("WHERE a.TaskPercentage=100");
			}else if($args == "low"){
				$data['tasks'] = $this->get_data->getFilteredTasks("WHERE a.PriorityLevel='low'");
			}else if($args == "med"){
				$data['tasks'] = $this->get_data->getFilteredTasks("WHERE a.PriorityLevel='medium'");
			}else if($args == "high"){
				$data['tasks'] = $this->get_data->getFilteredTasks("WHERE a.PriorityLevel='high'");
			}
			$this->load->view('admin/ajax-filter',$data);
		}
		//Load Task
		else if($module == "tasks"){
			$data['assigned_date'] = getData('AssignedDate','tbl_assignment','WHERE TaskID = '.$args.' ');
			$data['developers'] = $this->get_data->getDevelopers($args);
			$data['task'] = $this->get_data->getTaskViaID($args);
			$data['total_hours'] = getData('SUM(RenderedHours) as TotalHours','tbl_time_entry','WHERE TaskID = '.$args.' ');
			$data['dev'] = getData('FName,LName','tbl_assignment as a JOIN tbl_personalinfo as b ON a.AssignedTo = b.PersonalInfoID','WHERE a.TaskID = '.$args.' ');
			$this->load->view('admin/load-task',$data);
		}		
		//Timesheet
		else if($module == "timesheet"){	
			$data['timesheet'] = $this->get_data->getTimesheetViaID($args);
			$this->load->view('admin/load-timesheet',$data);
		}			
		//Default View
		else{
			redirect(base_url('admin'));
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
				redirect(base_url('admin/view/profile'));
			}
			//Save user login info
			if($module == "save-user-login"){
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
						$data['upload-response'] = $this->edit_data->uploadDpViaID($hdID,getRandomString().'.'.$file['extension']);
						
						move_uploaded_file($_FILES['fileDP']['tmp_name'], $file['path'].getRandomString().'.'.$file['extension']);	
						clearRandomString();					
					}					
				}	
				
				$data['response'] = $this->edit_data->updateLoginViaID($hdID,$txtUsername,$txtPassword,$txtEmail);
				
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
				redirect(base_url('/admin/load/users/'.$hdID.''));
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
				redirect(base_url('admin/view/profile'));			
			}
			//Save User Role
			else if($module == "save-user-role"){
				$data['response'] = $this->edit_data->updateUserRole($hdID,$drpRole);
				$data['department_response'] = $this->edit_data->updateUserDepartment($hdID,$drpDepartment);
				if($data['response']){
					if($data['department_response']){
						$response = array(
							'role' => "success"
						);
					}else{
						$response = array(
							'role' => "error"
						);
					}
				}else{
					$response = array(
						'role' => "error"
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('/admin/load/users/'.$hdID.''));			
			}
			//Save user personal info
			else if($module == "save-user-profile"){
				$data['response'] = $this->edit_data->updateProfileViaID($hdID,$txtFname,$txtMName,$txtLName,$txtBday,$rdGender);
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
				redirect(base_url('admin/load/users/'.$hdID.''));				
			}
			//Save Settings 
			else if($module == "save-settings"){				
				$data['date'] = $this->edit_data->saveSettings($txtDate,"SystemDate");
				$data['time'] = $this->edit_data->saveSettings($txtTime,"SystemTime");
				$data['forgot'] = $this->edit_data->saveSettings($chkForgot,"ForgotPassword");
				$data['site_url'] = $this->edit_data->saveSettings($txtSiteUrl,"UnsecuredSiteAddress");
				$data['system_sender'] = $this->edit_data->saveSettings($txtSystemSender,"SystemSender");
				$data['system_mailer'] = $this->edit_data->saveSettings($txtSystemMailer,"SystemMailer");
				$data['website_name'] = $this->edit_data->saveSettings($txtSiteTitle,"WebsiteTitle");
				if($data['date']){
					if($data['system_mailer']){
						$response = array(
							'settings' => "success"
						);
					}
				}else{
					$response = array(
						'settings' => "error"
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/view/settings'));
			}
			//Delete Companies
			else if($module == "delete-companies"){	
				if($bulk == "del"){
					foreach($companies as $companyID){
						$data['delete'] = $this->edit_data->deactivate($companyID,"CompanyID","tbl_company");
					}
					if($data['delete']){
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
				redirect(base_url('admin/view/companies'));
			}
			//Activate Companies
			else if($module == "activate-companies"){	
				if($bulk == "activate"){
					foreach($companies as $companyID){
						$data['activate'] = $this->edit_data->activate($companyID,"CompanyID","tbl_company");
					}
					if($data['activate']){
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
				redirect(base_url('admin/view/deleted-companies'));
			}
			//Edit Company 
			else if($module == "edit-company"){	
				$data['response'] = $this->edit_data->editSaveCompany($txtCompanyName,$txtContactPerson,$txtContactNumber,$txtEmailAddress,$txtWebsite,addslashes($txtCompanyDesc),$hdID);
				if($data['response']){
					$response = array(
						'resp' => "success"
					);
				}else{
					$response = array(
						'resp' => "failed"
					);					
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/load/company/'.$hdID.''));
			}
			//Save Company 
			else if($module == "add-company"){	
				$data['response'] = $this->add_data->addCompany($txtCompanyName,$txtContactPerson,$txtContactNumber,$txtEmailAddress,$txtWebsite,addslashes($txtCompanyDesc));
				if($data['response']){
					$response = array(
						'resp' => "success"
					);
				}else{
					$response = array(
						'resp' => "failed"
					);					
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/view/add-company'));
			}
			//Delete Users
			else if($module == "delete-users"){	
				if($bulk == "del"){
					foreach($users as $personalInfoID){
						$data['delete'] = $this->edit_data->deactivate($personalInfoID,"PersonalInfoID","tbl_login");
					}
					if($data['delete']){
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
				redirect(base_url('admin/view/users'));
			}
			//Activate Users
			else if($module == "activate-users"){	
				if($bulk == "activate"){
					foreach($users as $personalInfoID){
						$data['delete'] = $this->edit_data->activate($personalInfoID,"PersonalInfoID","tbl_login");
					}
					if($data['delete']){
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
				redirect(base_url('admin/view/deactivated-users'));
			}
			else if($module == "add-user"){
				$data['response'] = $this->add_data->addUser($txtKey,$txtFName,$txtMName,$txtLName,$drpDepartment,$txtEmail,$txtBday,$drpgender,$txtUsername,$txtPassword,$drpRole);
				if($data['response']){
					$response = array(
						'resp' => 'success'
					);
				}else{
					$response = array(
						'resp' => 'failed'
					);
				}
				$this->session->set_flashdata($response);
				redirect('/admin/view/add-user');
			}
			//Add Department
			else if($module == "add-department"){
				$data['response'] = $this->add_data->addDepartment($txtDepartmentName,addslashes($txtDepartmentDesc));
				if($data['response']){
					$response = array(
						'resp' => 'success'
					);
				}else{
					$response = array(
						'resp' => 'failed'
					);
				}
				$this->session->set_flashdata($response);
				redirect('/admin/view/add-department');
			}
			//Delete Departments
			else if($module == "deactivate-departments"){	
				if($bulk == "del"){
					foreach($departments as $departmentID){
						$data['delete'] = $this->edit_data->deactivate($departmentID,"departmentID","tbl_department");
					}
					if($data['delete']){
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
				redirect(base_url('admin/view/departments'));
			}
			//Activate Departments
			else if($module == "activate-departments"){	
				if($bulk == "activate"){
					foreach($departments as $departmentID){
						$data['delete'] = $this->edit_data->activate($departmentID,"departmentID","tbl_department");
					}
					if($data['delete']){
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
				redirect(base_url('admin/view/deactivated-departments'));
			}
			//Edit Department 
			else if($module == "edit-department"){	
				$data['response'] = $this->edit_data->editSaveDepartment($hdID,$txtDepartmentName,addslashes($txtDepartmentDesc));
				if($data['response']){
					$response = array(
						'resp' => "success"
					);
				}else{
					$response = array(
						'resp' => "failed"
					);					
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/load/departments/'.$hdID.''));
			}
			//Edit Rates 
			else if($module == "edit-rates"){	
				$data['response'] = $this->edit_data->editRate($hdID,$txtRate);
				if($data['response']){
					$response = array(
						'resp' => "success"
					);
				}else{
					$response = array(
						'resp' => "failed"
					);					
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/view/rates/'.$hdID.''));
			}
			//activate Projects
			else if($module == "activate-projects"){	
				if($bulk == "activate"){
					foreach($projects as $ProjectID){
						$data['delete'] = $this->edit_data->activate($ProjectID,"ProjectID","tbl_projects");
					}
					if($data['delete']){
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
				redirect(base_url('admin/view/deactivated-projects'));
			}
			//Delete Projects
			else if($module == "delete-projects"){	
				if($bulk == "del"){
					foreach($projects as $ProjectID){
						$data['delete'] = $this->edit_data->deactivate($ProjectID,"ProjectID","tbl_projects");
					}
					if($data['delete']){
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
				redirect(base_url('admin/view/projects'));
			}
			//Activate Users
			else if($module == "activate-users"){	
				if($bulk == "activate"){
					foreach($users as $personalInfoID){
						$data['delete'] = $this->edit_data->activate($personalInfoID,"PersonalInfoID","tbl_login");
					}
					if($data['delete']){
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
				redirect(base_url('admin/view/deactivated-users'));
			}
			//Add Project 
			else if($module == "add-project"){	
				$data['response'] = $this->add_data->addProject($txtProjectTitle,addslashes($txtProjectDesc),$txtExpected,$txtDeadline,$drpCompany);
				if($data['response']){
					$response = array(
						'resp' => "success"
					);
				}else{
					$response = array(
						'resp' => "failed"
					);					
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/view/add-project'));
			}
			else if($module == "edit-project"){	
				$data['response'] = $this->edit_data->editProject($txtProjectTitle,addslashes($txtProjectDesc),$txtExpected,$drpCompany,$txtDeadline,$drpStatus,$hdID);
				if($data['response']){
					$response = array(
						'resp' => "success"
					);
				}else{
					$response = array(
						'resp' => "failed"
					);					
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/load/project/'.$hdID.''));
			}
			else if($module =="assign-single-task"){
				if(!isset($drpSubcat)){
					$drpSubcat = 0;
				}
				$data['add_task'] = $this->add_data->addTask($drpProject,$txtTaskName,addslashes($txtTaskDesc),$drpPrio,$drpCat,$drpSubcat,$txtExpected);
					if($data['add_task']){
						$data['assign_task'] = $this->add_data->assignTask($drpDev,pid());
							if($data['assign_task']){
								//SEND EMAIL TO DEV HERE//
								/*EMAIL SETTINGS*/
									$this->load->library('email');
									$config = array(
									  'mailtype' => 'html'
									);
									$this->email->initialize($config);
									$systemEmail = $this->get_data->getSettings("SystemMailer");
									$systemSender = $this->get_data->getSettings("SystemSender");
									$devEmail     = getData('EmailAddress','tbl_personalinfo','WHERE PersonalInfoID = '.$drpDev.' ');
								/*END EMAIL SETTINGS*/		
								$content = '
									<html> 
										<head></head>
										<body>
											<h1>New task has been assigned to you!</h1><br/><br/>
											<b>TASK NAME :</b> '.$txtTaskName.'<br/>
											<b>TASK DESC :</b> '.$txtTaskDesc.'<br/><br/>
											This is system generated, do not reply.
										</body>
									</html>';
								
								$this->email->from(''.$systemEmail[0]->Value.'', ''.$systemSender[0]->Value.'');
								$this->email->to($devEmail[0]->EmailAddress); 
								$this->email->subject('New Task Notification');
								$this->email->message($content);						
								$this->email->send();									
								//SEND EMAIL//
								$response = array(
									'resp'  => 'success'
								);
							}else{
								$response = array(
									'resp'  => 'failed'
								);
							}
					}else{
						$response = array(
							'resp'  => 'failed'
						);						
					}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/view/single-task'));			
			}
			else if($module =="assign-joint-task"){
				if(!isset($drpSubcat)){
					$drpSubcat = 0;
				}
				$data['add_task'] = $this->add_data->addTask($drpProject,$txtTaskName,addslashes($txtTaskDesc),$drpPrio,$drpCat,$drpSubcat,$txtExpected);
				/*EMAIL SETTINGS*/
				$this->load->library('email');
				$config = array(
					'mailtype' => 'html'
				);
				/*END EMAIL SETTINGS*/	
				$this->email->initialize($config);		
				$systemEmail = $this->get_data->getSettings("SystemMailer");
				$systemSender = $this->get_data->getSettings("SystemSender");				
				foreach($drpDev as $PersonalInfoID){
					$data['assign_task'] = $this->add_data->assignTask($PersonalInfoID,pid());
					//SEND EMAIL TO DEV HERE//
					$devEmail = getData('EmailAddress','tbl_personalinfo','WHERE PersonalInfoID = '.$PersonalInfoID.' ');
					$content = '
						<html> 
							<head></head>
							<body>
								<h1>New task has been assigned to you!</h1><br/><br/>
								<b>TASK NAME :</b> '.$txtTaskName.'<br/>
								<b>TASK DESC :</b> '.$txtTaskDesc.'<br/><br/>
								This is system generated, do not reply.
							</body>
						</html>';	
						$this->email->from(''.$systemEmail[0]->Value.'', ''.$systemSender[0]->Value.'');
						$this->email->to($devEmail[0]->EmailAddress); 
						$this->email->subject('New Task Notification');
						$this->email->message($content);						
						$this->email->send();						
					//SEND EMAIL//
				}
				if($data['assign_task']){	
					$response = array(
						'resp'  => 'success'
					);
				}else{
					$response = array(
						'resp'  => 'failed'
					);
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/view/joint-task'));	
			}
			else if($module == "edit-task"){
				if(isset($developers)){
					foreach($developers as $developerID){
						$data['assign_dev'] = $this->add_data->addTaskToDev($developerID,pid(),$hdID);
					}
					$response = array(
						'resp'  => 'success'
					);					
				}else{
					$data['edit_tbl_tasks'] = $this->edit_data->editTask($hdID,$txtTaskName,addslashes($txtTaskDesc),$txtExpectedHour,$txtProgress,$drpPrio);
						if($data['edit_tbl_tasks']){
							$response = array(
								'resp'  => 'success'
							);					
						}else{
							$response = array(
								'resp'  => 'falied'
							);							
						}
				}
				$this->session->set_flashdata($response);
				redirect(base_url('admin/load/tasks/'.$hdID.''));
			}
			//Add Time Entry
			else if($module == "add-time-entry"){
				$data['tbl_assignment'] = $this->add_data->addTimeEntry(pid(),$txtID,$txtHours,addslashes($txtTimeEntryDesc));
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
				redirect(base_url('admin/view/pending-task'));			
			}			
			//No module, default View.
			else{
				redirect(base_url('admin'));
			}
		}
		
	}
	public function debug(){
		 generateRandomString(40);

	}
	public function backup($redirect){
       $this->load->dbutil();   
       $backup =& $this->dbutil->backup();  
       $this->load->helper('file');
		header("Content-Disposition: attachment; filename=\"" . basename("database_backup_".date('Y-m-d').".zip") . "\"");
		header("Content-Type: application/force-download");
		header("Content-Length: " . filesize($File));
		header("Connection: close");
       write_file(getcwd().'/assets/bak/database_backup_'.date('Y-m-d').'.zip', $backup); 
	   redirect($redirect);
	}
}
