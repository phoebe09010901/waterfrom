<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');

$main_str   = 'banner2';
$table_name = Proj_Name.'_'.$main_str;	
$obj_banner = new mysql_page();
$obj_image  = new files();	

$category  = ($category)?format_data($category, 'int'):1;
$cate_str  = $CategoryList[$category]['Title'];
$_width    = $CategoryList[$category]['Width'];
$_height   = $CategoryList[$category]['Height'];
$_width_s  = $CategoryList[$category]['Width_s'];
$_height_s = $CategoryList[$category]['Height_s'];
$file_size = $CategoryList[$category]['FileSize'];

if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);
	
	if($result) {
		js_a_l('儲存成功', $main_str.'.php?category='.$_POST['category']);exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($id) {
	$id     = format_data($id, 'int');
	$query  = "select * from $table_name where id='".$id."'";
	$banner = $obj_banner->run_mysql_out($query);
}
//subtitle
$page_subtitle = '<li class="left"><a href="banner2.php?category='.$category.'">'.$cate_str.'</a></li>';
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
		$obj_image->uploadify_js('file'.$i.'_upload', 'file'.$i, 'show_file'.$i, array("action", "main_str", "category", "id", "file_o", "key", "_width_s", "_height_s", "need_thumb", "thumb_path"), array("upload_images", $main_str, $category, $banner["id"], "", $i, $_width_s, $_height_s, "N", ""));
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
		{ input: '#file1', message: '請選擇圖片', action: 'keyup, blur', rule: 'required' },
		{ input: '#url_to', message: '請輸入連結網址，如沒有連結網址請輸入"#"', action: 'keyup, blur', rule: 'required' }], 
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
            <input type="hidden" name="id" value="<?=$banner['id']?>" />
            <input type="hidden" name="category" value="<?=$category?>" />
            <table class="<?=$main_str?>-table">
            	<?php 
				echo '<tr><td colspan="3"><h2>上傳圖片</h2>';
				for($i=1; $i<=$images_num; $i++) { 
                	$obj_image->uploadify_row('images', 1, $i, "上傳圖片".$i, $main_str, $banner['file'.$i], $banner['title'], $_width_s, $_height_s, $_width, $_height, $file_size);
                } 
				echo '</td></tr>';
                ?>
                <tr>
                    <td width="120" height="60">標　　題：</td>
                    <td align="left"><input type="text" name="title" id="title" value="<?=$banner['title']?>" class="frome" style="width:400px" /></td>
                </tr>
                <tr>
                    <td height="60">連結網址：</td>
                    <td align="left"><input type="text" name="url_to" id="url_to" value="<?=$banner['url_to']?>" class="frome" style="width:400px" />(如沒有連結網址請輸入"#")</td>
                </tr>
                <tr>
                    <td height="60">排序數字：</td>
                    <td align="left"><input type="text" name="sort" id="sort" value="<?=($banner['sort'])?$banner['sort']:0?>" class="frome" style="width:400px" /> (數字越大排序越前面)</td>
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