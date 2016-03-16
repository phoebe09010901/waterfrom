<?php
header("content-type:text/html;charset=utf-8");
require_once('../set.php');

$obj_image = new files();		
$action    = format_data($_POST['action'], 'text');

if($action=='upload_images') {

	$file_maxsize = 5;	//單位mb
	$main_str     = format_data($_POST['main_str'], 'text');
	$id           = format_data($_POST['id'], 'int');
	$file_o       = format_data($_POST['file_o'], 'text');
	$key          = format_data($_POST['key'], 'int');
	$_width_s     = format_data($_POST['_width_s'], 'number');
	$_height_s    = format_data($_POST['_height_s'], 'number');
	$need_thumb   = format_data($_POST['need_thumb'], 'text');
	$thumb_path   = format_data($_POST['thumb_path'], 'text');

	if (!empty($_FILES)) {		

		//檢查上傳檔案
		if(round($_FILES['Filedata']['size']/1024/1024, 2) > $file_maxsize) {
			echo '上傳之檔案大小不可超過 '.$file_maxsize.' MB';exit;
		}
		$tmp_filename = explode('.', $_FILES['Filedata']['name']);
		if(array_search(strtolower($tmp_filename[count($tmp_filename)-1]), $allow_images)===false) {
			echo '上傳檔案格式錯誤';exit;
		}
		
		//刪除舊檔案
		if ($file_o != '' && file_exists('../'.$main_str.'/'.$_POST['file_o'])) {
			$obj_image->del_file('../'.$main_str.'/'.$file_o);
		}
		$file_name = date("U").'.'.strtolower($tmp_filename[count($tmp_filename)-1]);
		$obj_image->uploaded_file($_FILES['Filedata']['tmp_name'], '../'.$main_str.'/'.$file_name);
		//調整圖片大小
		if($need_thumb=='Y') {
			//刪除縮圖舊檔案
			if($thumb_path) {
				if ($file_o != '' && file_exists('../'.$main_str.'/'.$thumb_path.$file_o)) {
					$obj_image->del_file('../'.$main_str.'/'.$thumb_path.$file_o);
				}
			}
			$file_name_r = explode('.', $file_name);
			$obj_image->resize_pic('../'.$main_str.'/', '../'.$main_str.'/'.$thumb_path, $file_name_r[0], $file_name_r[1], $_width_s, $_height_s);
		}
		//update data
		if($id) {
			$query = "update ".Proj_Name."_".$main_str." set file".$key."='$file_name' where id='$id'";
			$obj_data->run_mysql($query);
		}
		//縮小後尺寸
		$size = $obj_image->show_pic2_show_number('../'.$main_str.'/'.$file_name, $_width_s, $_height_s);
		
		echo 'success|'.$file_name.'|'.$size[0].'|'.$size[1];
	}
	exit;
}elseif($action=='upload_gift') {
	$file_maxsize = 10;	//單位mb
	$main_str     = format_data($_POST['main_str'], 'text');
	$id           = format_data($_POST['id'], 'int');
	$file_o       = format_data($_POST['file_o'], 'text');
	$key          = format_data($_POST['key'], 'int');
	
	if (!empty($_FILES)) {		
		//檢查上傳檔案
		if(round($_FILES['Filedata']['size']/1024/1024, 2) > $file_maxsize) {
			echo '上傳之檔案大小不可超過 '.$file_maxsize.' MB';exit;
		}
		$tmp_filename = explode('.', $_FILES['Filedata']['name']);
		if(array_search(strtolower($tmp_filename[count($tmp_filename)-1]), $allow_files)===false) {
			echo '上傳檔案格式錯誤';exit;
		}
		if ($file_o != '' && file_exists('../'.$main_str.'/'.$file_o)) {
			$obj_image->del_file('../'.$main_str.'/'.$file_o);
		}
		$file_name = date("U").'.'.strtolower($tmp_filename[count($tmp_filename)-1]);
		$obj_image->uploaded_file($_FILES['Filedata']['tmp_name'], '../'.$main_str.'/'.$file_name);
		//update data
		if($id) {
			$query = "update ".Proj_Name."_".$main_str." set file".$key."='$file_name' where id='$id'";
			$obj_data->run_mysql($query);
		}
		
		echo 'success|'.$file_name;
	}
	exit;
}elseif($action=='upload_photos') {
	$file_maxsize = 10;	//單位mb
	$_width       = 800;
	$_height      = 600;
	$main_str     = format_data($_POST['main_str'], "text");
	$album_id     = format_data($_POST['album_id'], "int");
	if (!empty($_FILES)) {		
		//檢查上傳檔案
		if(round($_FILES['Filedata']['size']/1024/1024, 2) > $file_maxsize) {
			echo '上傳之檔案大小不可超過 '.$file_maxsize.' MB';exit;
		}
		$tmp_filename = explode('.',$_FILES['Filedata']['name']);
		if(array_search(strtolower($tmp_filename[count($tmp_filename)-1]), $allow_images)===false) {
			echo '上傳檔案格式錯誤';exit;
		}
		//insert data
		$query  = "LOCK TABLES ".Proj_Name."_".$main_str."_photos WRITE;";
		$obj_data->run_mysql($query);
		$title     = $_FILES['Filedata']['name'];
		$file_name = date("U").'.'.strtolower($tmp_filename[count($tmp_filename)-1]);
		$obj_image->uploaded_file($_FILES['Filedata']['tmp_name'], '../'.$main_str.'_photos/'.$album_id.'/'.$file_name);
		sleep(2);
		$query = "insert into ".Proj_Name."_".$main_str."_photos(album_id, file1, title, sort, pub, create_time) values('$album_id', '$file_name', '$title', 0, 1, now())";
		$obj_data->run_mysql($query);
		$query  = "UNLOCK TABLES;";
		$obj_data->run_mysql($query);
		//調整圖片大小
		$file_name_r = explode('.', $file_name);
		//$obj_image->resize_pic('../'.$main_str.'_photos/'.$album_id.'/', '../'.$main_str.'_photos/'.$album_id.'/', $file_name_r[0], $file_name_r[1], $_width, $_height);
		
		echo 'success|'.$file_name;
	}
	exit;
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