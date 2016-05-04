<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class get_data extends CI_Model {

	public function validate($username,$password){
		$sql = "SELECT COUNT(LoginID) as cnt FROM  tbl_login";
		$result = $this->db->query($sql);	
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getPersonalInfo($username,$password){
		$sql = "SELECT b.PersonalInfoID,a.Role,a.Username,a.Password  
				FROM  tbl_login as a 
				JOIN tbl_personalinfo as b
				ON a.PersonalInfoID = b.PersonalInfoID
				WHERE (Username='".$username."' && Password='".$password."') ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getPersonalInfoViaID($pid){
		$sql = "SELECT * FROM tbl_login as a
				JOIN tbl_personalinfo as b
				ON a.PersonalInfoID = b.PersonalInfoID
				WHERE a.PersonalInfoID = '".$pid."'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getDpViaID($pid){
		$sql = "SELECT DisplayPic FROM  tbl_personalinfo
				WHERE PersonalInfoID = '".$pid."'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getSettings($settings){
		$sql = "SELECT Value FROM  tbl_settings
				WHERE SettingsName = '".$settings."' ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getResetCount($txtUsername,$txtEmail){
		$sql = "SELECT COUNT(*) as cnt FROM  tbl_personalinfo as a
				JOIN tbl_login as b
				ON a.PersonalInfoID = b.PersonalInfoID
				WHERE (a.EmailAddress = '".$txtEmail."' AND b.Username = '".$txtUsername."') ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getKey($txtUsername,$txtEmail){
		$sql = "SELECT b.Key FROM  tbl_personalinfo as a
				JOIN tbl_login as b
				ON a.PersonalInfoID = b.PersonalInfoID
				WHERE (a.EmailAddress = '".$txtEmail."' AND b.Username = '".$txtUsername."') ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getCompanies(){
		$sql = "SELECT * FROM tbl_company WHERE Status = 1";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getCompanyViaID($ID){
		$sql = "SELECT * FROM tbl_company WHERE Status = 1 AND CompanyID = '".$ID."' ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getDeletedCompanies(){
		$sql = "SELECT * FROM tbl_company WHERE Status = 0";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getUsers(){
		$sql = "SELECT a.PersonalInfoID,a.FName,a.LName,a.MName,a.EmailAddress,a.Gender,a.Birthday,a.DisplayPic,a.DateRegistered,b.Role,c.DepartmentName 
				FROM tbl_personalinfo as a 
				JOIN tbl_login as b 
					ON a.PersonalInfoID = b.PersonalInfoID 
				JOIN tbl_department as c 
					ON a.DepartmentID = c.DepartmentID 
				WHERE b.Status = 1 AND a.PersonalInfoID != '".pid()."'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getDeactivatedUsers(){
		$sql = "SELECT b.LoginID,a.PersonalInfoID,a.FName,a.LName,a.MName,a.EmailAddress,a.Gender,a.Birthday,a.DisplayPic,a.DateRegistered,b.Role FROM tbl_personalinfo as a 
				JOIN tbl_login as b ON a.PersonalInfoID = b.PersonalInfoID 
				WHERE b.Status = 0";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getDepartments(){
		$sql = "SELECT * FROM tbl_department WHERE Status = 1";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getDeletedDepartments(){
		$sql = "SELECT * FROM tbl_department WHERE Status = 0";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function latestPID(){
		$sql = "SELECT PersonalInfoID as last FROM tbl_personalinfo ORDER BY PersonalInfoID DESC LIMIT 1";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}		
	public function getDepartmentViaID($departmentID){
		$sql = "SELECT * FROM tbl_department WHERE DepartmentID = '".$departmentID."' ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getRate(){
		$sql = "SELECT * FROM tbl_rate ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getDeactivatedProjects(){
		$sql = "SELECT b.CompanyName,a.ProjectID,a.ProjectName,a.ProjectDesc,a.ProjectHours,a.Status,c.FName,c.LName
				FROM tbl_projects as a 
				JOIN tbl_company as b
					ON a.CompanyID = b.CompanyID
				JOIN tbl_personalinfo  as c
					ON a.ProjectCreator = c.PersonalInfoID
				WHERE a.Status = 0
				";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getProjects(){
		$sql = "SELECT a.Deadline,b.CompanyName,a.ProjectID,a.ProjectName,a.ProjectDesc,a.ProjectHours,a.Status,c.FName,c.LName
				FROM tbl_projects as a 
				JOIN tbl_company as b
					ON a.CompanyID = b.CompanyID
				JOIN tbl_personalinfo  as c
					ON a.ProjectCreator = c.PersonalInfoID
				WHERE a.Status != 0
				ORDER BY ProjectID DESC
				";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getProjectViaID($ID){
		$sql = "SELECT a.Deadline,a.CompanyID,b.CompanyName,a.ProjectID,a.ProjectName,a.ProjectDesc,a.ProjectHours,a.Status,c.FName,c.LName
				FROM tbl_projects as a 
				JOIN tbl_company as b
					ON a.CompanyID = b.CompanyID
				JOIN tbl_personalinfo  as c
					ON a.ProjectCreator = c.PersonalInfoID
				WHERE a.Status != 0 AND ProjectID = '".$ID."'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function countHourPerProjectViaID($ID){
		$sql = "SELECT SUM(a.RenderedHours) as total 
				FROM tbl_time_entry as a 
				JOIN tbl_tasks as b 
					ON a.TaskID = b.TaskID
				JOIN tbl_projects as c
					ON b.ProjectID = c.ProjectID
				WHERE c.ProjectID = '".$ID."'
				";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getCategoryViaProjectID($ID){
		$sql = "SELECT b.ProjectID,a.CategoryID,a.CategoryName FROM tbl_task_category as a 
				JOIN tbl_tasks as b 
				ON a.CategoryID = b.CategoryID
				WHERE b.ProjectID = '".$ID."' GROUP BY a.CategoryName";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getDevsOnly(){
		$sql = "SELECT a.LName,a.PersonalInfoID,a.Fname FROM tbl_personalinfo as a JOIN tbl_departments as b WHERE b.DepartmentName = 'Developer'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getAvailableSubCategoryViaCatID($ID){
		$sql = "
		SELECT a.SubcategoryID,a.SubcategoryName,c.ProjectID
		FROM tbl_task_subcategory as a 
		JOIN tbl_task_category as b 
			ON a.CategoryID = b.CategoryID     
		JOIN tbl_tasks as c 
			ON c.SubcategoryID = a.SubcategoryID 
		JOIN tbl_assignment as d 
			ON d.TaskID = c.TaskID 
		JOIN tbl_personalinfo as e 
			ON e.PersonalInfoID = d.AssignedTo 
		 WHERE b.CategoryID = '".$ID."'
		 GROUP BY a.SubcategoryName 
		 ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getDevViaSubCatID($subcatID,$projID){
		$sql = "SELECT c.SubcategoryID,c.ProjectID,a.PersonalInfoID,a.LName,a.FName,c.TaskID
				FROM tbl_personalinfo as a 
				JOIN tbl_assignment as b 	
					ON a.PersonalInfoID = b.AssignedTo
				JOIN tbl_tasks as c 
					ON b.TaskID = c.TaskID
				WHERE c.SubCategoryID = '".$subcatID."' AND c.ProjectID = '".$projID."' GROUP BY a.PersonalInfoID";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}	
	public function getDevViaCatID($catID,$projID){
		$sql = "SELECT a.PersonalInfoID,a.LName,a.FName,c.TaskID,c.ProjectID
				FROM tbl_personalinfo as a 
				JOIN tbl_assignment as b 	
					ON a.PersonalInfoID = b.AssignedTo
				JOIN tbl_tasks as c 
					ON b.TaskID = c.TaskID
				WHERE c.CategoryID = '".$catID."' AND c.ProjectID = '".$projID."' GROUP BY a.PersonalInfoID";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getTaskViaPersonalInfoID($pID,$projID,$subcatID){
		$sql = "SELECT a.TaskName,a.TaskID 
				FROM tbl_tasks as a
				JOIN tbl_assignment as b 
					ON a.TaskID = b.TaskID
				JOIN tbl_personalinfo as c 
					ON b.AssignedTo = c.PersonalInfoID
				WHERE c.PersonalInfoID = '".$pID."' AND a.ProjectID = '".$projID."' AND a.SubcategoryID = '".$subcatID."' ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getCategories(){
		$sql = "SELECT * FROM tbl_task_category ORDER BY CategoryName ASC";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}	
	public function getSubcatViaCatID($catID){
		$sql = "SELECT * FROM tbl_task_subcategory
				WHERE CategoryID = '".$catID."'
				ORDER BY SubcategoryName ASC ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}	
	public function getAllUsers(){
		$sql = "SELECT LName,FName,PersonalInfoID FROM tbl_personalinfo
				ORDER BY LName ASC";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getRecentTaskID(){
		$sql = "SELECT TaskID FROM tbl_tasks ORDER BY TaskID DESC LIMIT 1";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();			
	}
	public function getCount($ID,$table,$condition){
		$sql = "SELECT COUNT(".$ID.") as cnt FROM ".$table." ".$condition." ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();			
	}
	public function getDeveloperLoad(){
		$sql = "SELECT PersonalInfoID,LName,FName FROM tbl_personalinfo as a
			JOIN tbl_assignment as b
				ON a.PersonalInfoID = b.AssignedTo
			JOIN tbl_tasks as c
				ON b.TaskID = c.TaskID
			WHERE a.DepartmentID = '1' GROUP BY PersonalInfoID
		";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();			
	}
	public function getData($selector,$table,$condition){
		$sql = "SELECT ".$selector." FROM ".$table." ".$condition." ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getDevelopers($TaskID){
		$sql = "SELECT a.PersonalInfoID,FName,LName 
				FROM tbl_personalinfo as a 
				JOIN tbl_login as b 
					ON a.PersonalInfoID = b.PersonalInfoID 
				WHERE a.DepartmentID = '1' 
				AND a.PersonalInfoID NOT IN 
				(SELECT c.AssignedTo FROM tbl_assignment as c WHERE TaskID = '".$TaskID."') ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getPendingTaskAndDev(){
		$sql = "SELECT d.ProjectName,b.AssignedBy,b.AssignedDate,a.TaskID,a.TaskName,a.PriorityLevel,a.TaskPercentage ,b.AssignedTo,c.LName,c.FName,b.AssignmentID
				FROM tbl_tasks as a
				JOIN tbl_assignment as b
					ON a.TaskID = b.TaskID
				JOIN tbl_personalinfo as c
					ON c.PersonalInfoID = b.AssignedTo
				JOIN tbl_projects as d
					ON a.ProjectID = d.ProjectID
				WHERE TaskPercentage!=100 GROUP BY a.TaskID
				";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getAllTasks(){
		$sql = "SELECT d.ProjectName,b.AssignedDate,a.TaskID,a.TaskName,a.PriorityLevel,a.TaskPercentage ,b.AssignedTo,c.LName,c.FName,b.AssignmentID
				FROM tbl_tasks as a
				JOIN tbl_assignment as b
					ON a.TaskID = b.TaskID
				JOIN tbl_personalinfo as c
					ON c.PersonalInfoID = b.AssignedTo
				JOIN tbl_projects as d
					ON a.ProjectID = d.ProjectID
				GROUP BY a.TaskID
				";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getFilteredTasks($filter){
		$sql = "SELECT d.ProjectName,b.AssignedDate,a.TaskID,a.TaskName,a.PriorityLevel,a.TaskPercentage ,b.AssignedTo,c.LName,c.FName,b.AssignmentID
				FROM tbl_tasks as a
				JOIN tbl_assignment as b
					ON a.TaskID = b.TaskID
				JOIN tbl_personalinfo as c
					ON c.PersonalInfoID = b.AssignedTo
				JOIN tbl_projects as d
					ON a.ProjectID = d.ProjectID
				".$filter." GROUP BY a.TaskID";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getFilteredDevTasks($filter){
		$sql = "SELECT d.ProjectName,b.AssignedDate,a.TaskID,a.TaskName,a.PriorityLevel,a.TaskPercentage ,b.AssignedTo,c.LName,c.FName,b.AssignmentID
				FROM tbl_tasks as a
				JOIN tbl_assignment as b
					ON a.TaskID = b.TaskID
				JOIN tbl_personalinfo as c
					ON c.PersonalInfoID = b.AssignedBy
				JOIN tbl_projects as d
					ON a.ProjectID = d.ProjectID
				".$filter." GROUP BY a.TaskID";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getTaskViaID($TaskID){
		$sql = "SELECT a.TaskID,a.TaskName,a.TaskDesc,a.PriorityLevel,a.ExpectedHour,a.TaskPercentage,b.ProjectName,c.CategoryName,d.SubcategoryName
				FROM tbl_tasks as a
				JOIN tbl_projects as b
					ON a.ProjectID = b.ProjectID
				JOIN tbl_task_category as c
					ON a.CategoryID = c.CategoryID
				LEFT JOIN tbl_task_subcategory as d 
					ON a.SubcategoryID = d.SubcategoryID
				WHERE a.TaskID = '".$TaskID."'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getTaskperDev($PersonalInfoID){
		$sql = "SELECT d.FName,d.LName,a.TaskID,a.TaskName,a.TaskDesc,a.PriorityLevel,a.ExpectedHour,a.TaskPercentage,b.ProjectName,c.AssignedBy,c.AssignedDate
				FROM tbl_tasks as a
				JOIN tbl_projects as b
					ON a.ProjectID = b.ProjectID
				JOIN tbl_assignment as c
					ON c.TaskID = a.TaskID
				JOIN tbl_personalinfo as d
					ON d.PersonalInfoID = c.AssignedBy 
				WHERE c.AssignedTo = '".$PersonalInfoID."'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getPendingTaskperDev($PersonalInfoID){
		$sql = "SELECT d.FName,d.LName,a.TaskID,a.TaskName,a.TaskDesc,a.PriorityLevel,a.ExpectedHour,a.TaskPercentage,b.ProjectName,c.AssignedBy,c.AssignedDate
				FROM tbl_tasks as a
				JOIN tbl_projects as b
					ON a.ProjectID = b.ProjectID
				JOIN tbl_assignment as c
					ON c.TaskID = a.TaskID
				JOIN tbl_personalinfo as d
					ON d.PersonalInfoID = c.AssignedBy 
				WHERE c.AssignedTo = '".$PersonalInfoID."' AND a.TaskPercentage!=100 ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getTaskAndDevViaProjectID($ProjectID){
		$sql = "SELECT c.PersonalInfoID,c.LName,c.FName,a.TaskName,a.TaskID,a.TaskPercentage FROM tbl_tasks as a
				JOIN tbl_assignment as b 
					ON a.TaskID = b.TaskID
				JOIN tbl_personalinfo as c
					ON b.AssignedTo = c.PersonalInfoID
				JOIN tbl_projects as d
					ON d.ProjectID = a.ProjectID
				WHERE d.ProjectID = '".$ProjectID."'
				";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function totalTaskHourPerDev($TaskID,$DevID){
		$sql = "SELECT SUM(RenderedHours) as sum FROM tbl_time_entry 
				WHERE TaskID = '".$TaskID."' AND InputedBy = '".$DevID."' ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();		
	}
	public function getTaskFeed($date){
		$sql = "SELECT COUNT(AssignmentID) as cnt FROM tbl_assignment WHERE AssignedDate LIKE '".$date."%'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getDevTaskFeed($pid,$date){
		$sql = "SELECT COUNT(AssignmentID) as cnt FROM tbl_assignment WHERE AssignedDate LIKE '".$date."%' AND AssignedTo = '".$pid."' ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getDeveloperTimeEntry(){
		$sql = "SELECT a.PersonalInfoID,a.FName,a.LName FROM tbl_personalinfo as a 
				JOIN tbl_time_entry as b 
				ON a.PersonalInfoID = b.InputedBy
				GROUP BY a.PersonalInfoID";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getTimeSheet(){
		$sql = "SELECT c.RenderedHours,c.TaskComment,c.TimeEntryID,a.TaskID,
		d.PersonalInfoID,a.TaskPercentage,d.FName,d.LName,c.InputedBy,c.DateInputted,b.ProjectName,a.TaskName 
				FROM tbl_tasks as a
				JOIN tbl_projects as b
					ON a.ProjectID = b.ProjectID
				JOIN tbl_time_entry as c
					ON c.TaskID = a.TaskID
				JOIN tbl_personalinfo as d
					ON d.PersonalInfoID = c.InputedBy ";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getUserTimesheet($pID){
		$sql = "SELECT c.RenderedHours,c.TaskComment,c.TimeEntryID,a.TaskID,
				e.PersonalInfoID,a.TaskPercentage,e.FName,e.LName,c.InputedBy,c.DateInputted,b.ProjectName,a.TaskName 
				FROM tbl_tasks as a
				JOIN tbl_projects as b
					ON a.ProjectID = b.ProjectID
				JOIN tbl_time_entry as c
					ON c.TaskID = a.TaskID
				JOIN tbl_assignment as d
					ON d.TaskID = a.TaskID
				JOIN tbl_personalinfo as e
					ON e.PersonalInfoID = d.AssignedBy 
				WHERE d.AssignedTo = '".$pID."'";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function getTimesheetViaID($TimeEntryID){
		$sql = "SELECT a.TaskComment,a.RenderedHours,a.DateInputted,b.TaskID,b.TaskPercentage,b.TaskName,c.ProjectID,c.ProjectName,d.FName,d.LName
				FROM tbl_time_entry as a
				JOIN tbl_tasks as b
					ON b.TaskID = a.TaskID
				JOIN tbl_projects as c
					ON c.ProjectID = b.ProjectID
				JOIN tbl_personalinfo as d
					ON d.PersonalInfoID = a.InputedBy
					WHERE a.TimeEntryID = '".$TimeEntryID."' 
				";
		$result = $this->db->query($sql);		
		if($result){
			return $result->result();
		}else{
			return false;
		}
		$result->free_result();	
	}
	
}