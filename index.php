<?
	session_start();

	require_once('admin/includes/xprog.php');
	$Conn = DB_Open();	
	//echo $Conn;	
	
	list($html_title, $keywords, $description) = xheader_r1($Conn);
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

<meta name="keywords" content="<?=$keywords?>">
<meta name="description" content="<?=$description?>" />
<title><?=$html_title?></title>
<link rel="icon" type="image/png" href="favicon.png" />
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- 基本款式 開始 -->     
	<link rel="stylesheet" href="css_new/reset.css">
    <link rel="stylesheet" href="css_new/font.css">
    <link rel="stylesheet" href="css_new/word.css">
    <link rel="stylesheet" href="css_new/style_all.css">
    <script src="js_new/jquery-1.11.1.min.js"></script>
	<script src="js_new/other.js"></script>
    <script src="js_new/contact.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css_new/1900/style_1900.css" media="screen and (min-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/1200/style_1200.css" media="screen and (min-width: 1200px) and (max-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/980/style_980.css" media="screen and (max-width: 1200px)">
    
    <!-- banner 開始 -->
    <link rel="stylesheet" type="text/css" href="css_new/1900/banner_1900.css" media="screen and (min-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/1200/banner_1200.css" media="screen and (min-width: 1200px) and (max-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/980/banner_980.css" media="screen and (max-width: 1200px)">
    <script src='' id="s1"></script>
	<script language="javascript">
		$(document).ready(function(){
			if ( $(window).width() >= 1900 ){
				$.getScript("js_new/1900/banner_1900.js");
			} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
				$.getScript("js_new/1200/banner_1200.js");
			} else {
				$.getScript("js_new/980/banner_980.js");
			}
		});
    </script>
    <!-- banner 結束 --> 
    
</head>

<body>

<div class="wapper_01">
	<div class="index_menu_01">
		<?php include('include_menu.php');?>
    </div>
<?
	$sql1 = "select * from waterfrom_banner where lang='tw' order by sort asc";	
	$rl1 = mysql_query($sql1, $Conn);
	//$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);	
	$i = 1;
?>    
	<style type="text/css">
<?
	$i = 1;
	while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){										
?>	
    .index_info_0<?=$i?> { background:#<?=$row1['color_code']?>;}
<?
		$i++;
	}
?>		
    </style>
<?	
	$rl1 = mysql_query($sql1, $Conn);
	$i = 1;
	while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){	
	
		$tmpArr = array($row1['file1'], $row1['file2'], $row1['file3'], $row1['file4']);
		$rand_keys = array_rand($tmpArr, 1);			
		//echo $rand_keys . "<br>";		
		$Oimg = $tmpArr[$rand_keys];
		//echo $Oimg . "<br><br>";		
?>        
        <!-- 0<?=$i?> -->
        <div class="banner_0<?=$i?>">
            <div class="banner_0<?=$i?>_01">
            	<img src="banner/<?=$Oimg?>" alt="<?=$row1['alt']?>" height="100%">
            </div>
        </div>

        <div class="index_info_0<?=$i?>">
            <a href="index.php">
                <div class="index_logo"><img src="images/logo2.png" width="100%"></div>
            </a>
            <div class="index_slogan">
                <?=htmlspecialchars_decode($row1['slogen'])?>
            </div>
        </div>
        <a href="#"><div class="prv_0<?=$i?>"></div></a>
<?
		if($i == 4){
?>
		<a href="projects.php"><div class="next_0<?=$i?>"></div></a>
<?		
		}	else	{
?>
        <a href="#"><div class="next_0<?=$i?>"></div></a>	
<?			
		}
?>  
        <!-- 0<?=$i?> -->
<?	
		$i++;
	}
?>  
    
	<!-- contact -->
    <?php include('include_contact.php');?>	
    
</div>
    
</body>
</html>

<script src="js/jquery-1.11.1.min.js"></script>

<script>
	$(document).ready(function(){
		$(document).bind("contextmenu",function(event){
			return false;
		});
	});
</script>
