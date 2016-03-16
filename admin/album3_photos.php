<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'function_page.php');

$main_str   = 'album3';
$table_name = Proj_Name.'_'.$main_str;
$obj_album  = new mysql_page();	
$obj_photo  = new mysql_page();	
$obj_image  = new files();	
$file_num   = 1;
$_width     = 1621;
$_height    = 800;
$file_size  = 5;
$category = $_REQUEST['category'];

if ($album_id) {
	$album_id = format_data($album_id, 'int');
	$query = "select id, title, album_date from $table_name where id='".$album_id."'";
	$album = $obj_album->run_mysql_out($query);
}else {
	js_a_l('', 'album.php');exit;	
}
//subtitle
//$page_subtitle = '<li class="left"><a href="javascript:history.go(-1)">'.$album['album_date'].' '.$album['title'].'</a></li>';

$page_subtitle = '';

if($category!=0) {		
	$tmp_prev = $category;
	do{
		$query = "select id, name, prev, lv from waterfrom_proj_category where id='".$tmp_prev."'"; 
		$pc = $obj_proj->run_mysql_out($query);
		$page_subtitle = "<a href=\"javascript:history.go(-1)\"><li class='left'>".$pc['name']."</li></a>".$page_subtitle;
		$tmp_prev = $pc['prev'];
	}while($pc['prev']!=0);
}

$query = "select keywords from waterfrom_system_set";	
$photo = $obj_photo->run_mysql_out($query);//print_r($obj_photo->result_data);
$keywords = $photo['keywords'];

