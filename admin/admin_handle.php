<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');

$main_str   = 'admin';
$table_name = Proj_Name.'_'.$main_str;
$obj_admin  = new mysql_page();

if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);
	
	if($result) {
		if($_SESSION[Login_System_User]['account']==$account)
			$_SESSION[Login_System_User]['name'] = $name;
		js_a_l('儲存成功', $main_str.'.php');exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($_SESSION[Login_System_User]['lv']=='admin' && $id) {
	$id    = format_data($_GET['id'], 'int');
	$query = "select * from $table_name where id='".$id."'";
	$admin = $obj_admin->run_mysql_out($query);
}elseif ($_SESSION[Login_System_User]['lv']=='web' && $_SESSION[Login_System_User]['account']) {
	$query = "select * from $table_name where account='".$_SESSION[Login_System_User]['account']."'";
	$admin = $obj_admin->run_mysql_out($query);
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
		<?php if(!$admin['account']) { ?>
		{ input: '#account', message: '請輸入帳號', action: 'keyup, blur', rule: 'required' },
		{ input: '#account', message: '帳號長度最少4個字元，最多12個字元', action: 'keyup, blur', rule: 'length=4,12' },
		{ input: '#name', message: '請輸入姓名', action: 'keyup, blur', rule: 'required' },
		{ input: '#password', message: '請輸入密碼', action: 'keyup, blur', rule: 'required' },
		{ input: '#password', message: '密碼長度最少4個字元，最多12個字元', action: 'keyup, blur', rule: 'length=4,12' },
		{ input: '#password_check', message: '請輸入確認密碼', action: 'keyup, blur', rule: 'required' },
		{ input: '#password_check', message: '請重新確認密碼', action: 'keyup, blur', rule: function(input, commit) {
				if($("#password").val() != $("#password_check").val()) {
					return false;	
				}else {
					return true;	
				}
			}
		}
		<?php }else { ?>
		{ input: '#password_confirm', message: '請輸入確認身分密碼', action: 'keyup, blur', rule: 'required' },
		{ input: '#password', message: '密碼長度最少4個字元，最多12個字元', action: 'keyup, blur', rule: function(input, commit) {
				if($("#password").val() && ($("#password").val().length<4 || 12<$("#password").val().length)) {
					return false;	
				}else {
					return true;	
				}
			}
		},
		{ input: '#password_check', message: '請重新確認密碼', action: 'keyup, blur', rule: function(input, commit) {
				if($("#password").val() != $("#password_check").val()) {
					return false;	
				}else {
					return true;	
				}
			}
		}
		<?php } ?>]
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
            <input type="hidden" name="id" value="<?=$admin['id']?>" />
            <table class="<?=$main_str?>-table">
                <tr>
                    <td width="120" height="60">會員帳號：</td>
                    <td align="left"><?php if(!$admin['account']){ ?><input type="text" name="account" id="account" value="<?=$_GET['account']?>" class="frome" style="width:250px"><?php }else{ ?><?=$admin['account']?><input type="hidden" name="account" value="<?=$admin['account']?>"><?php } ?><br />(帳號長度最少4個字元，最多12個字元)</td>
                </tr>
                <tr>
                    <td>姓　　名：</td>
                    <td align="left"><input type="text" name="name" id="name" value="<?=$admin['name']?>" class="frome" style="width:250px"></td>
                </tr>
                <?php if($admin['account']) { ?>
                <tr>
                    <td height="60">請輸入原密碼：</td>
                    <td align="left"><input type="password" name="password_confirm" id="password_confirm" value="" class="frome" style="width:250px" AutoComplete="Off" /> (請輸入密碼確認身份)</td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="padding-top:10px; padding-bottom:10px;">===============================================</td>
                </tr>
                <tr>
                    <td><?=($admin['account'])?'更改密碼':'輸入密碼'?>：</td>
                    <td align="left"><input type="password" name="password" id="password" value="" class="frome" style="width:250px" AutoComplete="Off" /> (密碼長度最少4個字元，最多12個字元)</td>
                </tr>
                <tr>
                    <td>確認密碼：</td>
                    <td align="left"><input type="password" name="password_check" id="password_check" value="" class="frome" style="width:250px" AutoComplete="Off" /></td>
                </tr>
                <?php if($_SESSION[Login_System_User]['lv']=='admin') { ?>
                <tr>
                    <td height="60">會員等級：</td>
                    <td align="left"><?php
					foreach($array_admin as $key => $value) {
						?><input type="radio" name="lv" value="<?=$key?>" <?php if($admin['lv']==$key){echo 'checked';} ?> /><?=$value?>　<?php	
					}
					?></td>
                </tr>
                <?php } ?>
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