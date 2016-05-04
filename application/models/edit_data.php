<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class edit_data extends CI_Model {
	public function updateLoginViaID($pid,$txtUsername,$txtPassword,$txtEmail){
		$sql = "UPDATE tbl_login as a 
				JOIN tbl_personalinfo as b 
				ON a.PersonalInfoID = b.PersonalInfoID				
				SET a.Username = '".$txtUsername."',a.Password = '".$txtPassword."',b.EmailAddress = '".$txtEmail."' 
				WHERE a.PersonalInfoID = '".$pid."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function updateProfileViaID($pid,$txtFname,$txtMName,$txtLName,$txtBday,$rdGender){
		$sql = "UPDATE tbl_personalinfo		
				SET FName = '".$txtFname."',MName = '".$txtMName."',LName = '".$txtLName."', Gender = '".$rdGender."'
				WHERE PersonalInfoID = '".$pid."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function uploadDpViaID($pid,$filename){
		$sql = "UPDATE tbl_personalinfo 
				SET DisplayPic = '".$filename."' 
				WHERE PersonalInfoID = '".$pid."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function saveSettings($value,$settingsName){
		$sql = "UPDATE tbl_settings 
				SET Value = '".$value."' 
				WHERE SettingsName = '".$settingsName."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function resetPassword($hdKey,$txtPassword){
		$sql = "UPDATE tbl_login
				SET Password = '".$txtPassword."' 
				WHERE `Key` = '".$hdKey."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function deactivate($ID,$column_name,$tbl_name){
		$sql = "UPDATE ".$tbl_name."
				SET Status = '0' 
				WHERE ".$column_name." = '".$ID."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function activate($ID,$column_name,$tbl_name){
		$sql = "UPDATE ".$tbl_name."
				SET Status = '1' 
				WHERE ".$column_name." = '".$ID."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function editSaveCompany($txtCompanyName,$txtContactPerson,$txtContactNumber,$txtEmailAddress,$txtWebsite,$txtCompanyDesc,$ID){
		$sql = "UPDATE tbl_company
				SET CompanyName = '".$txtCompanyName."',
				CompanyDesc = '".$txtCompanyDesc."',
				ContactPerson = '".$txtContactPerson."',
				ContactNumber = '".$txtContactNumber."',
				EmailAddress = '".$txtEmailAddress."',
				Website = '".$txtWebsite."'
				WHERE CompanyID = '".$ID."'
				";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function editProject($txtProjectTitle,$txtProjectDesc,$txtExpected,$drpCompany,$txtDeadline,$drpStatus,$ID){
		$sql = "UPDATE tbl_projects
				SET CompanyID = '".$drpCompany."',
				ProjectName = '".$txtProjectTitle."',
				ProjectDesc = '".$txtProjectDesc."',
				Status = '".$drpStatus."',
				Deadline = '".$txtDeadline."',
				ProjectHours = '".$txtExpected."'
				WHERE ProjectID = '".$ID."'
				";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function updateUserRole($ID,$role){
		$sql = "UPDATE tbl_login
				SET Role = '".$role."'
				WHERE LoginID = '".$ID."'
				";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function updateUserDepartment($ID,$departmentID){
		$sql = "UPDATE tbl_personalinfo
				SET DepartmentID = '".$departmentID."'
				WHERE PersonalInfoID = '".$ID."'
				";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function editSaveDepartment($hdID,$txtDepartmentName,$txtDepartmentDesc){
		$sql = "UPDATE tbl_department
				SET DepartmentName = '".$txtDepartmentName."',
				DepartmentDesc = '".$txtDepartmentDesc."'
				WHERE DepartmentID = '".$hdID."'
				";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function	editRate($hdID,$txtRate){
		$sql = "UPDATE tbl_rate
				SET Rate = '".$txtRate."'
				WHERE RateID = '".$hdID."'
				";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function	editTask($TaskID,$txtTaskName,$txtTaskDesc,$txtExpectedHour,$txtProgress,$drpPrio){
		$sql = "UPDATE tbl_tasks
				SET TaskName = '".$txtTaskName."',
				TaskDesc = '".$txtTaskDesc."',
				ExpectedHour = '".$txtExpectedHour."',
				TaskPercentage = '".$txtProgress."',
				PriorityLevel = '".$drpPrio."'
				WHERE TaskID = '".$TaskID."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function	UpdateTaskPercentate($TaskID,$txtPercent){
		$sql = "UPDATE tbl_tasks
				SET TaskPercentage = '".$txtPercent."'
				WHERE TaskID = '".$TaskID."' ";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	
	
}