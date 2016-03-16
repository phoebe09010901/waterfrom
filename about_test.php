
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
    
	<!-- 抓取視窗尺寸 -->
    <?php include('include_windowSize_01.php');?>
    
    
    <link rel="stylesheet" href="css/reset.css">
    <? if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') or strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') or strpos($_SERVER['HTTP_USER_AGENT'], 'Android')) {?>
    <!-- 是行動裝置，就顯示以下內容 -->
        <?php include('css/980/style_980.php');?>
        <script src="js/980/pinit_980.js"></script>
    <? } else {?>
    <!-- 不是行動裝置，就顯示以下內容 -->
        <?php if( $_GET['screenX'] >= 1900 ){?>
			<?php include('css/1900/style_1900.php');?>
            <script src="js/1900/pinit_1900.js"></script>
        <?php } elseif( $_GET['screenX'] <= 1899 ) {?>
            <?php include('css/1280/style_1280.php');?>
            <script src="js/1280/pinit_1280.js"></script>
        <?php } else {?>
            
        <?php }?>
    <? }?>
	
    
    
	<script src="js/contact.js"></script>
    <script src="js/other.js"></script>
	
</head>

<body>

<!-- 計算畫面尺寸 -->
<?php include('include_windowSize_02.php');?>

<div class="size"><p class="testp"></p></div>

<div class="wapper_03" style="opacity:0;">
<div style="position: absolute; overflow:hidden; width: <?php echo $width ;?>px; height: <?php echo $height ;?>px;; left: 50%; top: 50%; margin-left:-<?php echo ($width)/2 ;?>px; margin-top:-<?php echo ($height)/2 ;?>px; opacity: 1; background: #FFF;">
    
    <!-- logo區 -->
    <div class="profile_logo ">
    </div>
    
    <!-- menu-->
    <div class="news_menu">
		<?php include('include_menu.php');?>
    </div>
  
  
    <!-- 左側 info區 -->
    <div class="news_info" id="scrollable_div2">
    	<input value="activate scrollator" id="activate_scrollator2" type="image" src="images/white.png" style="width:0px; height:0px; display:none;">
        <!-- 01 -->
        <div style="width:100%; height:1px; background:#FC0; overflow:hidden; color:#F0F0F0;">今年一月號室內雜誌完整報導了水相設計去年住宅案新作『Timeless』，此棟位於淡水的名宅特色是一戶一泳池，遠眺觀音山淡水河出海</div>
        <!-- 01 -->
    	
        
        
        <ol class="projects-list">
        	<li>

            	
            
            	
                    
                
              
            </li>
        </ol>
        
    </div>
    
    <!-- contact -->
    <?php include('include_contact.php');?>	
    
</div>
</div>

	<!-- 抓取視窗尺寸 --> 
	<?php include('include_windowSize_03.php');?>
    
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