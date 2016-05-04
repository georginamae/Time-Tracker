<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class add_data extends CI_Model {

	public function addCompany($txtCompanyName,$txtContactPerson,$txtContactNumber,$txtEmailAddress,$txtWebsite,$txtCompanyDesc){
		$sql = "INSERT INTO tbl_company (CompanyName,CompanyDesc,ContactPerson,ContactNumber,EmailAddress,Website)
		VALUES ('".$txtCompanyName."','".$txtCompanyDesc."','".$txtContactPerson."','".$txtContactNumber."','".$txtEmailAddress."','".$txtWebsite."')";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}
		$result->free_result();	
	}
	public function addUser($txtKey,$txtFName,$txtMName,$txtLName,$drpDepartment,$txtEmail,$txtBday,$drpgender,$txtUsername,$txtPassword,$drpRole){
		$sql = "INSERT INTO tbl_personalinfo (DepartmentID,FName,MName,LName,EmailAddress,Gender,Birthday) 
				VALUES ('".$drpDepartment."','".$txtFName."','".$txtMName."','".$txtLName."','".$txtEmail."','".$drpgender."','".$txtBday."')";
		$result = $this->db->query($sql);		
		if($result){
			$resp = $this->addLogin($txtKey,$txtPassword,$txtUsername,$drpRole);
			if($resp){
				return true;
			}
		}else{
			return false;
		}
	}
	public function addLogin($txtKey,$txtPassword,$txtUsername,$drpRole){
		$sql = "INSERT INTO tbl_login(PersonalInfoID,Username,Password,`Key`,Role)
				VALUES ('".getLastPID()."','".$txtUsername."','".$txtPassword."','".$txtKey."','".$drpRole."')";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}	
	}
	public function addDepartment($txtDepartmentName,$txtDepartmentDesc){
		$sql = "INSERT INTO tbl_department(DepartmentName,DepartmentDesc)
				VALUES ('".$txtDepartmentName."','".$txtDepartmentDesc."')";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}	
	}
	public function addProject($txtProjectTitle,$txtProjectDesc,$txtExpected,$txtDeadline,$drpCompany){
		$sql = "INSERT INTO tbl_projects(CompanyID,ProjectCreator,ProjectName,ProjectDesc,ProjectHours,Deadline)
				VALUES ('".$drpCompany."','".pid()."','".$txtProjectTitle."','".$txtProjectDesc."','".$txtExpected."','".$txtDeadline."')";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}	
	}
	public function addTask($drpProject,$txtTaskName,$txtTaskDesc,$drpPrio,$drpCat,$drpSubcat,$txtExpected){
		$sql = "INSERT INTO tbl_tasks(ProjectID,CategoryID,SubcategoryID,TaskName,TaskDesc,PriorityLevel,ExpectedHour)
				VALUES ('".$drpProject."','".$drpCat."','".$drpSubcat."','".$txtTaskName."','".$txtTaskDesc."','".$drpPrio."','".$txtExpected."')";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}	
	}	
	public function assignTask($drpDev,$assigner){
		$sql = "INSERT INTO tbl_assignment(TaskID,AssignedTo,AssignedBy)
				VALUES('".getRecentTaskID()."','".$drpDev."','".$assigner."')";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}	
	}	
	public function addTaskToDev($drpDev,$assigner,$taskID){
		$sql = "INSERT INTO tbl_assignment(TaskID,AssignedTo,AssignedBy)
				VALUES('".$taskID."','".$drpDev."','".$assigner."')";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}	
	}		
	public function addTimeEntry($inputtedBy,$TaskID,$txtHours,$txtTimeEntryDesc){
		$sql = "INSERT INTO tbl_time_entry(TaskID,RenderedHours,TaskComment,InputedBy)
				VALUES('".$TaskID."','".$txtHours."','".$txtTimeEntryDesc."','".$inputtedBy."')";
		$result = $this->db->query($sql);		
		if($result){
			return true;
		}else{
			return false;
		}	
	}		
		
	
}