<?php
header("content-type:application/json;charset=utf-8");
require_once('set.php');

$main_str   = 'contact_form';
$table_name = Proj_Name.'_'.$main_str;	
$obj_cont   = new mysql_page();	
$data       = array();

if($action=='change_row') {	//delete
	$data_id   = format_data($data_id, 'int');
	$row_name  = format_data($row_name, 'text');
	$row_value = format_data($row_value, 'text');
	$query = "update $table_name set ".$row_name."='".$row_value."' where id='$data_id'";	
	$obj_cont->run_mysql($query);
	if($obj_cont->result) {
		echo 'succeed';	
	}else {
		echo 'error';	
	}exit;
}elseif($action=='get_content') {
	$cont_id = format_data($cont_id, 'int');
	$query = "select content from $table_name where id='".$cont_id."'";	
	$cont = $obj_cont->run_mysql_out($query);
	if($cont) {
		$row['content'] = format_output(nl2br($cont['content']));
		array_push($data, $row);
	}
	echo "{\"data\":" .json_encode($data). "}";exit;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
</body>
</html>