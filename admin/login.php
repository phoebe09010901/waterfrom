<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once '../securimage/securimage.php';

$main_str   = 'admin';
$table_name = Proj_Name.'_'.$main_str;
$img = new Securimage();

if ($_POST['action']=='login') {
	$obj_mysqlExec->login(1, $_POST);
}
$_SESSION['s_checksum'] = strtoupper(auto_checksum(6));
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/page.css" rel="stylesheet" type="text/css" />
<?php include("include_head.php"); ?>
<script type="text/javascript" src="../jqwidgets/jqxvalidator.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	var theme = '<?=jqxStyle?>';
	$('#sendButton').bind('click', function () {
		$('#login_form').jqxValidator('validate');		
	});
	$('#login_form').bind('validationSuccess', function (event) { 
		$('#login_form').submit();
	});
	$('.text-input').addClass('jqx-input');
	$('.text-input').addClass('jqx-rc-all');
	if (theme.length > 0) {
		$('.text-input').addClass('jqx-input-' + theme);
		$('.text-input').addClass('jqx-widget-content-' + theme);
		$('.text-input').addClass('jqx-rc-all-' + theme);
	}
	// initialize validator.
	$('#login_form').jqxValidator({
		rules: [
		{ input: '#login_account', message: '請輸入帳號', action: 'keyup, blur', rule: 'required' },
		{ input: '#login_pw', message: '請輸入密碼', action: 'keyup, blur', rule: 'required' },
		{ input: '#key_c', message: '請輸入驗證碼', action: 'keyup, blur', rule: 'required' }], 
		theme: theme
	});
});
</script>
</head>
<body>
<div class="background"><img src="images/bg.jpg"></div>
<div id="login">
  <h2><?=Company_Name?></h2>
  <div class="login">
  <form method="post" id="login_form" name="login_form" action="<?=$_SERVER['PHP_SELF']?>">
  <input type="hidden" name="action" value="login" />
      <div class="input_box"><input type="text" name="login_account" id="login_account" value="<?=($_COOKIE['my_account']?$_COOKIE['my_account']:$login_account)?>" class="user" AutoComplete="Off"></div>
      <div class="input_box"><input type="password" name="login_pw" id="login_pw" class="password"></div>
      <div class="input_box">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="150"><img src="../tools/chucksum.php?s_checksum=<?=$_SESSION['s_checksum']?>" alt="Change another verification code" id="rand-img" width="120" height="30" name="chucksumImg" border="1" style="cursor:hand" ><!--<img src="../securimage/securimage_show.php" alt="Change another verification code" id="rand-img" width="120" height="30" name="chucksumImg" border="1" style="cursor:hand" >--></td>
    <td><input type="text" name="key_c" id="key_c" value="驗證碼" onClick="if(this.value=='驗證碼'){this.value='';}" onBlur="if(this.value==''){this.value='驗證碼';}"></td>
  </tr>
</table></div>
      <div class="button_box">
        <button type="button" class="submit_login" id="sendButton" name="sendButton">登入</button>
      </div>
      <div class="remember">
         <input type="checkbox" name="remember_ac" id="remember_ac" class="checkbox" value="1"><span class="txt">記住我的帳號</span>
      </div><!--pages_top end-->
  </form>
  </div>
<div class="login_info">
   <div class="info_txt">
      Cloud. CMS<span class="version">v1.0</span><br>
      網站管理系統</div>
</div>
</div>

<!--login end-->
</body>
</html>