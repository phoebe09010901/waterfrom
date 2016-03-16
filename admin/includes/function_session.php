<?php
ini_set("session.save_handler", "User");
function open($save_path, $session_name) {
	/*其實這個函式在這裡是沒有作用的*/
	global $sess_save_path, $sess_session_name;
	
	$sess_save_path    = $save_path;
	$sess_session_name = $session_name;
	return true;
}

function close() {
	/*只要直接回傳true就好了*/
	return true;
}

function read($session_id) {		
	$obj_session = new cloud_mysql();
	gc($max_lifetime);
	
	$query = "select * from ".Proj_Name."_sessions where session_id='$session_id'";
	$obj_session->run_mysql_list($query);
          
    if(!$obj_session->obj_all) {	//如果沒有該資料，傳回false
		return false;
	}else {
		$query = "select * from ".Proj_Name."_sessions where session_id='$session_id'";
		$sessions = $obj_session->run_mysql_out($query);
		extract($sessions);
		return $sessions['session_data'];
	}
}

function write($session_id, $session_data) {
	$obj_session = new cloud_mysql();
	$ip          = get_real_ip();
	$query = "select * from ".Proj_Name."_sessions where session_id='$session_id'";
	$obj_session->run_mysql_list($query);
	//如果沒有資料，建立!；有資料，覆寫!
	if(!$obj_session->obj_all) {
    	$query = "insert into ".Proj_Name."_sessions set session_id='$session_id', session_data='$session_data', session_lastused='".time()."', session_ip='$ip'";
		$obj_session->run_mysql($query);
		return true;
	}else {
		$query = "update ".Proj_Name."_sessions set session_data='$session_data', session_lastused='".time()."', session_ip='$ip' where session_id='$session_id'";
		$obj_session->run_mysql($query);
		return true;
	}
}

function destroy($session_id) {
	$obj_session = new cloud_mysql();
	$query = "delete form ".Proj_Name."_sessions where session_id='$session_id'";
	$obj_session->run_mysql($query);
	return true;
}

function gc($max_lifetime) {
	$obj_session = new cloud_mysql();
	$current = time();
	$max_lifetime = Session_Limit_Time * 60;
	$limit = $current - $max_lifetime;
	$query = "delete from ".Proj_Name."_sessions where session_lastused < $limit";
	$obj_session->run_mysql($query);
	return true;
}

session_set_save_handler("open", "close", "read", "write", "destroy", "gc");
session_start();
?>