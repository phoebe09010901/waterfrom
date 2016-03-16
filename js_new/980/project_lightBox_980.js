// JavaScript Document

$(document).ready(function(){

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

});