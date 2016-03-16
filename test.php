<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<script src="js_new/jquery-1.11.1.min.js"></script>
</head>

<body>

		<script>
		$(document).ready(function(){
	
			
			$(document).ready(function(){
				$(window).resize(function() {
				  x=($(window).height()-40)/4;
				  $("span").text(x);
				});
			});
			
			$(".pic_block").animate({
				width:'155.75px',
				height:'155.75px'
			},0);
			$(".img_bg,.big_title,.color_bg_01,.color_bg_02,.color_bg_03,.color_bg_04,.color_bg_05,.color_bg_06,.color_bg_07,.color_bg_08,.color_bg_09,.color_bg_10,.color_bg_11,.color_bg_12,.color_bg_13,.color_bg_14,.color_bg_15,.color_bg_16,.color_bg_17,.color_bg_18,.color_bg_19,.color_bg_20,.color_bg_21,.color_bg_22,.color_bg_23,.color_bg_24,.color_bg_25,.color_bg_26,.color_bg_27,.color_bg_28,.color_bg_29,.color_bg_30,.small_title").animate({
				width:'155.75px',
				height:'155.75px'
			},0);
			$("#p_01,#p_02").animate({
				width:'155.75px',
				height:'155.75px',
				top:'155.75px'
			},0);
		});
		</script>
        
		<style>
		.pic_block { overflow:hidden;}
		.img_bg {
			position:absolute;
			z-index:21;
		}
		.big_title {
			position:absolute;
			z-index:24;
			color:#FFF; 
			padding: 10px 15px 0px 0px; 
			box-sizing:border-box; 
			-moz-box-sizing:border-box; 
			-ms-box-sizing:border-box; 
			-webkit-box-sizing:border-box; 
			text-align:right; 
			font-size:14px;
		}
		#p_01,#p_02 {
			position: relative;
		}
		.color_bg_01,.color_bg_02,.color_bg_03,.color_bg_04,.color_bg_05,.color_bg_06,.color_bg_07,.color_bg_08,.color_bg_09,.color_bg_10,.color_bg_11,.color_bg_12,.color_bg_13,.color_bg_14,.color_bg_15,.color_bg_16,.color_bg_17,.color_bg_18,.color_bg_19,.color_bg_20,.color_bg_21,.color_bg_22,.color_bg_23,.color_bg_24,.color_bg_25,.color_bg_26,.color_bg_27,.color_bg_28,.color_bg_29,.color_bg_30 {
			position:absolute; 
			z-index:22;
			background-color:#A7A79A;/*mars顏色要套程式*/
			_filter:alpha(opacity=80); 
			filter:alpha(opacity=80); 
			-moz-opacity: 0.8; 
			opacity: 0.8;
		}
		.small_title {
			position:absolute; 
			z-index:23; 
			color:#FFF; 
			padding: 25px 15px 0px 0px; 
			box-sizing:border-box; 
			-moz-box-sizing:border-box; 
			-ms-box-sizing:border-box; 
			-webkit-box-sizing:border-box; 
			text-align:right;
			font-size:11px; 
			line-height:32px;
		}
		</style>
        
        <script type="text/javascript">
		$(function(){
			
			<?php for ( $i=0 ; $i<=8 ; $i++ ) { ?>
			$('#b_0<?php echo $i?>').hover(function(){
				$('#p_0<?php echo $i?>').stop().animate({ //滑鼠進來
					top: '0px'
				},250);
			}, function(){
				$('#p_0<?php echo $i?>').stop().animate({ //滑鼠出去
					top:'155.75px'
				},250);
			});
			<? }?>
			
		});
		</script>
        <p>窗口大小被调整过 <span>0</span> 次。</p>
        <div class="pic_block" id="b_01">
        	<div class="img_bg"><img width="100%" height="100%" src="proj_category/1441948950.jpg" alt="" /></div>
            <div class="big_title">Residential</div>
            <a href="javascript:;">
                <div id="p_01">
                    <div class="color_bg_01"></div>
                    <div class="small_title">室內設計</div>
                </div>
            </a>
        </div>
        
        <div class="pic_block" id="b_02">
        	<div class="img_bg"><img width="100%" height="100%" src="proj_category/1441948950.jpg" alt="" /></div>
            <div class="big_title">Residential</div>
            <a href="javascript:;">
                <div id="p_02">
                    <div class="color_bg_02"></div>
                    <div class="small_title">室內設計</div>
                </div>
            </a>
        </div>
        
</body>
</html>