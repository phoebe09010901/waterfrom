<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');

$main_str   = 'proj2_categoryimg';
$table_name = Proj_Name.'_'.$main_str;	
$obj_banner = new mysql_page();
$obj_proj2_categoryimg  = new mysql_page();
$obj_image  = new files();	

$category  = ($category)?format_data($category, 'int'):1;
//$cate_str  = $CategoryList3[$category]['Title'];
$_width    = 1898;
$_height   = 1700;
$_width_s  = $_width * 0.1;
$_height_s = $_height * 0.1;
$file_size = 5;

//$id = format_data($id, 'int');
$id = 1;

if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);
	if($_POST['id'] == ""){	
		$id = $_SESSION['insert_id'];
	}	else	{
		$id = $_POST['id'];		
	}			
	
	if($result) {
		js_a_l('儲存成功', 'proj2_categoryimg_handle.php?id='.$id);exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($id) {
	$id     = format_data($id, 'int');
	$query  = "select * from $table_name where id='".$id."'";
	//echo $query;
	$proj2_categoryimg = $obj_proj2_categoryimg->run_mysql_out($query);
}

$images_num = 1;

$obj_photo = new mysql_page();
$query = "select keywords from waterfrom_system_set";	
$photo = $obj_photo->run_mysql_out($query);//print_r($obj_photo->result_data);
$keywords = $photo['keywords'];

if($proj2_categoryimg['alt'] == ""){
	$alt = $keywords;
}	else	{
	$alt = $proj2_categoryimg['alt'];	
}
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>
<script type="text/javascript" src="../jqwidgets/jqxvalidator.js"></script> 
<!-- uploadify -->
<script type="text/javascript" src="../uploadify/jquery.uploadify-3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../uploadify/uploadify.css" />
<script type="text/javascript">
$(document).ready(function () {
	//upload file
	<?php 
	for($i=1; $i<=$images_num; $i++) { 
		$obj_image->uploadify_js('file'.$i.'_upload', 'file'.$i, 'show_file'.$i, array("action", "main_str", "category", "id", "file_o", "key", "_width_s", "_height_s", "need_thumb", "thumb_path"), array("upload_images", $main_str, $category, $proj2_categoryimg["id"], "", $i, $_width_s, $_height_s, "N", ""));
	} 
	?>
	var theme = '<?=jqxStyle?>';
	
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
	// initialize validator.
	$('#<?=$main_str?>_form').jqxValidator({
		rules: [
		{ input: '#file1', message: '請選擇圖片', action: 'keyup, blur', rule: 'required' }], 
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
   <?php $obj_drawpage->drawPageWelcome($page_subtitle); ?>
   <div class="mainContent">
   	 <div id="data_content">
   		<form method="post" id="<?=$main_str?>_form" action="<?=$_SERVER['PHP_SELF']?>">
            <input type="hidden" name="action" value="save" />
            <input type="hidden" name="id" value="<?=$id?>" />
            <input type="hidden" name="category" value="<?=$category?>" />
            <table class="<?=$main_str?>-table">
            	<?php 
				echo '<tr><td colspan="3"><h2>上傳圖片</h2>';
				for($i=1; $i<=$images_num; $i++) { 
                	$obj_image->uploadify_row('images', 1, $i, "上傳圖片".$i, $main_str, $proj2_categoryimg['file'.$i], $proj2_categoryimg['title'], $_width_s, $_height_s, $_width, $_height, $file_size);
                } 
				echo '</td></tr>';
                ?>
                <tr>
                    <td width="120" height="60">圖片關鍵字：</td>
                    <td align="left"><input type="text" name="alt" id="alt" value="<?=$alt?>" class="frome" style="width:400px" /></td>
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