<?
	session_start();

	require_once('admin/includes/xprog.php');
	$Conn = DB_Open();	
	//echo $Conn;	
	
	list($html_title, $keywords, $description) = xheader_r1($Conn);

	$category = $_GET['category'];
	$sql1  = "select * from waterfrom_proj2_category where ";
	$sql1 .= "id = $category and ";		
	$sql1 .= "pub = 1 and ";							
	$sql1 .= "lang = 'tw' ";
	$sql1 .= "order by name desc";	
	
	$rl1 = mysql_query($sql1, $Conn);
	
	/* 加了這段網頁不能跑
	$tmpC = mysql_num_rows($rl1); 		

	if($tmpC == 0){
		header("location: test2.php");
		exit;
	}	
	*/
?>	
<!DOCTYPE html>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

<meta name="keywords" content="<?=$keywords?>">
<meta name="description" content="<?=$description?>" />
<title><?=$html_title?></title>
<link rel="icon" type="image/png" href="favicon.png" />

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
	
	<!-- menu  -->
    <script>
		$(document).ready(function(){
			if ( $(window).width() >= 1900 ){
				$(".press_menu").animate({
					right: (($(window).height()/4)+30) + 'px'
				});
			} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
				$(".press_menu").animate({
					right: (($(window).height()/4)+25) + 'px'
				});
			} else {
				$(".press_menu").animate({
					right: (($(window).height()/4)+15) + 'px'
				});
			}
			
			$(window).resize(function() {
				if ( $(window).width() >= 1900 ){
					$(".press_menu").animate({
						right: (($(window).height()/4)+30) + 'px'
					});
				} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
					$(".press_menu").animate({
						right: (($(window).height()/4)+25) + 'px'
					});
				} else {
					$(".press_menu").animate({
						right: (($(window).height()/4)+15) + 'px'
					});
				}
			});
		});
    </script>
    <!-- menu  -->
	
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
<div class="wapper_03" style="opacity:0;">
<div>
    
    <!-- 十格作品 -->
    <div class="content3" id="scrollable_div1">
        <input value="activate scrollator" id="activate_scrollator1" type="image" src="images/white.png" style="width:0px; height:0px; display:none;">
        
    	<ol class="projects-list">
<?
			$textColor = xwaterfrom_proj_category2_titlecolorr1($Conn);
			$sql1  = "select * from waterfrom_proj2_category where ";
			$sql1 .= "pub = 1 and ";				
			$sql1 .= "lang = 'tw' ";
			$sql1 .= "order by name desc";	
			
			$rl1 = mysql_query($sql1, $Conn);
			//$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);	
			$i = 1;
			while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){	
?>        
        	<li>
            	<!-- 0<?=$i?> -->
                <style type="text/css">.project-list-item.project-list-item-ga<?=$row1['id']?> .hover-container:before{background-color: #<?=$row1['colorcode']?>;}</style>
                <article class="project project-list-item project-list-item-ga<?=$row1['id']?>">
                    <a class="thumb-container current" href="press_02.php?category=<?=$row1['id']?>" title="">
                        <img width="101%" height="101%" src="proj2_category/<?=$row1['file1']?>" alt="<?=$row1['alt']?>" />    
                    </a>
                    <a class="hover-container trans-btn" href="press_02.php?category=<?=$row1['id']?>">
                        <div class="hover trans-btn"></div>
                    </a>
                    <a class="thumb-container thumb-container-type" href="press_02.php?category=<?=$row1['id']?>" style="color:#<?=$textColor?>;">
                    	<div class="title"><div class="title_01"><?=$row1['name']?></div></div>
                    </a>
                </article>
                <!-- 0<?=$i?> -->
            </li>
<?
		$i++;
			}
?>                
          
        </ol>
    </div>
    
    <!-- menu -->
    <div class="press_menu">
		<?php include('include_menu.php');?>
    </div>
    
    <!-- 左側圖片 -->
    <div class="press_info" id="scrollable_div2">
    	<input value="activate scrollator" id="activate_scrollator2" type="image" src="images/white.png" style="width:0px; height:0px; display:none;">
        
    	<ol class="projects-list">
<?
			$category = $_GET['category'];
			$sql1  = "select * from waterfrom_album2 where ";
			$sql1 .= "category = '$category' and ";
			$sql1 .= "pub = 1 and ";	
			$sql1 .= "lang = 'tw' ";
			$sql1 .= "order by sort desc";	
			//echo $sql1;
			
			$rl1 = mysql_query($sql1, $Conn);
			//$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);	
			$i = 1;
			while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){	
			
			
			if($row1['file3'] != ""){
				$pdf = "album2/" . $row1['file3'];
				$target = "target=\"_blank\"";
			}	else	{
				$pdf = "#";			
				$target = "";							
			}
?>        
        	<li>
				<!-- <?=$i?> -->
                <div class="info_01">
                	<div class="left_info">
                    	<div class="font_01"><?=$row1['title2']?></div>
                      	<div class="font_02"><?=$row1['title']?></div><br><br>
                        <div class="font_03"><?=$row1['period']?></div>
                    </div>
                    
                    <div class="right_pic">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="right" valign="bottom">
                                	<?	if($row1['file1'] != ""){	?>
                                	<a href="<?=$pdf?>" <?=$target?>><img src="album2/<?=$row1['file1']?>" alt="<?=$row1['alt']?>" height="100%"></a>&nbsp;&nbsp;
                                    <?	}?>
                                    
                                	<?	if($row1['file2'] != ""){	?>                                    
                                    <a href="<?=$pdf?>" <?=$target?>><img src="album2/<?=$row1['file2']?>" alt="<?=$row1['alt']?>" height="100%"></a>&nbsp;&nbsp;
                                    <?	}?>                                          
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- <?=$i?> -->
<?
					$i++;
				}
?>            
            </li>
        </ol>
    </div>
    
    <!-- contact -->
    <?php include('include_contact.php');?> 
    
    
</div>
<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/fm.scrollator.jquery.js"></script>
    
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