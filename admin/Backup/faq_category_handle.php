<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'class_category.php');

$main_str   = 'faq_category';
$table_name = Proj_Name.'_'.$main_str;	
$obj_cate   = new mysql_page();	
$obj_cate1  = new mysql_page();
$sprods     = new show_data_select();	

$prev = ($prev)?$prev:0;
if($_POST['action']=='save') {

	$result = $obj_mysqlExec->updateInit(1, $_POST);
	
	if($result) {
		js_a_l('儲存成功', $main_str.'.php?prev='.$_POST['prev']);exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($id) {
	$id    = format_data($id, 'int');
	$query = "select * from $table_name where id='".$id."'";
	$cate  = $obj_cate->run_mysql_out($query);
}
//subtitle
$page_subtitle = '';
if($prev!=0) {		
	$tmp_prev = $prev;
	do{
		$query = "select id, name, prev, lv from $table_name where id='".$tmp_prev."'";
		$pc = $obj_cate1->run_mysql_out($query);
		$page_subtitle = "<a href=".$main_str.".php?prev=".$pc['prev']."><li class='left'>".$pc['name']."</li></a>".$page_subtitle;
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
<script type="text/javascript">
$(document).ready(function () {
	$( '#content' ).ckeditor();
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
		{ input: '#content', message: '請輸入標題', action: 'keyup, blur', rule: 'required' }], 
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
            <input type="hidden" name="id" value="<?=$cate['id']?>" />
            <table class="<?=$main_str?>-table">
                <tr>
                    <td height="60">FAQ上方說明：</td>
                    <td><textarea id="content" name="content" rows="10"><?=stripslashes($aboutus['content'])?></textarea></td>
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