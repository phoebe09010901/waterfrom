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
    <div class="news_logo ">
    </div>
    
    <!-- menu-->
    <div class="news_menu">
		<?php include('include_menu.php');?>
    </div>
  
 <?
		$sql1  = "select * from waterfrom_proj3_category where ";
		//$sql1 .= "pub = 1 and ";						
		$sql1 .= "lang = 'tw' ";
		$sql1 .= "order by release_date desc ";	
		//echo $sql1;			
		$rl1 = mysql_query($sql1, $Conn);  

		$data_nums = mysql_num_rows($rl1); 		//統計總比數 
		
		$per = 6;							 	//每頁顯示項目數量  
		
		$pages = ceil($data_nums / $per); 		//取得不小於值的下一個整數  
		
		if (!isset($_GET["page"])){ 			//假如$_GET["page"]未設置  
			$page = 1; 							//則在此設定起始頁數  
		} else {  
			$page = intval($_GET["page"]); 		//確認頁數只能夠是數值資料  
		}  
		
		$start = ($page - 1) * $per; 			//每一頁開始的資料序號  
		
 ?>  
    <!-- 左側 info區 -->
    <div class="news_info" id="scrollable_div2">
    	<input value="activate scrollator" id="activate_scrollator2" type="image" src="images/white.png" style="width:0px; height:0px; display:none;">
    	
        <div class="page_no">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            	<tr>
                	<td colspan="4" align="right" valign="middle">
                    	<?	
							if($pages == 1 && $page == 1){	
								//$style1 = " style=\"opacity:1;\"";
								//$style2 = " style=\"opacity:1;\"";								
								$style1 = "";
								$style2 = "";
								
								$href1 = "#";
								$href2 = "#";								
							}

							if($pages > 1){	
								$style1 = " style=\"opacity:1;\"";
								$style2 = " style=\"opacity:1;\"";								
								//$style1 = "";
								//$style2 = "";
								
								$leftPage = $page - 1;
								if($leftPage < 0){
									$leftPage = 1;
								}

								$rightPage = $page + 1;
								if($rightPage > $pages){
									$rightPage = $pages;
								}								
								
								$href1 = "?page=" . $leftPage;
								$href2 = "?page=" . $rightPage;
							}							
						?>
                    	<div class="right_icon"<?=$style1?>><a href="<?=$href1?>"><img src="images/top_next.png" height="100%"></a></div>
                    	<div class="right_icon"<?=$style2?>><a href="<?=$href2?>"><img src="images/top_pre.png" height="100%"></a></div>
                    	<div  class="right_no">
                        <?
                        	for($i=1; $i<=$pages; $i++){
								if($i == $page){
						?>
                        	<a href="?page=<?=$i?>" style="opacity:1; color:#191919; font-weight:bolder;"><?=$i?></a>&nbsp;						
						<?											
								}	else	{
						?>
                        	<a href="?page=<?=$i?>"><?=$i?></a>&nbsp;						
						<?											
								}
						
							}								
						?>
							<!--
                        	<a href="#" style="">2</a>&nbsp;
                        	<a href="#" style="">3</a>&nbsp;
                        	<a href="#" style="">4</a>&nbsp;
                        	<a href="#" style="">5</a>
                            -->
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
        <ol class="projects-list">
        	<li>

