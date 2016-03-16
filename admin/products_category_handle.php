<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'class_category.php');

$main_str   = 'products_category';
$table_name = Proj_Name.'_'.$main_str;	
$obj_cate   = new mysql_page();
$obj_cate1  = new mysql_page();
$sprods     = new show_data_select();	

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
<script type="text/javascript" src="../jqwidgets/jqxvalidator.js"></script> 
<script type="text/javascript">
$(document).ready(function () {
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
	// initialize validator.
	$('#<?=$main_str?>_category_form').jqxValidator({
		rules: [
		{ input: '#name', message: '請輸入類別名稱', action: 'keyup, blur', rule: 'required' },
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
   		<form method="post" id="<?=$main_str?>_category_form" action="<?=$_SERVER['PHP_SELF']?>">
            <input type="hidden" name="action" value="save" />
            <input type="hidden" name="id" value="<?=$cate['id']?>" />
            <table class="<?=$main_str?>-table">
            	<?php if(Products_Category_Lv_Num > 1) { ?>
                <tr>
                    <td width="120" height="60">上層類別：</td>
                    <td align="left"><?php $sprods->data_category_select_reloop('products_category', 0, $prev, Products_Category_Lv_Num); ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td width="120" height="60">標　　題：</td>
                    <td align="left"><input type="text" name="name" id="name" value="<?=$cate['name']?>" class="frome" style="width:400px" /></td>
                </tr>
                <tr>
                    <td height="60">排　　序：</td>
                    <td align="left"><input type="text" name="sort" id="sort" value="<?=($cate['sort'])?$cate['sort']:0?>" class="frome" style="width:400px" /> (數字越大排序越前面)</td>
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