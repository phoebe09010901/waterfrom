<?
	session_start();

	require_once('admin/includes/xprog.php');
	$Conn = DB_Open();	
	//echo $Conn;	
	
	list($html_title, $keywords, $description) = xheader_r1($Conn);

	$id = $_GET['id'];
	$category = $_GET['category'];	

	$sql1  = "select ";
	$sql1 .= "A.id as id, ";
	$sql1 .= "A.title as title, ";
	$sql1 .= "A.title2 as title2, ";
	$sql1 .= "A.content2 as content2, ";
	$sql1 .= "A.content3 as content3, ";
	$sql1 .= "B.file1 as file1 ";
	$sql1 .= "from waterfrom_album as A join waterfrom_album_photos as B on A.id = B.album_id where ";
	$sql1 .= " A.category = '$category' and ";	
	$sql1 .= " A.pub = 1 ";		
	
	if($id != ""){	
		$sql1 .= "and A.id = '$id' ";
	}
	$sql1 .= "order by A.sort desc,  B.sort desc";	
	//echo $sql1;

	$rl1 = mysql_query($sql1, $Conn);
	$tmpC = mysql_num_rows($rl1);
	
	if($tmpC == 0){
		header("location: projects.php");
		exit;
	}
	
	$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);	
	if($id == ""){
		$id = $row1['$id'];	
	}
	
	$title = $row1['title'];
	$title2 = $row1['title2'];
	$content2 = $row1['content2'];
	$content3 = html_entity_decode($row1['content3']);
		
	$file1 = $row1['file1'];	


?>
	
<!DOCTYPE html>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html>
<!--<![endif]--><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

<meta name="keywords" content="<?=$keywords?>">
<meta name="description" content="<?=$description?>" />
<title><?=$html_title?></title>
<link rel="icon" type="image/png" href="favicon.png" />

<meta property="og:title" content="<?=$title?> <?=$title2?>" />
<meta property="og:site_name" content="<?=$html_title?>" />
<meta property="og:description" content="<?=$content2?>" />
<meta property="og:url" content="http://<?=$_SERVER['HTTP_HOST']?>/projects_02.php?category=<?=$category?>&id=<?=$id?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST']?>/album_photos/<?=$id?>/<?=$file1?>" />
<link href="http://<?=$_SERVER['HTTP_HOST']?>/album_photos/<?=$id?>/<?=$file1?>" rel="image_src" type="image/jpeg"/>
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
    
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
				$(".projects_menu_02").animate({
					right: (($(window).height()/4)+30) + 'px'
				});
			} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
				$(".projects_menu_02").animate({
					right: (($(window).height()/4)+25) + 'px'
				});
			} else {
				$(".projects_menu_02").animate({
					right: (($(window).height()/4)+15) + 'px'
				});
			}
			
			$(window).resize(function() {
				if ( $(window).width() >= 1900 ){
					$(".projects_menu_02").animate({
						right: (($(window).height()/4)+30) + 'px'
					});
				} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
					$(".projects_menu_02").animate({
						right: (($(window).height()/4)+25) + 'px'
					});
				} else {
					$(".projects_menu_02").animate({
						right: (($(window).height()/4)+15) + 'px'
					});
				}
			});
		});
    </script>
    <!-- menu  -->
    
    <!-- 十格作品小圖 開始 -->
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
	<!-- 十格作品小圖文字動畫 -->
	<script type="text/javascript">
        $(document).ready(function(){
            $('.boxgrid.captionfull').hover(function(){
                $(".cover", this).stop().animate({top:'0px'},{queue:false,duration:350});
                }, function() {
                    $(".cover", this).stop().animate({top:'350px'},{queue:false,duration:350});
            });	
        });
    </script>
    <!-- 十格作品小圖 開始 -->
    
    <!-- 光箱 開始 --> 
	<link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    
    <link rel="stylesheet" type="text/css" href="css_new/1900/project_lightBox_1900.css" media="screen and (min-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/1200/project_lightBox_1200.css" media="screen and (min-width: 1200px) and (max-width: 1900px)">
    <link rel="stylesheet" type="text/css" href="css_new/980/project_lightBox_980.css" media="screen and (max-width: 1200px)">
	
	
	<script type="text/javascript">
    // JavaScript Document 1280
    $(document).ready(function(){
     	
		if ( $(window).width() >= 1900 ){
			
			$(".flexslider .slides img").animate({
				height: ($(window).height()-180)+"px",
				marginTop: "50px"
			},0);
			$(".flex-control-nav").animate({
				top: "90px"
			},0);
			
			<?php for($x=1;$x<=6;$x++){ ?>
			$(".pic_0<?php echo $x;?>").delay(<?php echo $x;?>000).animate({
				opacity:'1'
			},500);
			<?php } ?>
			
			
			$(".info_02").click(function(){
				$(".wapper_02").animate({
					top:'0PX',
				},0);
				$(".wapper_02").animate({
					opacity:'1'
				},500);
				
				//第一個不用管
				$(".pic_center").animate({
					top:'50%'
				},0);
				$(".pic_center").animate({
					opacity:'1'
				},500);
				//第一個不用管
			});
		
		} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
			
			$(".flexslider .slides img").animate({
				height: ($(window).height()-90)+"px",
				marginTop: "30px"
			},0);
			$(".flex-control-nav").animate({
				top: "90px"
			},0);
			
			<?php for($x=1;$x<=6;$x++){ ?>
			$(".pic_0<?php echo $x;?>").delay(<?php echo $x;?>000).animate({
				opacity:'1'
			},500);
			<?php } ?>
			
			
			$(".info_02").click(function(){
				$(".wapper_02").animate({
					top:'0px',
				},0);
				$(".wapper_02").animate({
					opacity:'1'
				},500);
				
				//第一個不用管
				$(".pic_center").animate({
					top:'50%'
				},0);
				$(".pic_center").animate({
					opacity:'1'
				},500);
				//第一個不用管
			});
			
		} else {
			
			$(".flexslider .slides img").animate({
				height: "550px",
				marginTop: "30px"
			},0);
			$(".flex-control-nav").animate({
				top: "90px"
			},0);
			
			<?php for($x=1;$x<=6;$x++){ ?>
			$(".pic_0<?php echo $x;?>").delay(<?php echo $x;?>000).animate({
				opacity:'1'
			},500);
			<?php } ?>
			
			
			$(".info_02").click(function(){
				$(".wapper_02").animate({
					top:'50%',
				},0);
				$(".wapper_02").animate({
					opacity:'1'
				},500);
				
				//第一個不用管
				$(".pic_center").animate({
					top:'50%'
				},0);
				$(".pic_center").animate({
					opacity:'1'
				},500);
				//第一個不用管
			});

		}
        
        $(".close").click(function(){
            $(".wapper_02").animate({
                opacity:'0'
            },500);
            $(".wapper_02").animate({
                top:'-5000px'
            },0);
            $(".pic_center").animate({
                opacity:'0'
            },500);
            $(".pic_center").animate({
                top:'-5000px'
            },0);
        });
    
    });
    </script>		
    <!-- 光箱 結束 -->
    
