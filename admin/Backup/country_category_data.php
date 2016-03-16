<?php
header("content-type:application/json;charset=utf-8");
require_once('set.php');

$main_str   = 'country_category';
$table_name = Proj_Name.'_'.$main_str;	
$obj_cate   = new mysql_page();	
$data       = array();

if($action=='change_row') {	//update
	$data_id   = format_data($data_id, 'int');
	$row_name  = format_data($row_name, 'text');
	$row_value = format_data($row_value, 'text');
	$query = "update $table_name set ".$row_name."='".$row_value."' where id='$data_id'";
	$obj_cate->run_mysql($query);
	if($obj_cate->result) {
		echo 'succeed';	
	}else {
		echo 'error';	
	}exit;
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