?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>
<!-- uploadify -->
<script type="text/javascript" src="../uploadify/jquery.uploadify-3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../uploadify/uploadify.css" />
<script type="text/javascript">
function show_list() {
	$("#photos_list").html('');
	var ajaxurl = '<?=$main_str?>_data.php?action=photos_list&album_id=<?=$album['id']?>';
	$.ajax({
		url: ajaxurl,
		dataType: 'json',
		success: function(request) {
			$.each(request, function(key, photo_data) {
				$.each(photo_data, function(key, data)	{
					
					if(data['title']=='輸入標題後按下Enter')
						title_class_str = 'photo_title_text1';
					else
						title_class_str = 'photo_title_text2';
						
					if(data['sort']=='數字越大排序越前面')
						sort_class_str = 'photo_sort_text1';
					else
						sort_class_str = 'photo_sort_text2';
						
					if(data['alt']=='<?=$keywords?>')
						alt_class_str = 'photo_alt_text1';
					else
						alt_class_str = 'photo_alt_text2';						
						
					var div_str  = '<div id="show_photo_block_'+data['photo_id']+'" class="show_photo" onmouseover="mouseover_show_btn(\''+data['photo_id']+'\')" onmouseout="mouseover_hidden_btn(\''+data['photo_id']+'\')">';
						div_str += '<div class="photo_block">';
						div_str += '<div id="photo_del_'+data['photo_id']+'" class="del_btn" onclick="delete_photo(\''+data['photo_id']+'\', \''+data['file1']+'\', \''+data['title']+'\')"><img src="../images/close.png" border="0"></div>';
						div_str += '<img src="../<?=$main_str?>_photos/<?=$album_id?>/'+data['file1']+'" width="'+data['width']+'" height="'+data['height']+'" alt="'+data['alt']+'" id="photo_file1_'+data['photo_id']+'"></div>';
						div_str += '<input type="text" name="photo_title_'+data['photo_id']+'" id="photo_title_'+data['photo_id']+'" value="'+data['title']+'" class="'+title_class_str+'" onclick="javascript:update_text(\''+data['photo_id']+'\', \'title\')" onkeydown="javascript:keydown_text(\''+data['photo_id']+'\', \'title\', event)" onblur="javascript:reload_text(\''+data['photo_id']+'\', \'title\', \''+data['title']+'\')">';
						div_str += '<input type="text" name="photo_sort_'+data['photo_id']+'" id="photo_sort_'+data['photo_id']+'" value="'+data['sort']+'" class="'+sort_class_str+'" onclick="javascript:update_text(\''+data['photo_id']+'\', \'sort\')" onkeydown="javascript:keydown_text(\''+data['photo_id']+'\', \'sort\', event)" onblur="javascript:reload_text(\''+data['photo_id']+'\', \'sort\', \''+data['sort']+'\')">';
						div_str += '<input type="text" name="photo_alt_'+data['photo_id']+'" id="photo_alt_'+data['photo_id']+'" value="'+data['alt']+'" class="'+alt_class_str+'" onclick="javascript:update_text(\''+data['photo_id']+'\', \'alt\')" onkeydown="javascript:keydown_text(\''+data['photo_id']+'\', \'alt\', event)" onblur="javascript:reload_text(\''+data['photo_id']+'\', \'alt\', \''+data['alt']+'\')">';						
						div_str += '</div>';//alert(div_str);
					$("#photos_list").html($("#photos_list").html()+div_str);
				})
			})
		},
		error: function(xhr, tStatus, err){alert('Ajax 發生錯誤，請與網站工程師連絡，錯誤代碼：'+xhr.StatusCode+' / 錯誤訊息：'+xhr.responseText);console.log(xhr.responseText);}
	});	
}
function mouseover_show_btn(photo_id) {
	$("#photo_del_"+photo_id).show();	
}
function mouseover_hidden_btn(photo_id) {
	$("#photo_del_"+photo_id).hide();	
}
function update_text(photo_id, update_row) {
	if(update_row=='title')
		default_value = '輸入標題後按下Enter';
	else if(update_row=='sort')
		default_value = '數字越大排序越前面';
	else if(update_row=='alt')
		default_value = '';		
	if($("#photo_"+update_row+"_"+photo_id).val()==default_value) {
		$("#photo_"+update_row+"_"+photo_id).val('');
	}
	$("#photo_"+update_row+"_"+photo_id).css("color", "#000");
}
function keydown_text(photo_id, update_row, e) {
	if(e.keyCode==13) {
		var ajaxurl = '<?=$main_str?>_data.php?action=change_photo&album_id=<?=$album['id']?>&photo_id='+photo_id+'&row_name='+update_row+'&row_value='+encodeURIComponent($("#photo_"+update_row+"_"+photo_id).val());		
		//alert(ajaxurl);
		$.ajax({
			url: ajaxurl,
			dataType: 'html',
			success: function(request) {
				show_list();
			}
		});
	}
}
function reload_text(photo_id, update_row, o_text) {
	if(update_row=='title')
		default_value = '輸入標題後按下Enter';
	else if(update_row=='sort')
		default_value = '數字越大排序越前面';
	else if(update_row=='alt')
		default_value = '';		
				
	if($("#photo_"+update_row+"_"+photo_id).val()=='') {
		$("#photo_"+update_row+"_"+photo_id).val(default_value);
	}else {
		$("#photo_"+update_row+"_"+photo_id).val(o_text);	
	}
	$("#photo_"+update_row+"_"+photo_id).css("color", "#CCC");
}
function delete_photo(photo_id, file1, title) {
	if(title=='輸入標題後按下Enter')
		title = '';
	if(confirm("確定要刪除 "+title+"("+file1+") 此張相片??")) {
		var ajaxurl = '<?=$main_str?>_data.php?action=del_photo&album_id=<?=$album_id?>&photo_id='+photo_id+'&file1='+file1;
		$.ajax({
			url: ajaxurl,
			dataType: 'html',
			success: function(request) {
				$("#show_photo_block_"+photo_id).hide("slow");
				//show_list();	
			}
		});
	}
}
$(document).ready(function () {
	var theme = '<?=jqxStyle?>';
	//upload file
	<?php 
	for($i=1; $i<=$file_num; $i++) { 
		$obj_image->uploadify_js('file'.$i.'_upload', 'file'.$i, 'show_file'.$i, array("action", "main_str", "album_id"), array("upload_photos", $main_str, $album['id']));
	} 
	?>
	show_list();
});
</script>
<style type="text/css">
.upload_photo {
	padding: 10px;
	text-align:left;	
}
.show_photo {
	position: relative;
	float:left;
	width:190px;
	height:320px;
	margin: 15px 0 0 15px;
	text-align:center;	
}
.show_photo input{
	margin: 5px 2px 0 2px;
}
.photo_block {
	width:100%;
	height:180px;
	text-align:center;
	border: #FFF solid 2px;
}
.photo_block:hover {
	border: #f5794d dashed 2px;
}
.photo_title_text1 {
	width: 170px;
	color: #CCC;
}
.photo_title_text2 {
	width: 170px;
	color: #000;
}
.photo_sort_text1 {
	width: 170px;
	color: #CCC;
}
.photo_sort_text2 {
	width: 170px;
	color: #000;
}

.photo_alt_text1 {
	width: 170px;
	color: #CCC;
}
.photo_alt_text2 {
	width: 170px;
	color: #000;
}

.del_btn {
	position:absolute;
	top: 0;right:0;
	text-align:right;
	width:16px;
	margin: 5px;
	display:none;
	cursor:pointer;
}
</style>
</head>
<body>
<?php include("include_top.php"); ?>
<div class="admin-panel">
  <?php include("include_menu.php"); ?><!--slidebar end-->
  <div class="main set_page_h page_shadow">
   <?php $obj_drawpage->drawPageWelcome($page_subtitle); ?>
   <div class="mainContent">
   	 <div id="data_content">
   		<div class="template_black">
            <?php 
			for($i=1; $i<=$file_num; $i++) {
                $obj_image->uploadify_row('photos', 1, $i, "上傳圖片".$i, $main_str, '', '', $_width_s, $_height_s, $_width, $_height, $file_size);
            } 
            ?>
            <div id="photos_list" style="width:100%; padding-top:5px"></div>
      </div><!--template_black end-->
    </div><!--content end-->
   </div><!--mainContent end-->
   <?php include("include_footer.php"); ?>
  </div><!--main end-->
</div><!--admin-panel end-->
</body>
</html>