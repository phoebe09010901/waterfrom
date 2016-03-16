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
			
	$Conn = DB_Open($Conn); 

	$tdt = date('Y-m-d G:h:i');	

	$color_code = format_data($_REQUEST['color_code'], 'text');

	$sqlC = "select * from waterfrom_proj_category_titlecolor2";
	$rlC = mysql_query($sqlC);
	
	$tmpC = mysql_num_rows($rlC);
	//echo $tmpC;
	if($tmpC > 0){
		$sql  = "Update waterfrom_proj_category_titlecolor2 Set ";				
		$sql .= "color_code = '" . $color_code . "', ";												
		$sql .= "edit_time = '" . $tdt . "' ";
			
	}	else	{
		$sql  = "insert into waterfrom_proj_category_titlecolor2 Values(";	
		$sql .= "'', ";							//Fullkey
		$sql .= "'', ";							//lang			
		$sql .= "'" . $color_code . "', ";		//color_code
		$sql .= "'1', ";						//pub				
		$sql .= "'', ";							//hit_counts	
	
		$sql .= "'$tdt', ";					//create_time	
		$sql .= "'$tdt' ";						//edit_time			
		
		$sql .= ")";
	
		//break;
	}
	
	//echo $sql . '-----<br>';	
	//break;
	mysql_query($sql);

	
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
	alert('資料已儲存。');
	location.replace('../proj_category.php');
</script>