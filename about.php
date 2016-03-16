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
	
</head>

<body>

<div class="wapper_03" style="opacity:0;">
<div>

    
    <!-- logo區 -->
    <div class="profile_logo">
    </div>
    
    <!-- menu-->
    <div class="profile_menu">
		<?php include('include_menu.php');?>
    </div>


<?
	$sql1 = "select * from waterfrom_aboutus where lang='tw'";	
	$rl1 = mysql_query($sql1, $Conn);

	$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);
?>    
    <!-- 左側 info區 -->
    <div class="projects_info" id="scrollable_div2">
    	<input value="activate scrollator" id="activate_scrollator2" type="image" src="images/white.png" style="width:0px; height:0px; display:none;">
        <div style="width:100%; height:1px; overflow:hidden; color:#F0F0F0;">今年一月號室內雜誌完整報導了水相設計去年住宅案新作『Timeless』，此棟位於淡水的名宅特色是一戶一泳池，遠眺觀音山淡水河出海</div>
        
        <?=htmlspecialchars_decode($row1['content'])?>
    
    </div>
    
    
    <!-- contact -->
    <?php include('include_contact.php');?>	
 
</div>
</div>	
    
    <!-- 捲軸 --> 
    <link rel="stylesheet" href="css/fm.scrollator.jquery.css" />
	<style>
		
		#scrollable_div1 {
			overflow: auto;
			box-sizing: border-box;
		}
		#scrollable_div2 {
			overflow: auto;
			box-sizing: border-box;
		}
	</style>
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/fm.scrollator.jquery.js"></script>
	<script>
		$(function () {
			var $activate_scrollator1 = $('#activate_scrollator1');
			var $activate_scrollator2 = $('#activate_scrollator2');
			var $activate_scrollator3 = $('#activate_scrollator3');

			$activate_scrollator1.bind('click', function () {
				var $scrollable_div1 = $('#scrollable_div1');
				if ($scrollable_div1.data('scrollator') === undefined) {
					$scrollable_div1.scrollator();
					$activate_scrollator1.val('destroy scrollator')
				} else {
					$scrollable_div1.scrollator('destroy');
					$activate_scrollator1.val('activate scrollator')
				}
			});
			$activate_scrollator2.bind('click', function () {
				var $scrollable_div2 = $('#scrollable_div2');
				if ($scrollable_div2.data('scrollator') === undefined) {
					$scrollable_div2.scrollator();
					$activate_scrollator2.val('destroy scrollator')
				} else {
					$scrollable_div2.scrollator('destroy');
					$activate_scrollator2.val('activate scrollator')
				}
			});
			$activate_scrollator3.bind('click', function () {
				var $document_body = $('body');
				if ($document_body.data('scrollator') === undefined) {
					$document_body.scrollator({
						custom_class: 'body_scroller'
					});
					$activate_scrollator3.val('destroy scrollator')
				} else {
					$document_body.scrollator('destroy');
					$activate_scrollator3.val('activate scrollator')
				}
			});

			$activate_scrollator1.trigger('click');
			$activate_scrollator2.trigger('click');
			$activate_scrollator3.trigger('click');
		});
	</script>
    <!-- 捲軸 --> 
    
</body>
</html>

<script>
	$(document).ready(function(){
		$(document).bind("contextmenu",function(event){
			return false;
		});
	});
</script>
