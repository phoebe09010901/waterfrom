<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'class_jqx.php');

$main_str   = 'orderlist';
$table_name = Proj_Name.'_'.$main_str;
$obj_order  = new mysql_page();
$obj_jqx    = new jqx();	

if($_POST['action']=='save') {
	$result = $obj_mysqlExec->updateInit(1, $_POST);
	
	if($result) {
		js_a_l('儲存成功', $main_str.'.php');exit;
	}else {
		js_a_l('儲存失敗，請重新輸入並檢查', 'back');exit;
	}
}elseif ($id) {
	$id    = format_data($id, 'text');
	$query = "select * from $table_name where id='".$id."'";
	$order = $obj_order->run_mysql_out($query);
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
		{ input: '#order_name', message: '請輸入收件者姓名', action: 'keyup, blur', rule: 'required' },
		{ input: '#order_email', message: '請輸入E-mail', action: 'keyup, blur', rule: 'required' },
		{ input: '#order_email', message: 'E-mail格式錯誤', action: 'keyup, blur', rule: function(input, commit) {
				if(!validateEmail(input.val())) {
					return false;
				}else {
					return true;	
				}
			}
		},
		{ input: '#order_mobile', message: '請輸入手機號碼', action: 'keyup, blur', rule: 'required' },
		{ input: '#order_address', message: '請輸入聯絡地址', action: 'keyup, blur', rule: 'required' },
		{ input: '#cart_price', message: '請輸入運費', action: 'keyup, blur', rule: 'required' },
		{ input: '#cart_price', message: '請輸入數字', action: 'keyup, blur', rule: function(input, commit){
				if(!isNumber(input.val())) {
					return false;	
				}else {
					return true;	
				}
			}	
		},
		{ input: '#total_price', message: '請輸入訂單金額', action: 'keyup, blur', rule: 'required' },
		{ input: '#total_price', message: '請輸入數字', action: 'keyup, blur', rule: function(input, commit){
				if(!isNumber(input.val())) {
					return false;	
				}else {
					return true;	
				}
			}	
		}
		]
	});
	<?php $obj_jqx->twzipcode('show_zipcode', 'order_zipcode', 'order_county', 'order_area', $order['order_zipcode'], $order['order_county'], $order['order_area']); ?>
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
            <input type="hidden" name="id" value="<?=$order['id']?>" />
            <table class="<?=$main_str?>-table">
                <tr>
                    <td width="120" height="60">訂單編號：</td>
                    <td align="left"><?=$order['id']?></td>
                    <td width="120">會員帳號：</td>
                    <td align="left"><?=$order['member_account']?></td>
                </tr>
                <tr>
                    <td height="60">收件者姓名：</td>
                    <td align="left"><input type="text" name="order_name" id="order_name" value="<?=$order['order_name']?>" class="frome" style="width:250px" /></td>
                    <td>E-mail：</td>
                    <td align="left"><input type="text" name="order_email" id="order_email" value="<?=$order['order_email']?>" class="frome" style="width:250px" /></td>
                </tr>
                <tr>
                    <td height="60">連絡電話：</td>
                    <td align="left"><input type="text" name="order_phone" id="order_phone" value="<?=$order['order_phone']?>" class="frome" style="width:250px" /></td>
                    <td>手機號碼：</td>
                    <td align="left"><input type="text" name="order_mobile" id="order_mobile" value="<?=$order['order_mobile']?>" class="frome" style="width:250px" /></td>
                </tr>
                <tr>
                    <td height="60">聯絡地址：</td>
                    <td colspan="3" align="left"><div id="show_zipcode"></div><input type="text" name="order_address" id="order_address" value="<?=$order['order_address']?>" class="frome" style="width:400px" /></td>
                </tr>
                <tr>
                    <td height="60">運　　費：</td>
                    <td align="left"><input type="text" name="cart_price" id="cart_price" value="<?=$order['cart_price']?>" class="frome" style="width:250px" /></td>
                    <td>訂單金額：</td>
                    <td align="left"><input type="text" name="total_price" id="total_price" value="<?=$order['total_price']?>" class="frome" style="width:250px" /></td>
                </tr>
                <tr>
                    <td height="60">寄送方式：</td>
                    <td align="left"><?php 
					foreach($array_cart_type as $key => $value){
						?><input name="cart_type" type="radio" id="cart_type<?=$key?>" value="<?=$key?>" <?php if($order['cart_type']==$key || $_GET['cart_type']==$key){echo 'checked';} ?>><?=$value?>　<?php	
					} 
					?></td>
                    <td>付款方式：</td>
                    <td align="left"><?php 
					foreach($array_pay_type as $key => $value){
						?><input name="pay_type" type="radio" id="pay_type<?=$key?>" value="<?=$key?>" <?php if($order['pay_type']==$key || $_GET['pay_type']==$key){echo 'checked';} ?>><?=$value?>　<?php	
					} 
					?></td>
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