</head>
<body>

<div class="wapper_03" style="opacity:0;">
<div>
		
	<!-- 十格作品 -->
    <div class="project_down"><img src="images/pic_down_02.png" width="100%" height="100%"></div>
    <div class="content3" id="scrollable_div1">
        <input value="activate scrollator" id="activate_scrollator1" type="image" src="images/white.png" style="width:0px; height:0px; display:none;">
        <ol class="projects-list">
<?
	$category = $_GET['category'];
	//$id = $_GET['id'];	
	$sql1  = "select * from waterfrom_album where ";
	$sql1 .= "category = '$category' and ";
	$sql1 .= "pub = 1 and ";	
	$sql1 .= "lang = 'tw' ";
	$sql1 .= "order by sort desc";	
	$rl1 = mysql_query($sql1, $Conn);
	//$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);	
	$i = 1;
	while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){	
		if($id == ""){
			$id = $row1['id'];
		}
?>        
        
        <li>
            <!-- 0<?=$i?>1 --><!-- mars 這格我有設定預設顏色 請留意 style="background-color: #000000; opacity:0.6;" -->
            <style type="text/css">.project-list-item.project-list-item-ga<?=$row1['id']?> .hover-container:before{background-color: #<?=$row1['colorcode']?>;}</style>
            <article class="project project-list-item project-list-item-ga<?=$row1['id']?>">
                <a class="thumb-container" href="projects_02.php?category=<?=$category?>&id=<?=$row1['id']?>" title="<?=$row1['name']?>">
                    <img width="101%" height="101%" src="album/<?=$row1['file1']?>" alt="<?=$row1['alt']?>" />    
                </a>

<?
				if($row1['id'] == $id){
?>				                
                <a class="hover-container trans-btn" href="projects_02.php?category=<?=$category?>&id=<?=$row1['id']?>" style="background-color: #<?=$row1['colorcode']?>; opacity:0.8;">
<?
				}	else	{
?>				                
                <a class="hover-container trans-btn" href="projects_02.php?category=<?=$category?>&id=<?=$row1['id']?>">
<?					
				}
?>                  
                    <div class="hover trans-btn"></div>
                </a>
                <a class="thumb-container thumb-container-type" href="projects_02.php?category=<?=$category?>&id=<?=$row1['id']?>" style="color:#FFF;">
                    <div class="title"><div class="title_01"><?=$row1['title']?></div></div>
                </a>
                <a class="thumb-container thumb-container-type2" href="projects_02.php?category=<?=$category?>&id=<?=$row1['id']?>" style="color:#FFF;">
                    <div class="boxgrid captionfull">
                        <div class="cover boxcaption"><div class="title"><div class="title_02"><?=$row1['title2']?></div></div></div>
                    </div>
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
	
    <!-- menu-->
    <div class="projects_menu_02">
		<?php include('include_menu.php');?>
    </div>	

<?

	$sql1  = "select * from waterfrom_album where ";	
	$sql1 .= "id = '$id' and ";
	$sql1 .= "pub = 1 and ";		
	$sql1 .= "lang = 'tw' ";
	$sql1 .= "order by sort desc";	
	//echo $sql1;
	
	$rl1 = mysql_query($sql1, $Conn);
	$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);
?>        
    <!-- 左側圖片 -->
    <script type="text/javascript">
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	</script>
    <div class="pressContent_info" id="scrollable_div2">
    	<input value="activate scrollator" id="activate_scrollator2" type="image" src="images/white.png" style="width:0px; height:0px; display:none;">
        <ol class="projects-list">
        	<li>
   	  	  	  	<div class="info_01">
               		<div class="share_icon">
                    	<div class="facebook"><a href="#"><img src="images/white.png" width="100" onclick="MM_openBrWindow('http://facebook.com/sharer.php?u=http://<?=$_SERVER['HTTP_HOST']?>/projects_02.php%3Fcategory%3D<?=$category?>%26id%3D<?=$id?>','','width=500,height=500')"></a></div>
                        
                        <div class="pinterest"><a href="#"><img src="images/white.png" width="100%" onclick="MM_openBrWindow('https://www.pinterest.com/pin/create/button/?url=http://waterfrom.ftm.com.tw/projects_02.php%3Fcategory%3D<?=$category?>%26id%3D<?=$id?>&media=http://<?=$_SERVER['HTTP_HOST']?>/album_photos/<?=$id?>/<?=$file1?>&description=<?=$title?>-<?=$title2?>','','width=500,height=500')"></a></div>
                        
                    </div>
                    <div class="left_info">
                      	<div class="font_01">
                      		<?=$row1['content']?><br><br>
                            
                      		<?=$row1['content2']?>
                      	</div>
                        
                        <div class="font_02">
                      		<div class="font_02_left">
                            	<span class="title_01"><?=$row1['title2']?></span><br>
                                <span class="title_02"><?=$row1['title']?></span>
                            </div>
                            
                            <div class="font_02_right">
                            	<div style="color:#898989"><?=html_entity_decode($row1['content3'])?></div>
                            </div>
                      	</div>
                	</div>
                    
                    <div class="clear"></div>
                </div>
                <div class="project_down2"><img src="images/pic_down.png" width="100%" height="100%"></div>
<?
				$sql1  = "select * from waterfrom_album_photos where ";
				$sql1 .= "album_id = '$id'  ";
				$sql1 .= "order by sort desc";	
				//echo $sql1;
				
				$rl1 = mysql_query($sql1, $Conn);
				$i = 1;
				while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){
?>                
                <a href="#">
                <div class="info_02 pic_0<?=$i?>">
                    <!--<div style="background: url(zoom.png) no-repeat; background-size:32px 32px; background-position:top 10px right 0px; width:88%; height:42px; position:absolute; float:right;"></div>-->
                    <div><img src="album_photos/<?=$id?>/<?=$row1['file1']?>" width="100%"/></div>
                </div>
                </a>
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
</div>

<!-- 光箱 -->
<div class="wapper_02">
	<div class="projectPic_bg">

    	<div class="close"><a href="#"><img src="images/project_colse_02.png" width="100%" height="100%" /></a></div>
    	
        <section class="slider">
        <div class="flexslider">
          <ul class="slides">
<?
			$sql1  = "select * from waterfrom_album_photos where ";
			$sql1 .= "album_id = '$id'  ";
			$sql1 .= "order by sort desc";	
			//echo $sql1;
			
			$rl1 = mysql_query($sql1, $Conn);
			$i = 1;
			while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){
?>                          
            <li>
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  	<tr>
                    	<td align="center"><img src="album_photos/<?=$id?>/<?=$row1['file1']?>" /></td>
                  	</tr>
                </table>
            </li>
<?
				$i++;
			}
?>                   
          </ul>
        </div>
      </section>

	</div>
</div>
<!-- 光箱 -->
    
    <!-- banner 輪播 -->
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script defer src="js/jquery.flexslider.js"></script>
  	<script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
  	</script>
    <!-- banner 輪播 -->
    
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
<!--
<script>
	$(document).ready(function(){
		$(document).bind("contextmenu",function(event){
			return false;
		});
	});
</script>
-->