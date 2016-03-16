<?
	session_start();

	require_once('admin/includes/xprog.php');
	$Conn = DB_Open();	
	//echo $Conn;	
	
	list($html_title, $keywords, $description) = xheader_r1($Conn);

	$category = $_REQUEST['category'];	

	$sql1  = "select * from waterfrom_proj3_category where ";
	$sql1 .= "id = '$category' and ";		
	$sql1 .= "pub = 1 and ";		
	$sql1 .= "lang = 'tw' ";
	$sql1 .= "order by release_date desc";				
	//echo $sql1;
	
	$rl1 = mysql_query($sql1, $Conn); 
	$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);

	$data_nums = mysql_num_rows($rl1); 		//統計總比數  

	if($data_nums == 0){
		header("Location: projects.php");
		break;
	}
			
	$id = $row1['id'];	
	$name = $row1['name'];
	$name2 = $row1['name2'];	
	$content = $row1['content'];

	$sql1  = "select * from waterfrom_album3 where ";
	$sql1 .= "category = '$id' and ";
	$sql1 .= "pub = 1 and ";	
	$sql1 .= "lang = 'tw' ";
	$sql1 .= "order by sort desc";	
	//echo $sql1;
	
	$rl1 = mysql_query($sql1, $Conn);
	$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);			
	$pname = $row1['name'];	
	$pfile1 = $row1['file1'];
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

<meta property="fb:app_id" content="966242223397117">
<meta property="og:title" content="<?=$name?> <?=$name2?>" />
<meta property="og:site_name" content="<?=$html_title?>" />
<meta property="og:description" content="<?=strip_tags(html_entity_decode($pname))?>" />
<meta property="og:url" content="http://<?=$_SERVER['HTTP_HOST']?>/issue_02.php?category=<?=$category?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST']?>/album3/<?=$pfile1?>" />
<link href="http://<?=$_SERVER['HTTP_HOST']?>/album3/<?=$pfile1?>" rel="image_src" type="image/jpeg"/>	
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
    <div class="news_02_logo ">
    </div>
    
    <!-- menu-->
    <div class="news_02_menu">
		<?php include('include_menu.php');?>
    </div>
    
    <!-- 左側 info區 -->
    <script type="text/javascript">
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
	</script>
    <div class="news_02_info" id="scrollable_div2">
    	<input value="activate scrollator" id="activate_scrollator2" type="image" src="images/white.png" style="width:0px; height:0px; display:none;">
    	
        <div class="share_block">
        	<div class="facebook"><a href="#"><img src="images/white.png" width="100" onclick="MM_openBrWindow('http://facebook.com/sharer.php?u=http://www.waterfrom.com/issue_02.php%3Fcategory%3D7','','width=500,height=500')"></a></div>
                        
            <!--<div class="pinterest"><a href="//www.pinterest.com/pin/create/button/" data-pin-shape="round">pinterest分享</a></div>-->
            <div class="pinterest"><a href="#"><img src="images/white.png" width="100%" onclick="MM_openBrWindow('https://www.pinterest.com/pin/create/button/?url=http://waterfrom.ftm.com.tw/issue_02.php%3Fcategory%3D7&media=http://www.waterfrom.com/album3/1452495946.jpg&description=河景度假宅','','width=500,height=500')"></a></div>
        </div>
        
        <ol class="projects-list">
        	<li>

<?
		$category = $_GET['category'];
		$sql1  = "select * from waterfrom_proj3_category where ";
		$sql1 .= "id = '$category' and ";		
		$sql1 .= "pub = 1 and ";				
		$sql1 .= "lang = 'tw' ";		
		$sql1 .= "order by release_date desc";				
		//echo $sql1;
		
		$rl1 = mysql_query($sql1, $Conn); 
		$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);
		$release_date = $row1['release_date'];
?>                                
                <!-- 01 -->
				<div class="info_01">
                    <div class="year"><?=date("d F Y", strtotime($row1['release_date']))?></div>
                    <div class="left_info">
                    	<div class="font_01"><?=$row1['name']?></div>
                        <div class="font_02"><?=$row1['name2']?></div>
                    </div>
                    <div class="page_no">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td colspan="4" align="right" valign="middle">
                                	<div class="right_icon_close" style="opacity:1;"><a href="issue.php"><img src="images/top_close.png" height="100%"></a></div>

<?
									$sqlC1  = "select * from waterfrom_proj3_category where ";
									$sqlC1 .= "release_date < '$release_date' and ";		
									$sqlC1 .= "pub = 1 and ";													
									$sqlC1 .= "lang = 'tw' ";
									$sqlC1 .= "order by release_date desc limit 0, 1";				
									//echo $sqlC1 . "<br>\n";									
									
									$rlC1 = mysql_query($sqlC1, $Conn); 
									$rowC1 = mysql_fetch_array($rlC1, MYSQL_ASSOC);									
									$categoryN = $rowC1['id'];
									//echo $categoryN;
									if($categoryN == ""){
										$hrefN = "#";
										$styleN = "";										
									}	else	{										
										$hrefN = "?category=" . $categoryN;
										$styleN = " style=\"opacity:1;\"";										
									}
?>                                                                        
                                    <div class="right_icon"<?=$styleN?>><a href="<?=$hrefN?>"><img src="images/top_next.png" height="100%"></a></div>                                    
<?
									$sqlC1  = "select * from waterfrom_proj3_category where ";
									$sqlC1 .= "release_date > '$release_date' and ";		
									$sqlC1 .= "pub = 1 and ";													
									$sqlC1 .= "lang = 'tw' ";
									$sqlC1 .= "order by release_date asc limit 0, 1";				
									//echo $sqlC1 . "<br>\n";																		
									
									$rlC1 = mysql_query($sqlC1, $Conn); 
									$rowC1 = mysql_fetch_array($rlC1, MYSQL_ASSOC);									
									$categoryP = $rowC1['id'];
									//echo $categoryP . "P";
																		
									if($categoryP == ""){
										$hrefP = "#";
										$styleP = "";										
									}	else	{
										$hrefP = "?category=" . $categoryP;
										$styleP = " style=\"opacity:1;\"";																				
									}
?>                                                                        
                                    <div class="right_icon"<?=$styleP?>><a href="<?=$hrefP?>"><img src="images/top_pre.png" height="100%"></a></div>                                    
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="clear"></div>
<?
				$sql1  = "select * from waterfrom_album3 where ";
				$sql1 .= "category = '$category' and ";
				$sql1 .= "pub = 1 and ";	
				$sql1 .= "lang = 'tw' ";
				$sql1 .= "order by sort desc";	
				//echo $sql1;
				
				$rl1 = mysql_query($sql1, $Conn);
				//$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);	
				$i = 1;
				while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){	
?>                
                <!-- 0<?=$i?> -->
                <div class="info_02">
                	<div class="year"></div>
                    <div class="left_info">
                    	<div class="font_03">
                            <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="left" valign="top"><?=html_entity_decode($row1['name'])?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="right_pic">
                    	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td align="center" valign="bottom"><div class="pic_01"><img src="album3/<?=$row1['file1']?>" width="100%"></div></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="clear"></div>
                <!-- 0<?=$i?> -->
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
