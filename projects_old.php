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
    <!-- 基本款式 結束 --> 
    
    <link rel="stylesheet" type="text/css" href="css_new/1900/style_1900.css" media="screen and (min-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/1200/style_1200.css" media="screen and (min-width: 1200px) and (max-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/980/style_980.css" media="screen and (max-width: 1200px)">
    
    <script language="javascript">
		$(document).ready(function(){
			if ( $(window).width() >= 1900 ){
				$.getScript("js_new/1900/project_10_1900.js");
			} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
				$.getScript("js_new/1200/project_10_1200.js");
				//alert("1900~1200");
			} else {
				$.getScript("js_new/980/project_10_980.js");
			}
			
			$(window).resize(function() {
				if ( $(window).width() >= 1900 ){
					$.getScript("js_new/1900/project_10_1900.js");
				} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
					$.getScript("js_new/1200/project_10_1200.js");
				} else {
					$.getScript("js_new/980/project_10_980.js");
				}
			});
		});
    </script>
    
    <link rel="stylesheet" type="text/css" href="css_new/1900/projects_10_1900.css" media="screen and (min-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/1200/projects_10_1200.css" media="screen and (min-width: 1200px) and (max-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/980/projects_10_980.css" media="screen and (max-width: 1200px)">
        	    

	<!-- 作品小圖文字動畫 -->
	<script type="text/javascript">
        $(document).ready(function(){
            $('.boxgrid.captionfull').hover(function(){
                $(".cover", this).stop().animate({top:'0px'},{queue:false,duration:350});
                }, function() {
                    $(".cover", this).stop().animate({top:'350px'},{queue:false,duration:350});
            });	
        });
    </script>
	
    
</head>

<body>


<div class="wapper_01">
   
    <!-- 十格作品 -->
    <div class="content">
    	<ol class="projects-list">
        	<li>
    
<?
	$textColor = xwaterfrom_proj_category_titlecolorr1($Conn);
	$sql1 = "select * from waterfrom_proj_category where lang='tw' order by sort asc limit 0, 4";	
	$rl1 = mysql_query($sql1, $Conn);
	//$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);	
	$i = 1;
	while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){	
		$sqlA1  = "select * from waterfrom_album where ";	
		$sqlA1 .= "category = '" . $row1['id'] . "' and ";
		$sqlA1 .= "lang = 'tw' ";
		$sqlA1 .= "order by sort desc";	
		//echo $sqlA1;
		
		$rlA1 = mysql_query($sqlA1, $Conn);
		$rowA1 = mysql_fetch_array($rlA1, MYSQL_ASSOC);	
		
		$album_id = $rowA1['id'];	
?>
            	<!-- 0<?=$i?> -->
                <style type="text/css">.project-list-item.project-list-item-ga<?=$row1['id']?> .hover-container:before{background-color: #<?=$row1['colorcode']?>;}</style>
                <article class="project project-list-item project-list-item-ga<?=$row1['id']?>">
                    <a class="thumb-container" href="projects_02.php?category=<?=$row1['id']?>&id=<?=$album_id?>">
                        <img width="101%" height="101%" src="proj_category/<?=$row1['file1']?>" alt="<?=$row1['alt']?>" />    
                    </a>
                    <a class="hover-container trans-btn" href="projects_02.php?category=<?=$row1['id']?>&id=<?=$album_id?>">
                        <div class="hover trans-btn"></div>
                    </a>
                    <a class="thumb-container thumb-container-type" href="projects_02.php?category=<?=$row1['id']?>&id=<?=$album_id?>" style="color:#<?=$textColor?>;">
                    	<div class="title"><div class="title_01"><?=$row1['name']?></div></div>
                    </a>
                    <a class="thumb-container thumb-container-type2" href="projects_02.php?category=<?=$row1['id']?>&id=<?=$album_id?>" style="color:#<?=$textColor?>;">
                    	<div class="boxgrid captionfull" id="boxgrid">
                            <div class="cover boxcaption"><div class="title"><div class="title_02"><?=$row1['name2']?></div></div></div>
                        </div>
                    </a>
                </article>
                <!-- 0<?=$i?> -->
            </li>
<?	
		$i++;
	}
?>    
            </li>
        </ol>
    </div>

    <div class="content2">
    	<ol class="projects-list">
        	<li>
    
<?
	$sql1 = "select * from waterfrom_proj_category where lang='tw' order by sort asc limit 4, 4";	
	$rl1 = mysql_query($sql1, $Conn);
	//$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);	
	$i = 1;
	while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){	
		$sqlA1  = "select * from waterfrom_album where ";	
		$sqlA1 .= "category = '" . $row1['id'] . "' and ";
		$sqlA1 .= "lang = 'tw' ";
		$sqlA1 .= "order by sort desc";	
		//echo $sql1;
		
		$rlA1 = mysql_query($sqlA1, $Conn);
		$rowA1 = mysql_fetch_array($rlA1, MYSQL_ASSOC);	
		
		$album_id = $rowA1['id'];
?>
            	<!-- 0<?=$i?> -->
                <style type="text/css">.project-list-item.project-list-item-ga<?=$row1['id']?> .hover-container:before{background-color: #<?=$row1['colorcode']?>;}</style>
                <article class="project project-list-item project-list-item-ga<?=$row1['id']?>">
                    <a class="thumb-container" href="projects_02.php?category=<?=$row1['id']?>&id=<?=$album_id?>">
                        <img width="101%" height="101%" src="proj_category/<?=$row1['file1']?>" alt="<?=$row1['alt']?>" />    
                    </a>
                    <a class="hover-container trans-btn" href="projects_02.php?category=<?=$row1['id']?>">
                        <div class="hover trans-btn"></div>
                    </a>
                    <a class="thumb-container thumb-container-type" href="projects_02.php?category=<?=$row1['id']?>&id=<?=$album_id?>" style="color:#<?=$textColor?>;">
                    	<div class="title"><div class="title_01"><?=$row1['name']?></div></div>
                    </a>
                    <a class="thumb-container thumb-container-type2" href="projects_02.php?category=<?=$row1['id']?>&id=<?=$album_id?>" style="color:#<?=$textColor?>;">
                    	<div class="boxgrid captionfull">
                        	<div class="cover boxcaption"><div class="title"><div class="title_02"><?=$row1['name2']?></div></div></div>
                        </div>
                    </a>
                </article>
                <!-- 0<?=$i?> -->
            </li>
<?	
		$i++;
	}
?>    
            </li>
        </ol>
    </div>    


    
    
    
    <!-- menu-->
    <div class="projects_menu">
		<?php include('include_menu.php');?>
    </div>
    
    
    <!-- logo區 -->
    <div class="projects_logo" style="background:#<?=xwaterfrom_proj_category_titlecolorr2($Conn)?>;">
        <a href="index.php">
        	<div class="index_logo"><img src="images/logo2.png" width="100%"></div>
      		<!--<div class="index_name">Taipei  |  Shanghai</div>-->
        </a>
        <div class="index_slogan"></div>
    </div>
    
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
