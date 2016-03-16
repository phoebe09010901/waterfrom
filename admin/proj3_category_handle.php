<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'class_category.php');
require_once(Root_Includes_Path.'class_jqx.php');

$main_str   = 'proj3_category';
$table_name = Proj_Name.'_'.$main_str;	
$obj_cate   = new mysql_page();	
$obj_cate1  = new mysql_page();
$sprods     = new show_data_select();	
$obj_image  = new files();
$obj_jqx    = new jqx();	
$images_num = 1;

$category  = ($category)?format_data($category, 'int'):1;
$cate_str  = $CategoryList[$category]['Title'];
$_width    = 600;
$_height   = 400;
$_width_s  = $_width * 0.3;
$_height_s = $_height * 0.3;
$file_size = 5;

$prev = ($prev)?$prev:0; 
if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);
	if($_POST['id'] == ""){	
		$id = $_SESSION['insert_id'];
	}	else	{
		$id = $_POST['id'];		
	}			
	
	if($result) {
		js_a_l('儲存成功', $main_str.'_handle.php?id=' . $id . '&prev='.$_POST['prev']);exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($id) {
	$id    = format_data($id, 'int');
	$query = "select * from $table_name where id='".$id."'";
	$cate  = $obj_cate->run_mysql_out($query);
}

//$images_num = 2;

$obj_photo   = new mysql_page();	
$query = "select keywords from waterfrom_system_set";	
$photo = $obj_photo->run_mysql_out($query);//print_r($obj_photo->result_data);
$keywords = $photo['keywords'];

if($cate['alt'] == ""){
	$alt = $keywords;
}	else	{
	$alt = $cate['alt'];	
}
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>

<script type="text/javascript" src="../jqwidgets/jqxvalidator.js"></script> 
<script type="text/javascript" src="../jqwidgets/jqxcalendar.js"></script> 
<script type="text/javascript" src="../jqwidgets/jqxdatetimeinput.js"></script>

<!-- uploadify -->
<script type="text/javascript" src="../uploadify/jquery.uploadify-3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../uploadify/uploadify.css" />

<script type="text/javascript">
$(document).ready(function () {

	//upload file
	<?php 
	for($i=1; $i<=$images_num; $i++) { 
		//$obj_image->uploadify_js('file'.$i.'_upload', 'file'.$i, 'show_file'.$i, array("action", "main_str", "category", "id", "file_o", "key", "_width_s", "_height_s", "need_thumb", "thumb_path"), array("upload_images", $main_str, $category, $cate["id"], "", $i, $_width_s, $_height_s, "N", ""));
	} 
	?>	
	var theme = '<?=jqxStyle?>';
		
	$('#sendButton').bind('click', function () {
		$('#<?=$main_str?>_category_form').jqxValidator('validate');
		
	});
	$('#<?=$main_str?>_category_form').bind('validationSuccess', function (event) { 
		$('#<?=$main_str?>_category_form').submit();
	});
	$('.text-input').addClass('jqx-input');
	$('.text-input').addClass('jqx-rc-all');
	if (theme.length > 0) {
		$('.text-input').addClass('jqx-input-' + theme);
		$('.text-input').addClass('jqx-widget-content-' + theme);
		$('.text-input').addClass('jqx-rc-all-' + theme);
	}
	<?php $obj_jqx->datepicker('release_date', $cate['release_date']); ?>	
	// initialize validator.
	$('#<?=$main_str?>_category_form').jqxValidator({
		rules: [
		{ input: '#name', message: '請輸入專案英文', action: 'keyup, blur', rule: 'required' }
		], 
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
   		<form method="post" id="<?=$main_str?>_category_form" action="<?=$_SERVER['PHP_SELF']?>">
            <input type="hidden" name="action" value="save" />
            <input type="hidden" name="id" value="<?=$cate['id']?>" />
            <table class="<?=$main_str?>-table">
            	<?php
				/* 
				echo '<tr><td colspan="3"><h2>上傳圖片</h2>';
				for($i=1; $i<=$images_num; $i++) { 
                	$obj_image->uploadify_row('images', 1, $i, "上傳圖片".$i, $main_str, $cate['file'.$i], $cate['title'], $_width_s, $_height_s, $_width, $_height, $file_size);
                } 
				echo '</td></tr>';
				*/
                ?>
                <tr>
                    <td width="120" height="60">文章日期：</td>
                    <td align="left"><div id="release_date" style="width:400px"></div></td>
                </tr>                
                <tr>
                    <td width="120" height="60">中文名稱：</td>
                    <td align="left"><input type="text" name="name" id="name" value="<?=$cate['name']?>" class="frome" style="width:400px" /></td>
                </tr>   
                <tr>
                    <td width="120" height="60">英文名稱：</td>
                    <td align="left"><input type="text" name="name2" id="name2" value="<?=$cate['name2']?>" class="frome" style="width:400px" /></td>
                </tr> 
                <!--
                <tr>
                    <td height="60">中文說明：</td>
                    <td align="left">
	                    <textarea id="content" name="content" rows="10" cols="80" class="frome" ><?=stripslashes($cate['content'])?></textarea>
					</td>
                </tr>    
                -->
                <!--            
                <tr>
                    <td height="60">英文說明：</td>
                    <td align="left">
	                    <textarea id="content2" name="content2" rows="10" cols="80" class="frome" ><?=stripslashes($cate['content2'])?></textarea>
					</td>
                </tr>                
                -->                
                <tr>
                    <td width="120" height="60">圖片關鍵字：</td>
                    <td align="left"><input type="text" name="alt" id="alt" value="<?=$alt?>" class="frome" style="width:400px" /></td>
                </tr>                        
                <!--                
                <tr>
                    <td width="120" height="60">色碼：</td>
                    <td align="left"><input type="text" name="colorcode" id="colorcode" value="<?=$cate['colorcode']?>" class="frome" style="width:400px" /></td>
                </tr>   
                <tr>
                    <td height="60">排　　序：</td>
                    <td align="left"><input type="text" name="sort" id="sort" value="<?=($cate['sort'])?$cate['sort']:0?>" class="frome" style="width:400px" /> (數字越大排序越前面)</td>
                </tr>
				-->
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