<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');

$main_str   = 'pages';
$table_name = Proj_Name.'_'.$main_str;	
$obj_pages  = new mysql_page();
$obj_cate1  = new mysql_page();
$obj_image  = new files();	

$category = format_data($category, 'int');
foreach($ImagesSetting as $key => $value) {
	foreach($value as $key1 => $value1) {
		${$key1.$key} = $value1;
	}
}
if($category==2) { $images_num = 0; }
if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);
	
	if($result) {
		js_a_l('儲存成功', $main_str.'.php?category='.$_POST['category']);exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($id) {
	$id    = format_data($id, 'int');
	$query = "select * from $table_name where id='".$id."'";
	$pages = $obj_pages->run_mysql_out($query);
}
//subtitle
$page_subtitle = '';
if($category!=0) {		
	$tmp_prev = $category;
	do{
		$query = "select id, name, prev, lv from ".$table_name."_category where id='".$tmp_prev."'";
		$pc = $obj_cate1->run_mysql_out($query);
		$page_subtitle = "<a href=".$main_str.".php?category=".$pc['id']."><li class='left'>".$pc['name']."</li></a>".$page_subtitle;
		$tmp_prev = $pc['prev'];
	}while($pc['prev']!=0);
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
<!-- uploadify -->
<script type="text/javascript" src="../uploadify/jquery.uploadify-3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../uploadify/uploadify.css" />
<script type="text/javascript">
$(document).ready(function () {
	$( '#content' ).ckeditor();
	//upload file
	<?php 
	for($i=1; $i<=$images_num; $i++) { 
		$obj_image->uploadify_js('file'.$i.'_upload', 'file'.$i, 'show_file'.$i, array("action", "main_str", "category", "id", "file_o", "key", "_width_s", "_height_s", "need_thumb", "thumb_path"), array("upload_images", $main_str, $category, $pages["id"], "", $i, $_width_s1, $_height_s1, "N", "thumb/"));
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
		{ input: '#title', message: '請輸入標題', action: 'keyup, blur', rule: 'required' },
		{ input: '#sort', message: '請輸入排序數字，數字越大排序越前面', action: 'keyup, blur', rule: 'required' },
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
   <?php $obj_drawpage->drawPageWelcome($page_subtitle); ?>
   <div class="mainContent">
   	 <div id="data_content">
   		<form method="post" id="<?=$main_str?>_form" action="<?=$_SERVER['PHP_SELF']?>">
            <input type="hidden" name="action" value="save" />
            <input type="hidden" name="id" value="<?=$pages['id']?>" />
            <input type="hidden" name="category" value="<?=$category?>" />
            <table class="<?=$main_str?>-table">
            	<?php 
				if($category==1)
					echo '<tr><td colspan="3"><h2>上傳圖片</h2>';
				for($i=1; $i<=$images_num; $i++) { 
                	$obj_image->uploadify_row('images', 2, $i, "上傳圖片".$i, $main_str, $pages['file'.$i], $pages['title'], $_width_s1, $_height_s1, $_width1, $_height1, $ImgFileSize1);
                } 
				if($category==1)
					echo '</td></tr>';
                ?>
                <tr>
                    <td width="120" height="60">標　　題：</td>
                    <td align="left"><input type="text" name="title" id="title" value="<?=$pages['title']?>" class="frome" style="width:400px" /></td>
                </tr>
                <tr>
                    <td height="60">內　　容：</td>
                    <td><textarea id="content" name="content" rows="10"><?=stripslashes($pages['content'])?></textarea></td>
                </tr>
                <tr>
                    <td height="60">排　　序：</td>
                    <td align="left"><input type="text" name="sort" id="sort" value="<?=($pages['sort'])?$pages['sort']:0?>" class="frome" style="width:400px" /> (數字越大排序越前面)</td>
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