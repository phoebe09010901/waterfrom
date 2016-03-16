<?php
header("content-type:application/json;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'function_js2php.php');

$main_str   = 'album3';
$table_name = Proj_Name.'_'.$main_str;		
$obj_album  = new mysql_page();		
$obj_photo  = new mysql_page();	
$obj_images = new files();		
$data       = array();
$_width     = 170;
$_height    = 170;

if($action=='change_row') {	//update
	$data_id   = format_data($data_id, 'int');
	$row_name  = format_data($row_name, 'text');
	$row_value = format_data($row_value, 'text');
	$query = "update $table_name set ".$row_name."='".$row_value."' where id='$data_id'";
	$obj_album->run_mysql($query);
	if($obj_album->result) {
		echo 'succeed';	
	}else {
		echo 'error';	
	}exit;
}elseif($action=='photos_list') {
	$album_id = format_data($album_id, 'int');
	$query = "select keywords from waterfrom_system_set";	
	$photo = $obj_photo->run_mysql_out($query);//print_r($obj_photo->result_data);
	$keywords = $photo['keywords'];
		
	$query = "select * from ".$table_name."_photos where album_id='".$album_id."' order by sort desc, id asc";	
	$obj_photo->run_mysql_list($query);//print_r($obj_photo->result_data);
	foreach($obj_photo->result_data as $i => $photo){
		if($photo) {
			$obj_images->show_pic2_show_number('../'.$main_str.'_photos/'.$album_id.'/'.$photo['file1'], $_width, $_height);
			$row['photo_id'] = $photo['id'];
			$row['file1']    = $photo['file1'];
			$row['width']    = $obj_images->size[0];
			$row['height']   = $obj_images->size[1];
			$row['title']    = ($photo['title'])?$photo['title']:'輸入標題後按下Enter';
			$row['sort']     = ($photo['sort'])?$photo['sort']:'數字越大排序越前面';
			$row['alt']     = ($photo['alt'])?$photo['alt']:$keywords;			
			array_push($data, $row);
		}
	}
	echo "{\"data\":" .json_encode($data). "}";exit;
}elseif($action=='change_photo') {
	$update_text = uniDecode($update_text);
	$photo_id    = format_data($photo_id, 'int');
	$row_name    = format_data($row_name, 'text');
	$row_value   = format_data($row_value, 'text');
	$query = "update ".$table_name."_photos set ".$row_name."='".$row_value."' where id='$photo_id'";
	$obj_photo->run_mysql($query);
	if($obj_photo->result) {
		echo 'succeed';	
	}else {
		echo 'error';	
	}exit;
}elseif($action=='del_photo') {
	$photo_id = format_data($photo_id, 'int');	
	$file1    = format_data($file1, 'text');		
	$obj_images->del_file(Root_Path.$main_str.'_photos/'.$album_id.'/'.$file1);
	//delete
	$query = "delete from ".$table_name."_photos where id='$photo_id'";
	$obj_photo->run_mysql($query);
	if($obj_photo->result) {
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