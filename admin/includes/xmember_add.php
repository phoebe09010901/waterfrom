<? 
	session_start();

	if(!isset($_SESSION)){
		session_start();
	}	
	
	if($_SESSION["key"] != md5($_REQUEST['url'])){
		//header( "location: ../../index.php ");
		//break;
	}
	//break;
	
	require_once("xprog.php");
	require_once("function_string.php");	
	require_once("array_twzipcode.php");	
	
	$Conn = DB_Open($Conn); 

	$tdt = date('Y-m-d G:h:i');	

	$name = format_data($_POST['name'], 'text');
	$email = format_data($_POST['email'], 'text');		

	$sql  = "insert into health_member Values(";	
	$sql .= "'', ";							//Fullkey
	$sql .= "'" . $account . "', ";			//name			
	$sql .= "'" . $password . "', ";		//phone
	$sql .= "'" . $name . "', ";			//mobile				
	$sql .= "'" . $id_number . "', ";		//carType	
	
	$sql .= "'" . $sex . "', ";				//name			
	$sql .= "'" . $birthday . "', ";		//phone
	$sql .= "'" . $email . "', ";			//mobile				
	$sql .= "'" . $zipcode . "', ";			//carType	

	$sql .= "'" . $county . "', ";			//name			
	$sql .= "'" . $area . "', ";			//phone
	$sql .= "'" . $address . "', ";			//mobile				
	$sql .= "'" . $phone . "', ";			//carType	

	$sql .= "'" . $mobile . "', ";			//name			
	$sql .= "'1', ";						//phone
	$sql .= "'1', ";						//mobile				
	$sql .= "'now()', ";					//carType	
	$sql .= "'now()', ";					//carType	
	$sql .= "'now()' ";						//carType			
	
	$sql .= ")";

	//echo $sql . '<br>';
	//break;
	mysql_query($sql);

	//通知信

	/*
	//break;
	$html = '';
	$htmlname = "xmail.html";		

	$handle = @fopen($htmlname, "r");
	if ($handle)
	{
		  while (!feof($handle))
		  {
				//fgets為每次讀取一列文字
				$tmp = fgets($handle);
				$tmp = str_replace('<?=$name?>', 		$name, 				$tmp);					
				$tmp = str_replace('<?=$phone?>', 		$phone, 			$tmp);					
				$tmp = str_replace('<?=$email?>', 		$email, 			$tmp);										
				$tmp = str_replace('<?=$message?>', 	$message, 			$tmp);									
																																																		
				$html .= $tmp;
		  }
	}	

	//echo $html;

	$subject = "三風能源科技有限公司 Vasr Energy Technology Co., Ltd.";
	//$u_email = "service@ftm.com.tw";	
	
	xmails1($Conn, $subject, $email, $contact, '', $html);
	$_SESSION['key'] = 'ERROR';
	*/
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
</body>
</html>
<script>
	alert('我們會盡快與您連絡。');
	location.replace('<?=$_SESSION['URL']?>');
</script>