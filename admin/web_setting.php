<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'class_jqx.php');

$main_str   = 'system_set';
$table_name = Proj_Name.'_'.$main_str;	
$obj_system = new mysql_page();
$obj_jqx    = new jqx();

if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);
	
	if($result) {
		js_a_l('儲存成功', 'web_setting.php');exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}
//get data
$query  = "select * from $table_name where lang='".$_SESSION[Login_System_User]['lang']."'";
$system = $obj_system->run_mysql_out($query);
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>
<script type="text/javascript" src="../jqwidgets/jqxvalidator.js"></script> 
<!-- listbox -->
<script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
<script type="text/javascript">
$(document).ready(function () {
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
		{ input: '#company', message: '請輸入公司名稱', action: 'keyup, blur', rule: 'required' },
		{ input: '#company_email', message: '請輸入E-mail', action: 'keyup, blur', rule: 'required' },
		{ input: '#html_title', message: '請輸入網站名稱', action: 'keyup, blur', rule: 'required' }]
	});
	<?php $obj_jqx->twzipcode('show_zipcode', 'company_zipcode', 'company_county', 'company_area', $system['company_zipcode'], $system['company_county'], $system['company_area']); ?>
});
</script>
</head>
<body>
<div class="background"><img src="images/bg.jpg"></div>
<div class="controller">
   <a href="#top"><div class="top btn">x</div></a>
   <div class="close btn">y</div>
   <div class="open btn">z</div>
</div>
<div id="top" class="topper"></div>
<div class="admin-panel">
  <?php include("include_menu.php"); ?><!--slidebar end-->
  <div class="main set_page_h page_shadow">
   <?php $obj_drawpage->drawPageWelcome($page_subtitle); ?>
   <div class="mainContent">
   	 <div id="data_content">
     <form method="post" id="<?=$main_str?>_form" action="<?=$_SERVER['PHP_SELF']?>">
            <input type="hidden" name="action" value="save" />
            <input type="hidden" name="id" value="<?=$system['id']?>" />
            <table class="<?=$main_str?>-table">
                <tr>
                    <td width="120" height="60">公司名稱：</td>
                    <td align="left"><input type="text" name="company" id="company" value="<?=$system['company']?>" class="frome" style="width:250px"></td>
                    <td width="120">負責人姓名：</td>
                    <td align="left"><input type="text" name="company_boss" id="company_boss" value="<?=$system['company_boss']?>" class="frome" style="width:250px" /></td>
                </tr>
                <tr>
                    <td height="60">E-mail：</td>
                    <td align="left"><input type="text" name="company_email" id="company_email" value="<?=$system['company_email']?>" class="frome" style="width:250px" /><br />(如有兩個以上，請以","分隔)</td>
                    <td>連絡電話：</td>
                    <td align="left"><input type="text" name="company_phone" id="company_phone" value="<?=$system['company_phone']?>" class="frome" style="width:250px" /></td>
                </tr>
                <tr>
                    <td height="60">手機號碼：</td>
                    <td align="left"><input type="text" name="company_mobile" id="company_mobile" value="<?=$system['company_mobile']?>" class="frome" style="width:250px" /></td>
                    <td>傳真號碼：</td>
                    <td align="left"><input type="text" name="company_fax" id="company_fax" value="<?=$system['company_fax']?>" class="frome" style="width:250px" /></td>
                </tr>
                <tr>
                    <td height="60">聯絡地址：</td>
                    <td colspan="3" align="left"><div id="show_zipcode"></div><input type="text" name="company_address" id="company_address" value="<?=$system['company_address']?>" class="frome" style="width:400px" /></td>
                </tr>
                <tr>
                    <td height="60">網站名稱：</td>
                    <td align="left"><input type="text" name="html_title" id="html_title" value="<?=$system['html_title']?>" class="frome" style="width:250px" /></td>
                    <td>關鍵字：</td>
                    <td align="left"><input type="text" name="keywords" id="keywords" value="<?=$system['keywords']?>" class="frome" style="width:250px" /><br />(如有兩個以上，請以","分隔)</td>
                </tr>
                <tr>
                    <td height="60">網站敘述：</td>
                    <td colspan="3" align="left"><textarea name="description" id="description" class="frome" style="width:800px; height:100px"><?=$system['description']?></textarea></td>
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