<?php
class sendmail {
	private $sendmail;
	private $order;
	private $detail;
	//construct
	public function __construct() {	
		$this->sendmail           = new PHPMailer();	//phpmailer 設定	
		$this->sendmail->CharSet  = "utf-8";			//設定信件字元編碼	
		$this->sendmail->Encoding = "base64";			//設定信件編碼，大部分郵件工具都支援此編碼方式
		$this->sendmail->IsHTML(true);					//設置郵件格式為HTML
		if(SMTP_SMTPAuth=='true') {
			$this->sendmail->IsSMTP();	
			$this->sendmail->SMTPAuth = SMTP_SMTPAuth;	//設定為安全驗證方式
			$this->sendmail->Host     = SMTP_Host;		//指定SMTP的服務器位址
			$this->sendmail->Port     = SMTP_Port;		//設定SMTP服務的POST
			$this->sendmail->Username = SMTP_Username;	//SMTP的帳號
			$this->sendmail->Password = SMTP_Password;	//SMTP的密碼
		}
	}
	
	//會員註冊
	public function member_reg($memberIDkey) {
		global $table_name_member;
		$obj_member = new mysql_page();
		
		//orderlist data
		$query = "select id, name, password from ".$table_name_member." where id='".$memberIDkey."'";	
		$member= $obj_member->run_mysql_out($query);
		//phpmailer init
		$this->sendmail->From = Company_Email;
		$this->sendmail->FromName = Company_Name;
		$this->sendmail->AddReplyTo(Company_Email, Company_Name);
		$this->sendmail->Subject = Html_Title.' 會員註冊通知';
		$this->sendmail->AddAddress($member['id'], $member['name']);
				
		$this->sendmail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>'.Html_Title.'</title>
		</head>
		
		<body style="margin-top:0px; margin-left:0px">
		<p>親愛的會員 '.$member['name'].' 您好：</p>
		<p>您在 '.date("Y-m-d H:i:s").' 時於 <a href="'.Host_Name.'" target="_blank">'.Html_Title.'</a> 該網站註冊成為會員。</p>
		<p>如確定為本人所註冊，可忽略此信件，並感謝您的加入，謝謝。</p>
		</body>
		</html>';
		
		//echo $this->sendmail->Body;exit;
		if(!$this->sendmail->Send()) {	 
			echo "錯誤!信件無法送出<br>";		 
			echo "Mailer 錯誤訊息>>>> " . $this->sendmail->ErrorInfo;	 
		} 	
	}
	//會員修改
	public function member_update($memberIDkey) {
		global $table_name_member;
		$obj_member = new mysql_page();
		
		//orderlist data
		$query = "select id, name, password from ".$table_name_member." where id='".$memberIDkey."'";	
		$member= $obj_member->run_mysql_out($query);
		//phpmailer init
		$this->sendmail->From = Company_Email;
		$this->sendmail->FromName = Company_Name;
		$this->sendmail->AddReplyTo(Company_Email, Company_Name);
		$this->sendmail->Subject = Html_Title.' 會員資料修改';
		$this->sendmail->AddAddress($member['id'], $member['name']);
				
		$this->sendmail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>'.Html_Title.'</title>
		</head>
		
		<body style="margin-top:0px; margin-left:0px">
		<p>親愛的會員 '.$member['name'].' 您好：</p>
		<p>您在 '.date("Y-m-d H:i:s").' 時於 <a href="'.Host_Name.'" target="_blank">'.Html_Title.'</a> 該網站修改過會員資料。</p>
		<p>如確定為本人所修改，可忽略此信件，謝謝。</p>
		</body>
		</html>';
		
		//echo $this->sendmail->Body;exit;
		if(!$this->sendmail->Send()) {	 
			echo "錯誤!信件無法送出<br>";		 
			echo "Mailer 錯誤訊息>>>> " . $this->sendmail->ErrorInfo;	 
		} 	
	}
	//忘記密碼
	public function member_forget($memberIDkey) {
		global $table_name_member;
		$obj_member = new mysql_page();
		
		//orderlist data
		$query = "select id, name, password from ".$table_name_member." where id='".$memberIDkey."'";	
		$member= $obj_member->run_mysql_out($query);
		//phpmailer init
		$this->sendmail->From = Company_Email;
		$this->sendmail->FromName = Company_Name;
		$this->sendmail->AddReplyTo(Company_Email, Company_Name);
		$this->sendmail->Subject = Html_Title.' 忘記密碼';
		$this->sendmail->AddAddress($member['id'], $member['name']);
		
		if ($member['id']) {		
			$this->sendmail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>'.Html_Title.'</title>
			</head>
			
			<body style="margin-top:0px; margin-left:0px">
			<p>親愛的會員 '.$member['name'].' 您好：</p>
			<p>以下為您在<a href="'.Host_Name.'" target="_blank">'.Html_Title.'</a>所註冊的資料</p>
			<p>&nbsp;</p>
			<p>帳號：'.$member['id'].'</p>
			<p>密碼：'.base64_decode($member['password']).'</p>
			<p>&nbsp;</p>
			<p>建議您在獲得密碼之後，回到網站登入並修改密碼，以確保網路帳號安全性，謝謝。<br>(此信件由系統發送，請勿直接回覆)</p>
			</body>
			</html>';
			
			//echo $this->sendmail->Body;exit;
			if(!$this->sendmail->Send()) {	 
				echo "錯誤!信件無法送出<br>";		 
				echo "Mailer 錯誤訊息>>>> " . $this->sendmail->ErrorInfo;	 
			} 	
			js_a_l('信件已發送到您註冊時所填寫的信箱，謝謝', 'index.php');exit;
		}else {
			js_a_l('無此帳號記錄', 'login.php?l=forget');	exit;
		}
	}
	//聯絡我們
	public function contact_mail($name, $phone, $email, $content) {
		//phpmailer init
		$this->sendmail->From = $email;
		$this->sendmail->FromName = $name;
		$this->sendmail->AddReplyTo($email, $name);
		$this->sendmail->Subject = Html_Title.' 聯絡我們';
		$this->sendmail->AddAddress(Company_Email, Company_Name);
		
		$this->sendmail->Body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>'.Html_Title.' 聯絡我們</title>
		</head>
		
		<body>
		<table align="center" cellpadding=2 cellspacing=0 border=0 width="800">
			<tr><td>
			<table width=0 border=0 cellspacing=0 cellpadding=2>
			<tr>
				<td align="left"><p>姓名: '.$name.'</p><p>聯絡電話: '.$phone.'</p><p>E-mail: '.$email.'</p><p>標題: '.$title.'</p><p>訊息內容: '.$content.'</p></td>
			</tr>
			</table></td>
		  </tr>
		</table>
		</body></html>';
		
		//echo $this->sendmail->Body;exit;
		if(!$this->sendmail->Send()) {	 
			echo "錯誤!信件無法送出<br>";		 
			echo "Mailer 錯誤訊息>>>> " . $this->sendmail->ErrorInfo;	 
		} 	
	}
	//訂單通知
	public function orderlist_done($order_id) {
		global $twzipcode, $array_pay_type, $table_name_order, $table_name_prod;
		$obj_order   = new mysql_page();
		$obj_order_d = new mysql_page();
		$obj_prod    = new mysql_page();
		
		//orderlist data
		$query = "select * from ".$table_name_order." where id='".$order_id."'";	
		$order = $obj_order->run_mysql_out($query);
		//detail list
		$query = "select * from ".$table_name_order."_detail where order_id='".$order_id."'";
		$obj_order_d->run_mysql_list($query);
		//phpmailer init
		$this->sendmail->From = Company_Email;
		$this->sendmail->FromName = Company_Name;
		$this->sendmail->AddReplyTo(Company_Email, Company_Name);
		$this->sendmail->Subject = Html_Title.' 線上交易訂單通知';
		$this->sendmail->AddAddress($order['order_email'], $order['order_name']);
		//address
		$order['pay_info'] = str_replace("|", "<br>", $order['pay_info']);
		
		$this->sendmail->Body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>'.Html_Title.' 線上交易訂單通知</title>
		<style type="text/css">
		<!--
		a:link {
			color: #967A25;
			text-decoration: underline;
		}
		.style1 {color: #58633F}
		.style3 {color: #FF6600}
		.f {
			font-family: Georgia, "Times New Roman", Times, serif;
			font-size: 12px;
			line-height: 20px;
			color: #333333;
			text-decoration: none;
		}
		-->
		</style>
		</head>
		
		<body>
		<table align="left" cellpadding=2 cellspacing=0 border=0>
			<tr><td>
			<table width=0 border=0 cellspacing=0 cellpadding=2>
			<tr>
				<td align="left"><span>親愛的顧客您好，感謝您對'.Html_Title.'的支持並承蒙訂購，如下為此次的訂購明細：</span><br><br><br>訂單編號: '.$order_id.'</td>
			</tr>
			</table></td>
		  </tr>
		  <tr>
			<td><TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
			  <TBODY>
				<TR>
				  <TD vAlign=center bgcolor=#FFFFFF>
					<table width="620" border="0" align="center" cellpadding="5" cellspacing="0">
						<tr>
							  <td bgcolor="#D3DDD2" class="f_ECpageList" style="width:200px"><div align="center" class="style1">商品名稱</div></td>
							  <td bgcolor="#D3DDD2" class="f_ECpageList" style="width:70px"><div align="center" class="style1">規格</div></td>
							  <td bgcolor="#D3DDD2" class="f_ECpageList" style="width:70px"><div align="center" class="style1">顏色</div></td>
							  <td bgcolor="#D3DDD2" class="f_ECpageList" style="width:70px"><div align="center" class="style1">尺寸</div></td>
							  <td bgcolor="#D3DDD2" class="f_ECpageList" style="width:70px"><div align="center" class="style1">數量</div></td>
							  <td bgcolor="#D3DDD2" class="f_ECpageList" style="width:70px"><div align="center" class="style1">單價</div></td>
							  <td bgcolor="#D3DDD2" class="f_ECpageList" style="width:70px"><div align="center" class="style1"><div align="right">小計</div></div></td>
						</tr>';					
				
						for($i=0; $i<$obj_order_d->obj_all; $i++) {
							$detail = mysql_fetch_array($obj_order_d->result);	
							if($detail) { 
								//商品規格
								$query = "select name from ".$table_name_prod."_type where id='".$detail['prod_type_id']."'";
								$type  = $obj_prod->run_mysql_out($query);
								//商品顏色
								$query = "select name from ".$table_name_prod."_color where id='".$detail['prod_color_id']."'";
								$color = $obj_prod->run_mysql_out($query);
								//商品尺寸
								$query = "select name from ".$table_name_prod."_size where id='".$detail['prod_size_id']."'";
								$size  = $obj_prod->run_mysql_out($query);
								$this->sendmail->Body = $this->sendmail->Body.'<tr>
								  <td align="left" class="f_ECpageList">'.$detail['prod_name'].'</td>
								  <td align="center" valign="middle">'.$type['name'].'</td>
								  <td align="center" valign="middle">'.$color['name'].'</td>
								  <td align="center" valign="middle">'.$size['name'].'</td>
								  <td align="center" valign="middle">'.$detail['prod_num'].'</td>
								  <td align="center" class="f_ECpageList">'.number_format($detail['prod_price']).'元</td>
								  <td align="center" class="f_ECpageList">'.number_format($detail['prod_num']*$detail['prod_price']).'元</td>
								</tr>';
							}
						}			
						
						$this->sendmail->Body = $this->sendmail->Body.'
						<tr>
						  <td class="f_ECpageList">&nbsp;</td>
						  <td class="f_ECpageList">&nbsp;</td>
						  <td class="f_ECpageList">&nbsp;</td>
						  <td class="f_ECpageList">&nbsp;</td>
						  <td class="f_ECpageList">&nbsp;</td>
						  <td class="f_ECpageList"><div align="right"></div></td>
						  <td class="f_ECpageList"><div align="right"></div></td>
						</tr>
						<tr>
						  <td colspan="5" bgcolor="#EBECE6" class="f_ECpageList"><div align="right" class="style1">小計</div></td>
						  <td colspan="2" bgcolor="#EBECE6" class="f_ECpageList">
						  <div align="center" class="style1">
							  <div align="right"><strong>NT$ '.number_format($order['total_price']).' </strong></div>
						  </div></td>
						</tr>
						<tr>
						  <td colspan="5" bgcolor="#EBECE6" class="f_ECpageList"><div align="right" class="style1">運費</div></td>
						  <td colspan="2" bgcolor="#EBECE6" class="f_ECpageList">
						  <div align="center" class="style1">
							  <div align="right"><strong>NT$ '.number_format($order['cart_price']).' </strong></div>
						  </div></td>
						</tr>
						<tr>
						  <td colspan="5" bgcolor="#EBECE6" class="f_ECpageList"><div align="right" class="style1">總計</div></td>
						  <td colspan="2" bgcolor="#EBECE6" class="f_ECpageList">
						  <div align="center" class="style1">
							  <div align="right"><strong>NT$ '.number_format($order['total_price'] + $order['cart_price']).' </strong></div>
						  </div></td>
						</tr>
				  </TABLE></TD>
				</TR>
			  </TBODY>
			</TABLE></td>
		  </tr>
		  <tr>
			<td><div align=center>';
		$this->sendmail->Body = $this->sendmail->Body.'	  <table width="550" border="0" align="center" cellpadding="5" cellspacing="0">
							<tr>
							  <td colspan="2" style="background-color: #719C6B; font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; font-weight: bold; color: #FFFFFF; text-decoration: none;">訂購人資料明細</td>
							</tr>
							<tr>
							  <td width="125" bgcolor="#EBECE6" class="f"><div align="right">姓　　名：</div></td>
							  <td align="left" width="405" class="f">'.$order['order_name'].'</td>
							</tr>
							<tr>
							  <td bgcolor="#EBECE6" class="f"><div align="right">手機號碼：</div></td>
							  <td align="left" class="f">'.$order['order_mobile'].'</span></td>
							</tr>
							<tr>
							  <td bgcolor="#EBECE6" class="f"><div align="right">連絡電話：</div></td>
							  <td align="left" class="f">'.$order['order_phone'].'</span></td>
							</tr>
							<tr>
							  <td bgcolor="#EBECE6" class="f"><div align="right">E-mail：</div></td>
							  <td align="left" class="f">'.$order['order_email'].'</span></td>
							</tr>
							<tr>
							  <td bgcolor="#EBECE6" class="f"><div align="right">收件地址：</div></td>
							  <td align="left" class="f">'.$obj_lucky->address.'</span></td>
							</tr>
							<tr>
							  <td bgcolor="#EBECE6" class="f"><div align="right">配送時間：</div></td>
							  <td align="left" class="f">'.$order['receive_time'].'</span></td>
							</tr>
							<tr>
							  <td bgcolor="#EBECE6" class="f"><div align="right">付款方式：</div></td>
							  <td align="left" class="f">'.$array_pay_type[$order['pay_type']].'</span></td>
							</tr>
							<tr>
							  <td bgcolor="#EBECE6" class="f"><div align="right">付款資訊：</div></td>
							  <td align="left" class="f">'.$order['pay_info'].'</span></td>
							</tr>
							<tr>
							  <td height="30" colspan="2" class="f"><hr size="1" noshade class="line01"></td>
							</tr>
							<tr>
							  <td colspan="2" class="f"><div align="left">
							  感謝您的購物，在此提醒您<br /><br />
							  <span class="pink_12_bold">1.我們並不會電話通知您有關匯款的任何資訊<br />
							  2.請勿聽信電話另一端操作提款機</span><br /><br />
							  願您收到貨品時會滿意我們提供的服務。</div></td>
							</tr>
							<tr>
							  <td height="30" colspan="2" class="f"><hr size="1" noshade class="line01"></td>
							</tr>
							<tr>
							  <td colspan="2" class="f"><div align="center">&nbsp;</div></td>
							</tr>
						  </table>
			</div></td>
		</tr>
		</table>
		</body></html>';
		
		//echo $this->sendmail->Body;exit;
		if(!$this->sendmail->Send()) {	 
			echo "錯誤!信件無法送出<br>";		 
			echo "Mailer 錯誤訊息>>>> " . $this->sendmail->ErrorInfo;	 
		} 	
	}
}
?>