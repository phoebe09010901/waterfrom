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
	
	<link rel="stylesheet" type="text/css" href="css_new/1900/projects_10_1900_02.css" media="screen and (min-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/1200/projects_10_1200_02.css" media="screen and (min-width: 1200px) and (max-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/980/projects_10_980_02.css" media="screen and (max-width: 1200px)">
    
    <script>
	$(document).ready(function(){
		//alert(($(window).height()-40)/4);
		
		if ( $(window).width() >= 1900 ){
			windowWidth=($(window).height()-80)/4;
			windowRight=($(window).height()-80)/4+30;
		} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
			windowWidth=($(window).height()-40)/4;
			windowRight=($(window).height()-40)/4+30;
		} else {
			windowWidth='155.75';
			windowRight='185.75';
		}
		$(".content,.content2,.content3").animate({
			width:windowWidth+'px'
		},0);
		$(".content2").animate({
			right:windowRight+'px'
		},0);
		
		$(window).resize(function() {
			if ( $(window).width() >= 1900 ){
				windowWidth=($(window).height()-80)/4;
				windowRight=($(window).height()-80)/4+30;
			} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
				windowWidth=($(window).height()-40)/4;
				windowRight=($(window).height()-40)/4+30;
			} else {
				windowWidth='155.75';
				windowRight='185.75';
			}
			$(".content,.content2,.content3").animate({
				width:windowWidth+'px'
			},0);
			$(".content2").animate({
				right:windowRight+'px'
			},0);
		});
		
	});
	</script>
    
</head>

<body>

<div class="wapper_01">
   
    <!-- 十格作品 -->
    <div class="content" style=" overflow-y:hidden;">
		
		<style>
		.pic_block.b1{ background:url(proj_category/1441948950.jpg) no-repeat top left; background-size:100% 100%;}
		.pic_block.b1:hover:after{ background-color: rgba(167,167,154,.8);}
        </style>
        <div class="pic_block b1" data-eng="Residential1" data-zh="室內設計1"></div>
        <style>
		.pic_block.b2{ background:url(proj_category/1441947858.jpg) no-repeat top left; background-size:100% 100%;}
		.pic_block.b2:hover:after{ background-color: rgba(117,152,165,.8);}
        </style>
        <div class="pic_block b2" data-eng="Residential2" data-zh="室內設計2"></div>
        <style>
		.pic_block.b3{ background:url(proj_category/1441948333.jpg) no-repeat top left; background-size:100% 100%;}
		.pic_block.b3:hover:after{ background-color: rgba(63,66,68,.8);}
        </style>
        <div class="pic_block b3" data-eng="Residential3" data-zh="室內設計3"></div>
        <style>
		.pic_block.b4{ background:url(proj_category/1441948962.jpg) no-repeat top left; background-size:100% 100%;}
		.pic_block.b4:hover:after{ background-color: rgba(72,88,67,.8);}
        </style>
        <div class="pic_block b4" data-eng="Residential4" data-zh="室內設計4"></div>
        
    </div>
    
    <div class="content2" style=" overflow-y:hidden;">
		
		<style>
		.pic_block.b5{ background:url(proj_category/1441946886.jpg) no-repeat top left; background-size:100% 100%;}
		.pic_block.b5:hover:after{ background-color: rgba(72,88,67,.8);}
        </style>
        <div class="pic_block b5" data-eng="Residential1" data-zh="室內設計1"></div>
        <style>
		.pic_block.b6{ background:url(proj_category/1441948971.jpg) no-repeat top left; background-size:100% 100%;}
		.pic_block.b6:hover:after{ background-color: rgba(63,66,68,.8);}
        </style>
        <div class="pic_block b6" data-eng="Residential2" data-zh="室內設計2"></div>
        <style>
		.pic_block.b7{ background:url(proj_category/1441948128.jpg) no-repeat top left; background-size:100% 100%;}
		.pic_block.b7:hover:after{ background-color: rgba(117,152,165,.8);}
        </style>
        <div class="pic_block b7" data-eng="Residential3" data-zh="室內設計3"></div>
        <style>
		.pic_block.b8{ background:url(proj_category/1441947151.jpg) no-repeat top left; background-size:100% 100%;}
		.pic_block.b8:hover:after{ background-color: rgba(167,167,154,.8);}
        </style>
        <div class="pic_block b8" data-eng="Residential4" data-zh="室內設計4"></div>
        
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
<!--
<script>
	$(document).ready(function(){
		$(document).bind("contextmenu",function(event){
			return false;
		});
	});
</script>
-->