<?
		$sql1 .= "limit " . $start . ', '.$per;
		//echo $sql1;
		
		$rl1 = mysql_query($sql1, $Conn);  
		$i = 1;
		$j = 1;	
		while($row1 = mysql_fetch_array($rl1, MYSQL_ASSOC)){	

			$sqlC1  = "select * from waterfrom_album3 where ";
			$sqlC1 .= "category = '" . $row1['id'] . "' and ";
			//$sqlC1 .= "pub = 1 and ";	
			$sqlC1 .= "lang = 'tw' ";
			$sqlC1 .= "order by sort desc";	
			//echo $sqlC1;
			
			$rlC1 = mysql_query($sqlC1, $Conn);
			$rowC1 = mysql_fetch_array($rlC1, MYSQL_ASSOC);	
				
			if($j == 1){
?>            	
            <!-- 0<?=$i?> -->
            <div class="info_0<?=$j?>">
                <div class="year"><?=date("d F Y", strtotime($row1['release_date']))?></div>
                <div class="left_info">
                    <div class="font_01"><?=$row1['name']?></div>
                    <div class="font_02"><?=$row1['name2']?></div>
                    <div class="font_03"><?=mb_substr(strip_tags(html_entity_decode($rowC1['name'])), 0, 100, "utf-8")?>&nbsp;&nbsp;<span class="more"><a href="issue_02.php?category=<?=$row1['id']?>">more</a></span></div>
                    <!--<div class="share"><a href="//www.pinterest.com/pin/create/button/" data-pin-shape="round">pinterest分享</a></div>-->
                </div>
                <div class="right_pic">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="right" valign="bottom">
                                <a href="issue_02.php?category=<?=$row1['id']?>">
                                	<img src="album3/<?=$rowC1['file1']?>" alt="<?=$row1['alt']?>" width="100%">
                                	<!--
                                	<img src="proj3_category/<?=$row1['file1']?>" alt="<?=$row1['alt']?>" width="100%">
                                    -->
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- 0<?=$i?> -->
<?					
				$j = 2;
			}	else	{
?>            	
            <!-- 0<?=$i?> -->
            <div class="info_0<?=$j?>">

                <div class="right_pic">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="right" valign="bottom">
                                <a href="issue_02.php?category=<?=$row1['id']?>"><img src="album3/<?=$rowC1['file1']?>" alt="<?=$row1['alt']?>" width="100%"></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="year"><?=date("d F Y", strtotime($row1['release_date']))?></div>
                <div class="left_info">
                    <div class="font_01"><?=$row1['name']?></div>
                    <div class="font_02"><?=$row1['name2']?></div>
                    <div class="font_03"><?=mb_substr(strip_tags(html_entity_decode($rowC1['name'])), 0, 100, "utf-8")?>&nbsp;&nbsp;<span class="more"><a href="issue_02.php?category=<?=$row1['id']?>">more</a></span></div>
                    <!--<div class="share"><a href="//www.pinterest.com/pin/create/button/" data-pin-shape="round">pinterest分享</a></div>-->
                </div>                
            </div>
            <!-- 0<?=$i?> -->
<?					
				$j = 1;				
			}
			$i++;
		}
?>                    
                
              
            </li>
        </ol>
        
        <div class="clear"></div>
        
        <div class="page_no">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            	<tr>
                	<td colspan="4" align="right" valign="middle">
                    	<div class="right_icon"<?=$style1?>><a href="<?=$href1?>"><img src="images/top_next.png" height="100%"></a></div>
                    	<div class="right_icon"<?=$style2?>><a href="<?=$href2?>"><img src="images/top_pre.png" height="100%"></a></div>
                    	<div  class="right_no">
							<?
                                for($i=1; $i<=$pages; $i++){
                                    if($i == $page){
                            ?>
                                <a href="?page=<?=$i?>" style="opacity:1; color:#191919; font-weight:bolder;"><?=$i?></a>&nbsp;						
                            <?											
                                    }	else	{
                            ?>
                                <a href="?page=<?=$i?>"><?=$i?></a>&nbsp;						
                            <?											
                                    }
                            
                                }								
                            ?>                        
                            <!--
                        	<a href="#" style="opacity:1; color:#191919; font-weight:bolder;">1</a>&nbsp;
                        	<a href="#" style="">2</a>&nbsp;
                        	<a href="#" style="">3</a>&nbsp;
                        	<a href="#" style="">4</a>&nbsp;
                        	<a href="#" style="">5</a>
                            -->
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
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
