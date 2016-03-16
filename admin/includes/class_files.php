<?php
class files {	
	public $size;
	//construct
	public function __construct() {
		$this->size = array();
	}	
	
	//**********************************************
	//	檔案處理相關 function
	//**********************************************
	//file rename by time
	public function file_rename1($file_name, $id) {
		$file_name = strtolower($file_name);
		$filename  = explode(".",$file_name);
		$temp      = $id."_".date("U");
		$filename  = $temp.'.'.$filename[count($filename)-1];
		return $filename;
	}
	//mkdir
	public function add_dir($dir_path) {
		mkdir($dir_path, 0777);	
	}
	//delete dir
	public function del_dir($dir_path) {
		rmdir($dir_path);	
	}
	//upload file
	public function uploaded_file($tmp_name, $uppath){
		//js_a_l("上傳失敗，請檢查資料夾權限", $uppath);			
		if(is_uploaded_file($tmp_name)){		
			if(!move_uploaded_file($tmp_name, $uppath)){
				js_a_l("上傳失敗，請檢查資料夾權限", "back");	
				exit;
			}	
		}
	}
	//copy file
	public function copy_file($source, $new) {
		if(!copy($source, $new)) {
			js_a_l("複製失敗，請檢查資料夾權限", "back");	
			exit;
		}
	}
	//delete file
	public function del_file($file_name) {
		if(file_exists($file_name)) {
			unlink($file_name);
		}
	}
	//uploadify
	public function uploadify_js($uploadifyID, $imageID, $showimageID, $formData_name, $formData_value) {
		echo '$("#'.$uploadifyID.'").uploadify({
            "swf"      : "../uploadify/uploadify.swf",
            "uploader" : "ajax_uploadify.php",
			formData   : { ';
		if(count($formData_name)>0) {
			foreach($formData_name as $key => $value) {
				if($value!="file_o")
					echo '"'.$value.'": "'.$formData_value[$key].'"';
				else
					echo '"'.$value.'": $("#'.$imageID.'").val()';
				if($key<count($formData_name)-1)
					echo ", ";
			}
		}
		echo '},
			"onUploadSuccess" : function(file, data, response) {
				data = data.split("|");
				if(data[0]=="success") {';
		if($formData_value[0]=='upload_images') {
			echo '	$("#'.$imageID.'").val(data[1]);
					$("#'.$showimageID.'").attr("src", "../'.$formData_value[1].'/"+data[1]);
					$("#'.$showimageID.'").attr("width", data[2]);
					$("#'.$showimageID.'").attr("height", data[3]);';
		}elseif($formData_value[0]=='upload_files') {
			echo '	$("#'.$imageID.'").val(data[1]);';
		}elseif($formData_value[0]=='upload_photos') {
			echo 'show_list();';
		}
		echo '		}else {
					alert(data[0]);	
				}
			},
			"onUploadError" : function(file, errorCode, errorMsg, errorString) {
				alert("檔案 " + file.name + " 上傳失敗: " + errorString);
			}
    	});	 ';
	}
	//uplodify row
	public function uploadify_row($type, $show_type, $i, $rowName, $dataPath, $dataFile, $dataTitle, $dataWidth_s, $dataHeight_s, $dataWidth, $dataHeight, $dataFilesize) {
		global $allow_images, $allow_files;
		
		$PHP_SELF = $_SERVER['PHP_SELF'];

		if($type=='images' || $type=='files') {
			echo '<div class="floatleft">';
			if($type=='images'){  
				$allow_files_str = '';
				foreach($allow_images as $key => $value) {
					$allow_files_str = $allow_files_str.$value.', ';	
				}
								
				switch($PHP_SELF){
					case "/admin/album2_handle.php":
						echo '<div class="ex">建議尺寸寬：（兩張）288px、（單張）771px<br>檔案大小:'.$dataFilesize.'mb</div>';									
						break;
											
					default:
						echo '<div class="ex">建議尺寸 '.$dataWidth.'*'.$dataHeight.'<br>檔案大小:'.$dataFilesize.'mb</div>';
				}				
				
				if($show_type==1){ $this->show_pic1($dataPath.'/'.$dataFile, $dataWidth_s, $dataHeight_s, $dataTitle, 'show_file'.$i); }
				elseif($show_type==2){ $this->show_pic2($dataPath.'/'.$dataFile, $dataWidth_s, $dataHeight_s, $dataTitle, 'show_file'.$i); }
				echo '<input type="text" name="file'.$i.'" id="file'.$i.'" value="'.$dataFile.'" class="frome readonly" style="width:200px" readonly="readonly" /><input type="button" class="delButton" value="刪除照片" onClick="$(\'#show_file'.$i.'\').attr(\'src\', \'../images/space.png\');$(\'#file'.$i.'\').val(\'\')" /><input type="file" name="file'.$i.'_upload" id="file'.$i.'_upload" /><div style="display:none">(允許檔案格式: '.$allow_files_str.'，建議圖片尺寸: '.$dataWidth.'*'.$dataHeight.'，檔案大小:'.$dataFilesize.'mb)</div>';

			}elseif($type=='files') {

				switch($PHP_SELF){
					case "/admin/album2_handle.php":
						$allow_files_str = '';
						$allow_files  = array('pdf');						
						foreach($allow_files as $key => $value) {
							$allow_files_str = $allow_files_str . $value;	
						}
						//echo '<div class="ex">檔案大小:'.$dataFilesize.'mb</div>';
						break;
											
					default:
						$allow_files_str = '';
						foreach($allow_files as $key => $value) {
							$allow_files_str = $allow_files_str.$value.', ';	
						}
						//echo '<div class="ex">檔案大小:'.$dataFilesize.'mb</div>';
				}	
								
				echo '<input type="button" class="delButton" value="刪除檔案" onClick="$(\'#file'.$i.'\').val(\'\')" /><br />';	
				echo '<input type="text" name="file'.$i.'" id="file'.$i.'" value="'.$dataFile.'" class="frome" style="width:200px" readonly="readonly" /><br />';
				echo '<input type="file" name="file'.$i.'_upload" id="file'.$i.'_upload" />(允許檔案格式: '.$allow_files_str.')';
			}
			echo '</div>';
		}elseif($type=='photos') {
			$allow_files_str = '';
			foreach($allow_images as $key => $value) {
				$allow_files_str = $allow_files_str.$value.', ';	
			}


			echo '<div class="upload_photo">';
			echo '<input type="file" name="file'.$i.'_upload" id="file'.$i.'_upload" />';

			switch($PHP_SELF){
				case "/admin/album_photos.php":
					echo '寬度設定1621（同比例高度建議抓971以上）<br>';									
					break;										
			}				

			echo '(選擇照片上傳，允許檔案格式: '.$allow_files_str.'，建議圖片尺寸: '.$dataWidth.'*'.$dataHeight.'，檔案大小:'.$dataFilesize.'mb)';
			echo '</div>';	
		}
	}
	//show_pic(path, pic_name, pic_width, pic_height, pic_alt) 固定大小
	public function show_pic1($pic, $_width, $_height, $alt, $pic_id) {
		$check_pic = explode("/", $pic);
		if(file_exists(Root_Path.$path.$pic) && $check_pic[count($check_pic)-1]!='') {
			
			$this->size[0] = $_width;
			$this->size[1] = $_height;
		}else {
			$pic = 'images/space.png';
				
			$this->size[0] = $_width;
			$this->size[1] = $_height;
		}
		
		echo '<img id="'.$pic_id.'" src="'.Host_Name.$pic.'" width="'.$this->size[0].'" height="'.$this->size[1].'" alt="'.$alt.'" title="'.$alt.'" border="0">';
	}
	//show_pic(pic_name, pic_width, pic_height, pic_alt) 變換大小
	public function show_pic2($pic, $_width, $_height, $alt, $pic_id) {
		$check_pic = explode("/", $pic);
		if(file_exists(Root_Path.$pic) && $check_pic[count($check_pic)-1]!='') {
			$this->size = getimagesize(Root_Path.$pic);
			
			if($_width > 0) {
				if ($this->size[0] > $_width) {
					$this->size[1] = $this->size[1] * $_width / $this->size[0];
					$this->size[0] = $_width;
				}	
			}
			if($_height > 0) {
				if ($this->size[1] > $_height) {
					$this->size[0] = $this->size[0] * $_height / $this->size[1];
					$this->size[1] = $_height;
				}
			}
			if($_width>0 && $_height>0) {
				$_width_str  = 'width="'.$this->size[0].'"';
				$_height_str = 'height="'.$this->size[1].'"';
			}elseif($_width>0 && $_height==0) {
				$_width_str  = 'width="'.$this->size[0].'"';
				$_height_str = '';
			}elseif($_width==0 && $_height>0) {
				$_width_str  = '';
				$_height_str = 'height="'.$this->size[1].'"';
			}
		}else {
			$pic = 'images/space.png';
				
			$this->size[0] = $_width;
			$this->size[1] = $_height;
		}
		
		echo '<img id="'.$pic_id.'" src="'.Host_Name.$pic.'" '.$_width_str.' '.$_height_str.' alt="'.$alt.'" title="'.$alt.'" border="0">';
	}
	//依比例縮小後之圖片長寬
	public function show_pic2_show_number($pic, $_width, $_height) {
		if($pic!='') {
			$this->size = getimagesize($pic);
				
			if ($this->size[0] > $_width) {
				$this->size[1] = $this->size[1] * $_width / $this->size[0];
				$this->size[0] = $_width;
			}	
			if ($this->size[1] > $_height) {
				$this->size[0] = $this->size[0] * $_height / $this->size[1];
				$this->size[1] = $_height;
			}
		}else {				
			$this->size[0] = $_width;
			$this->size[1] = $_height;
		}
		
		return $this->size;
	}
	//resize function
	public function resize_pic($path, $new_path, $filename, $tmp_name, $hope_width, $hope_height) {
		if($tmp_name=='jpg'||$tmp_name=='JPG') {
			$this->jpg_resize($path, $new_path, $filename, $tmp_name, $hope_width, $hope_height);
		}
		elseif($tmp_name=='png'||$tmp_name=='PNG') {
			$this->png_resize($path, $new_path, $filename, $tmp_name, $hope_width, $hope_height);
		}
		elseif($tmp_name=='gif'||$tmp_name=='GIF') {
			$this->gif_resize($path, $new_path, $filename, $tmp_name, $hope_width, $hope_height);
		}
	}
	public function jpg_resize($path,$new_path,$filename,$tmp_name,$hope_width,$hope_height) {
		$src = imagecreatefromjpeg($path.$filename.".".$tmp_name);
		
		// get the source image's widht and hight
		$src_w = imagesx($src);
		$src_h = imagesy($src);
		
		// assign thumbnail's widht and hight
		$thumb_w = $src_w;
		$thumb_h = $src_h;
		
		if($thumb_w > $hope_width) {
			$thumb_h = $thumb_h * $hope_width / $thumb_w;
			$thumb_w = $hope_width; 
		}
		if($thumb_h > $hope_height) {
			$thumb_w = $thumb_w * $hope_height / $thumb_h;
			$thumb_h = $hope_height;
		}
		
		$thumb = imagecreatetruecolor($thumb_w, $thumb_h);
		imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
		imagejpeg($thumb, $new_path.$filename.".".$tmp_name);
	}
	public function png_resize($path,$new_path,$filename,$tmp_name,$hope_width,$hope_height) {
		$src = imagecreatefrompng($path.$filename.".".$tmp_name);
		
		// get the source image's widht and hight
		$src_w = imagesx($src);
		$src_h = imagesy($src);
		
		// assign thumbnail's widht and hight
		$thumb_w = $src_w;
		$thumb_h = $src_h;
		
		if($thumb_w > $hope_width) {
			$thumb_h = $thumb_h * $hope_width / $thumb_w;
			$thumb_w = $hope_width; 
		}
		if($thumb_h > $hope_height) {
			$thumb_w = $thumb_w * $hope_height / $thumb_h;
			$thumb_h = $hope_height;
		}
		
		$thumb = imagecreatetruecolor($thumb_w, $thumb_h);
		imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
		imagepng($thumb, $new_path.$filename.".".$tmp_name);
	}
	public function gif_resize($path,$new_path,$filename,$tmp_name,$hope_width,$hope_height) {
		$src = imagecreatefromgif($path.$filename.".".$tmp_name);
		
		// get the source image's widht and hight
		$src_w = imagesx($src);
		$src_h = imagesy($src);
		
		// assign thumbnail's widht and hight
		$thumb_w = $src_w;
		$thumb_h = $src_h;
		
		if($thumb_w > $hope_width) {
			$thumb_h = $thumb_h * $hope_width / $thumb_w;
			$thumb_w = $hope_width; 
		}
		if($thumb_h > $hope_height) {
			$thumb_w = $thumb_w * $hope_height / $thumb_h;
			$thumb_h = $hope_height;
		}
		
		$thumb = imagecreatetruecolor($thumb_w, $thumb_h);
		imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);
		imagegif($thumb, $new_path.$filename.".".$tmp_name);
	}	
}
?>