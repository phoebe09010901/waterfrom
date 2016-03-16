<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'class_jqx.php');

$main_str   = 'member';
$table_name = Proj_Name.'_'.$main_str;	
$obj_member = new mysql_page();
$obj_jqx    = new jqx();

if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);
	
	if($result) {
		js_a_l('儲存成功', $main_str.'.php');exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($id) {
	$id     = format_data($id, 'int');
	$query  = "select * from $table_name where id='".$id."'";
	$member = $obj_member->run_mysql_out($query);
	$password = decrypt(Mcrypt_Key_Member, $member['password']);
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
<!-- listbox -->
<script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	//form
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
		<?php if(!$id) { ?>
		{ input: '#account', message: '請輸入帳號', action: 'keyup, blur', rule: 'required' },
		{ input: '#account', message: '帳號長度最少4個字元，最多12個字元', action: 'keyup, blur', rule: 'length=4,12' },
		<?php } ?>
		{ input: '#name', message: '請輸入姓名', action: 'keyup, blur', rule: 'required' },
		{ input: '#password', message: '請輸入密碼', action: 'keyup, blur', rule: 'required' },
		{ input: '#password', message: '密碼長度最少4個字元，最多12個字元', action: 'keyup, blur', rule: 'length=4,12' },
		{ input: '#password_check', message: '請輸入確認帳號', action: 'keyup, blur', rule: 'required' },
		{ input: '#password_check', message: '請重新確認帳號', action: 'keyup, blur', rule: function(input, commit) {
				if($("#password").val() != $("#password_check").val()) {
					return false;	
				}else {
					return true;	
				}
			}
		},
		{ input: '#sex2', message: '請選擇性別', action: 'click', rule: function(){
				if($('input[name=sex]:radio:checked').val()!='男' && $('input[name=sex]:radio:checked').val()!='女') {
					return false;		
				}else {
					return true;	
				}
			} 
		},
		{ input: '#email', message: '請輸入E-mail', action: 'keyup, blur', rule: 'required' },
		{ input: '#email', message: 'E-mail格式錯誤', action: 'keyup, blur', rule: function(input, commit) {
				if(!validateEmail(input.val())) {
					return false;
				}else {
					return true;	
				}
			}
		},
		{ input: '#mobile', message: '請輸入手機號碼', action: 'keyup, blur', rule: 'required' },
		{ input: '#address', message: '請輸入聯絡地址', action: 'keyup, blur', rule: 'required' }]
	});
	<?php $obj_jqx->datepicker('birthday', $member['birthday']); ?>
	<?php $obj_jqx->twzipcode('show_zipcode', 'zipcode', 'county', 'area', $member['zipcode'], $member['county'], $member['area']); ?>
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
            <input type="hidden" name="id" value="<?=$member['id']?>" />
            <table class="<?=$main_str?>-table">
                <tr>
                    <td width="120" height="60">會員帳號：</td>
                    <td align="left"><?php if(!$member['account']){ ?><input type="text" name="account" id="account" value="<?=$_GET['account']?>" class="frome" style="width:250px"><?php }else{ ?><?=$member['account']?><input type="hidden" name="account" value="<?=$member['account']?>"><?php } ?><br />(帳號長度最少4個字元，最多12個字元)</td>
                    <td width="120">姓　　名：</td>
                    <td align="left"><input type="text" name="name" id="name" value="<?=$member['name']?>" class="frome" style="width:250px" /></td>
                </tr>
                <tr>
                    <td height="60">密　　碼：</td>
                    <td align="left"><input type="password" name="password" id="password" value="<?=$password?>" class="frome" style="width:250px" AutoComplete="Off" />(密碼長度最少4個字元，最多12個字元)</td>
                    <td>確認密碼：</td>
                    <td align="left"><input type="password" name="password_check" id="password_check" value="<?=$password?>" class="frome" style="width:250px" AutoComplete="Off" /></td>
                </tr>
                <tr>
                    <td height="60">身分證字號：</td>
                    <td align="left"><input type="text" name="id_number" id="id_number" value="<?=$member['id_number']?>" class="frome" style="width:250px" /></td>
                    <td>性　　別：</td>
                    <td align="left"><input name="sex" type="radio" id="sex1" value="男" <?php if($member['sex']=='男' || $_GET['sex']=='男'){echo 'checked';} ?>>男　<input name="sex" type="radio" id="sex2" value="女" <?php if($member['sex']=='女' || $_GET['sex']=='女'){echo 'checked';} ?>>女</td>
                </tr>
                <tr>
                    <td height="60">生　　日：</td>
                    <td align="left"><div id="birthday" style="width:250px"></div></td>
                    <td>E-mail：</td>
                    <td align="left"><input type="text" name="email" id="email" value="<?=$member['email']?>" class="frome" style="width:250px" />(請輸入正確E-mail)</td>
                </tr>
                <tr>
                    <td height="60">聯絡電話：</td>
                    <td align="left"><input type="text" name="phone" id="phone" value="<?=$member['phone']?>" class="frome" style="width:250px" /></td>
                    <td>手機號碼：</td>
                    <td align="left"><input type="text" name="mobile" id="mobile" value="<?=$member['mobile']?>" class="frome" style="width:250px" />(請輸入手機號碼)</td>
                </tr>
                <tr>
                    <td height="60">聯絡地址：</td>
                    <td colspan="3" align="left"><div id="show_zipcode"></div><input type="text" name="address" id="address" value="<?=$member['address']?>" class="frome" style="width:400px" /></td>
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