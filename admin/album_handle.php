<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'class_jqx.php');

$main_str   = 'album';
$table_name = Proj_Name.'_'.$main_str;	
$obj_album  = new mysql_page();
$obj_jqx    = new jqx();
$obj_image  = new files();	

$category = $_REQUEST['category'];
//$cate_str  = $CategoryList[$category]['Title'];
$_width    = 420;
$_height   = 420;
$_width_s  = $_width * 0.4;
$_height_s = $_height * 0.4;
$file_size = 5;

if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);

	if($_POST['id'] == ""){	
		$id = $_SESSION['insert_id'];
	}	else	{
		$id = $_POST['id'];		
	}				
	if($result) {
		js_a_l('儲存成功', $main_str.'_handle.php?id=' . $id . '&category=' . $category);exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($id) {
	$id    = format_data($id, 'int');
	$query = "select * from $table_name where id='".$id."'";
	$album = $obj_album->run_mysql_out($query);
}

$page_subtitle = '';

if($category!=0) {		
	$tmp_prev = $category;
	do{
		$query = "select id, name, prev, lv from waterfrom_proj_category where id='".$tmp_prev."'"; 
		$pc = $obj_proj->run_mysql_out($query);
		$page_title = $pc['name'];
		$page_title_link = "album.php?category=".$pc['id'];
		$page_subtitle = "<a href=proj_category.php?category=".$pc['id']."><li class='left'>Project管理</li></a>".$page_subtitle;
		$tmp_prev = $pc['prev'];
	}while($pc['prev']!=0);
}

$images_num = 1;

$obj_photo = new mysql_page();
$query = "select keywords from waterfrom_system_set";	
$photo = $obj_photo->run_mysql_out($query);//print_r($obj_photo->result_data);
$keywords = $photo['keywords'];

if($album['alt'] == ""){
	$alt = $keywords;
}	else	{
	$alt = $album['alt'];	
}

?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>
<script src="../ckeditor/ckeditor.js"></script>
<script src="../ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxvalidator.js"></script> 
<script type="text/javascript" src="../jqwidgets/jqxcalendar.js"></script> 
<script type="text/javascript" src="../jqwidgets/jqxdatetimeinput.js"></script>

<!-- uploadify -->
<script type="text/javascript" src="../uploadify/jquery.uploadify-3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../uploadify/uploadify.css" />

<script type="text/javascript">
$(document).ready(function () {
	//$( '#content' ).ckeditor();
	$( '#content3' ).ckeditor();		
	var theme = '<?=jqxStyle?>';

	<?php 
	for($i=1; $i<=$images_num; $i++) { 
		$obj_image->uploadify_js('file'.$i.'_upload', 'file'.$i, 'show_file'.$i, array("action", "main_str", "category", "id", "file_o", "key", "_width_s", "_height_s", "need_thumb", "thumb_path"), array("upload_images", $main_str, $category, $album["id"], "", $i, $_width_s, $_height_s, "N", ""));
	} 
	?>
		
	$('#sendButton').bind('click', function () {
		$('#<?=$main_str?>_form').jqxValidator('validate');
		
	});
	$('#<?=$main_str?>_form').bind('validationSuccess', function (event) { 
		$('#<?=$main_str?>_form').submit();
	});
	$('.text-input').addClass('jqx-input');
	$('.text-input').addClass('jqx-rc-all');
	if (theme.length > 0) {
		$('.text-input').addClass('jqx-input-' + theme);
		$('.text-input').addClass('jqx-widget-content-' + theme);
		$('.text-input').addClass('jqx-rc-all-' + theme);
	}
	<?php //$obj_jqx->datepicker('album_date', $album['album_date']); ?>
	// initialize validator.
	$('#<?=$main_str?>_form').jqxValidator({
		rules: [
		{ input: '#title', message: '請輸入英文名稱', action: 'keyup, blur', rule: 'required' },
		{ input: '#title2', message: '請輸入中文名稱', action: 'keyup, blur', rule: 'required' },
		{ input: '#sort', message: '請輸入數字', action: 'keyup, blur', rule: function (input, commit) {
				if(!isNumber(input.val())) {
					return false;
				}else {
					return true;	
				}
        	} 
		}], 
		theme: theme
	});
});
</script>
</head>
<body>
<?php include("include_top.php"); ?>
<div class="admin-panel">
  <?php include("include_menu.php"); ?><!--slidebar end-->
  <div class="main set_page_h page_shadow">
   <?php $obj_drawpage->drawPageWelcomeV2($page_subtitle); ?>
   <div class="mainContent">
   	 <div id="data_content">
   		<form method="post" id="<?=$main_str?>_form" action="<?=$_SERVER['PHP_SELF']?>">
            <input type="hidden" name="action" value="save" />
            <input type="hidden" name="id" value="<?=$album['id']?>" />
            <input type="hidden" name="category" value="<?=$_REQUEST['category']?>" />            
            <table class="<?=$main_str?>-table">
            	<?php 
				echo '<tr><td colspan="3"><h2>上傳圖片</h2>';

				for($i=1; $i<=$images_num; $i++) { 
                	$obj_image->uploadify_row('images', 1, $i, "上傳圖片".$i, $main_str, $album['file'.$i], $album['title'], $_width_s, $_height_s, $_width, $_height, $file_size);
                } 
				echo '</td></tr>';
                ?>            
                <tr>
                    <td height="60">英文名稱：</td>
                    <td align="left"><input type="text" name="title" id="title" value="<?=$album['title']?>" class="frome" style="width:400px" /></td>
                </tr>
                <tr>
                    <td height="60">中文名稱：</td>
                    <td align="left"><input type="text" name="title2" id="title2" value="<?=$album['title2']?>" class="frome" style="width:400px" /></td>
                </tr>                
                <tr>
                    <td height="60">英文說明：</td>
                    <td align="left">
	                    <textarea id="content" name="content" rows="10" cols="80" class="frome" ><?=stripslashes($album['content'])?></textarea>
					</td>
                </tr>                
                <tr>
                    <td height="60">中文說明：</td>
                    <td align="left">
	                    <textarea id="content2" name="content2" rows="10" cols="80" class="frome" ><?=stripslashes($album['content2'])?></textarea>
					</td>
                </tr>
                             
                <tr>
                    <td height="60">說明欄位：</td>
                    <td align="left">
	                    <textarea id="content3" name="content3" rows="10" cols="80" class="frome" ><?=stripslashes($album['content3'])?></textarea>
					</td>
                </tr>                <!-- 
                <tr>
                    <td height="60">空間性質：</td>
                    <td align="left"><input type="text" name="space_info" id="space_info" value="<?=$album['space_info']?>" class="frome" style="width:400px" /></td>
                </tr> 
                <tr>
                    <td height="60">地　　點：</td>
                    <td align="left"><input type="text" name="locate" id="locate" value="<?=$album['locate']?>" class="frome" style="width:400px" /></td>
                </tr> 
                <tr>
                    <td height="60">面　　積：</td>
                    <td align="left"><input type="text" name="area" id="area" value="<?=$album['area']?>" class="frome" style="width:400px" /></td>
				</tr>
                <tr>
                    <td height="60">材　　料：</td>
                    <td align="left"><input type="text" name="material" id="material" value="<?=$album['material']?>" class="frome" style="width:400px" /></td>
                </tr> 
                -->
                <tr>
                    <td height="60">排序：</td>
                    <td align="left"><input type="text" name="sort" id="sort" value="<?=$album['sort']?>" class="frome" style="width:400px" /></td>
                </tr>                 
                <tr>
                    <td height="60">圖片關鍵字：</td>
                    <td align="left"><input type="text" name="alt" id="alt" value="<?=$alt?>" class="frome" style="width:400px" /></td>
                </tr>                                                                     
                <tr>
                    <td height="60">色　　碼：</td>
                    <td align="left">
                    <div style="width:30px; height:30px; background:#<?=$album['colorcode']?>; float:left; margin-right:10px;"></div>
                    <input type="text" name="colorcode" id="colorcode" value="<?=$album['colorcode']?>" class="frome" style="width:400px" /></td>
                </tr> 
                <tr>
                    <td height="60">色碼：</td>
                    <td align="left">
                    <div style="width:30px; height:30px;  background-color: rgba(<?=$album['colorcode2']?>,1);; float:left; margin-right:10px;"></div>
                    <input type="text" name="colorcode2" id="colorcode2" value="<?=$album['colorcode2']?>" class="frome" style="width:400px" /></td>
                </tr>                                                                                                                                
                <tr>
                    <td colspan="2" style="text-align: center;"><button type="button" id="sendButton" class="editbtn enter" title="儲存" >儲 存</button></td>
                </tr>
            </table>
            </form>
     </div><!--content end-->
   </div><!--mainContent end-->
   <?php include("include_footer.php"); ?>
  </div><!--main end-->
</div><!--admin-panel end-->
</body>
</html>