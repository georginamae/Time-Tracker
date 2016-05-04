<?php
function authenticate($role){
	if($role == 'admin'){
		redirect(base_url('admin'));
	}else if($role == 'user'){
		redirect(base_url('user'));
	}else{
		redirect(base_url('login'));
	}
}
function get_header($title,$class){
	$data['class'] = $class;
	$data['title'] = $title;
	$helper = &get_instance();
	$helper->load->view('includes/header',$data);
}
function get_navbar($role){
	$helper = &get_instance();
	if($role == "admin"){
		$helper->load->view('includes/admin-nav');
	}else{
		$helper->load->view('includes/user-nav');
	}
}
function get_footer(){
	$helper = &get_instance();
	$helper->load->view('includes/footer');
}
function test(){
	return "Hello World";
}
function get_breadcrumbs($current){
	$helper = &get_instance();
	$data['current'] = $current;
	return $helper->load->view('includes/breadcrumbs',$data);
}
function get_topbar(){
	$helper = &get_instance();
	return $helper->load->view('includes/topbar');
}
function page_title($icon,$title){
	$helper = &get_instance();
	$data['icon'] = $icon;
	$data['title'] = $title;
	return $helper->load->view('includes/page-title',$data);
}
function pid(){
	$helper = &get_instance();
	return $helper->session->userdata('user_id');
}
function generateRandomString($limit){
	clearRandomString();
	$seed = str_split('abcdefghijklmnopqrstuvwxyz'
					 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
					 .'0123456789_'); // and any other characters
	shuffle($seed); // probably optional since array_is randomized; this may be redundant
	$rand = '';
	foreach (array_rand($seed, $limit) as $k){
		$rand .= $seed[$k];	
	}
	
	$helper = &get_instance();
	$holder = array(
			'char_holder' => $rand
	);
	$helper->session->set_userdata($holder);
}
function getRandomString(){
	$helper = &get_instance();
	return $helper->session->userdata('char_holder');
}
function clearRandomString(){
	$helper = &get_instance();
	return $helper->session->unset_userdata('char_holder');
}
function system_date_format($date){
	$helper = &get_instance();	
	$format = $helper->get_data->getSettings('SystemDate');
	return date(''.$format[0]->Value.'',strtotime($date));
}
function system_time_format($time){
	$helper = &get_instance();	
	$format = $helper->get_data->getSettings('SystemTime');
	return date(''.$format[0]->Value.'',strtotime($time));
}
function getLastPID(){
	$helper = &get_instance();	
	$PID = $helper->get_data->latestPID();
	$return = $PID[0]->last;
	return $return;
}
function projectStatusHelper($status){
	$return="";
	if($status == 0){
		$return = "Deleted";
	}else if($status == 1){
		$return = "In progress";
	}else if($status == 2){
		$return = "Done";
	}
	return $return;
}
function getAvailableSubCategoryViaCatID($catID){
	$helper = &get_instance();	
	$cat = $helper->get_data->getAvailableSubCategoryViaCatID($catID);
	$return = $cat;
	return $return;
}
function getDevViaSubCatID($subcatID,$projID){
	$helper = &get_instance();	
	$dev = $helper->get_data->getDevViaSubCatID($subcatID,$projID);
	$return = $dev;
	return $return;
}
function getDevViaCatID($catID,$projID){
	$helper = &get_instance();	
	$dev = $helper->get_data->getDevViaCatID($catID,$projID);
	$return = $dev;
	return $return;
}
function getTaskViaPersonalInfoID($pID,$ProjID,$subcatID){
	$helper = &get_instance();	
	$task = $helper->get_data->getTaskViaPersonalInfoID($pID,$ProjID,$subcatID);
	$return = $task;
	return $return;
}
function getRecentTaskID(){
	$helper = &get_instance();	
	$taskID = $helper->get_data->getRecentTaskID();
	$return = $taskID[0]->TaskID;
	return $return;	
}
function getData($selector,$table,$condition){
	$helper = &get_instance();	
	$return = $helper->get_data->getData($selector,$table,$condition);
	return $return;
}
function totalTaskHourPerDev($TaskID,$DevID){
	$helper = &get_instance();	
	$return = $helper->get_data->totalTaskHourPerDev($TaskID,$DevID);
	return $return[0]->sum;
}
function getTaskFeed($date){
	$helper = &get_instance();	
	$return = $helper->get_data->getTaskFeed($date);
	return $return[0]->cnt;
}
function getDevTaskFeed($pid,$date){
	$helper = &get_instance();	
	$return = $helper->get_data->getDevTaskFeed($pid,$date);
	return $return[0]->cnt;
}