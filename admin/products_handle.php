<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'class_category.php');

$main_str   = 'products';
$table_name = Proj_Name.'_'.$main_str;	
$obj_prod   = new mysql_page();
$obj_cate1  = new mysql_page();
$obj_image  = new files();		
$sprods     = new show_data_select();	

$category = format_data($category, 'int');
foreach($ImagesSetting as $key => $value) {
	foreach($value as $key1 => $value1) {
		${$key1.$key} = $value1;
	}
}

if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);
	if($_POST['id'] == ""){	
		$id = $_SESSION['insert_id'];
	}	else	{
		$id = $_POST['id'];		
	}			
	
	if($result) {
		js_a_l('儲存成功', $main_str.'_handle.php?id=' . $id . '&category='.$_POST['category']);exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($id) {
	$id    = format_data($id, 'int');
	$query = "select * from $table_name where id='".$id."'";
	$prod  = $obj_prod->run_mysql_out($query);
	$category= $prod['category'];
}
//subtitle
$page_subtitle = '';
if($category!=0) {		
	$tmp_prev = $category;
	do{
		$query = "select id, name, prev, lv from ".$table_name."_category where id='".$tmp_prev."'";
		$pc = $obj_cate1->run_mysql_out($query);
		$page_subtitle = "<a href=".$main_str."_category.php?prev=".$pc['prev']."><li class='left'>".$pc['name']."</li></a>".$page_subtitle;
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
		$obj_image->uploadify_js('file'.$i.'_upload', 'file'.$i, 'show_file'.$i, array("action", "main_str", "category", "id", "file_o", "key", "_width_s", "_height_s", "need_thumb", "thumb_path"), array("upload_images", $main_str, $category, $prod["id"], "", $i, $_width_s1, $_height_s1, "Y", "thumb/"));
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
		{ input: '#name', message: '請輸入商品名稱', action: 'keyup, blur', rule: 'required' },
		{ input: '#file1', message: '請選擇圖片', action: 'keyup, blur', rule: 'required' },
		{ input: '#price', message: '請輸入商品價格', action: 'keyup, blur', rule: 'required' },
		{ input: '#price', message: '請輸入數字', action: 'keyup, blur', rule: function (input, commit) {
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
            <input type="hidden" name="id" value="<?=$prod['id']?>" />            
            <table class="<?=$main_str?>-table">
            	<?php 
				echo '<tr><td colspan="3"><h2>上傳圖片</h2>';
				for($i=1; $i<=$images_num; $i++) { 
                	$obj_image->uploadify_row('images', 2, $i, "上傳圖片".$i, $main_str.'/thumb', $prod['file'.$i], $prod['name'], $_width_s1, $_height_s1, $_width1, $_height1, $ImgFileSize1);
                } 
				echo '</td></tr>';
                ?>
                <tr>
                    <td height="60">商品類別：</td>
                    <td align="left" colspan="3"><?php $sprods->data_select_reloop("category", $main_str."_category", Products_Category_Lv_Num, 0, ($prod['category'])?$prod['category']:$category); ?></td>
                </tr>
                <tr>
                    <td width="120" height="60">商品名稱：</td>
                    <td align="left"><input type="text" name="name" id="name" value="<?=$prod['name']?>" class="frome" style="width:250px" /></td>
                    <td width="120" height="60">適應症狀：</td>
                    <td align="left"><input type="text" name="material" id="material" value="<?=$prod['material']?>" class="frome" style="width:250px" /></td>
                </tr>
                <tr>
                    <td height="60">售　　價：</td>
                    <td align="left"><input type="text" name="price" id="price" value="<?=$prod['price']?>" class="frome" style="width:250px" /></td>
                    <td height="60">排　　序：</td>
                    <td align="left"><input type="text" name="sort" id="sort" value="<?=($prod['sort'])?$prod['sort']:0?>" class="frome" style="width:250px" /> (數字越大排序越前面)</td>
                </tr>
                <tr>
                    <td height="60">詳細說明：</td>
                    <td align="left" colspan="4"><textarea id="content" name="content" rows="10"><?=stripslashes($prod['content'])?></textarea></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;"><button type="button" id="sendButton" class="editbtn enter" title="儲存" >儲 存</button></td>
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