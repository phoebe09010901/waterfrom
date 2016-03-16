<style>
.content { 
	overflow: auto;
	position: absolute;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	top:0px;
	z-index:5;
}
.content2 { 
	overflow: auto;
	position: absolute; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	top:0px;
	z-index:5;
}
.content3 {  
	overflow: auto;
	position: absolute;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	top:0px;
	z-index:5;
}

.pic_block { 
	width: 100%; 
	overflow:hidden;
}

.img_bg {
	width: 100%;
	position:absolute;
	z-index:21;
}
			
.big_title { 
	width: 100%;
	height: 100%;
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
#p_01,#p_02,#p_03,#p_04,#p_05,#p_06,#p_07,#p_08,#p_09,#p_10,#p_11,#p_12,#p_13,#p_14,#p_15,#p_16,#p_17,#p_18,#p_19,#p_20,#p_21,#p_22,#p_23,#p_24,#p_25,#p_26,#p_27,#p_28,#p_29,#p_30 {
	width: 100%;  
	height: 100%;
	position: relative;
}
.color_bg_01,.color_bg_02,.color_bg_03,.color_bg_04,.color_bg_05,.color_bg_06,.color_bg_07,.color_bg_08,.color_bg_09,.color_bg_10,.color_bg_11,.color_bg_12,.color_bg_13,.color_bg_14,.color_bg_15,.color_bg_16,.color_bg_17,.color_bg_18,.color_bg_19,.color_bg_20,.color_bg_21,.color_bg_22,.color_bg_23,.color_bg_24,.color_bg_25,.color_bg_26,.color_bg_27,.color_bg_28,.color_bg_29,.color_bg_30 { 
	width: 100%;  
	height: 100%;
	position:absolute; 
	z-index:22;
	_filter:alpha(opacity=80); 
	filter:alpha(opacity=80); 
	-moz-opacity: 0.8; 
	opacity: 0.8;
}
.small_title {
	width: 100%;  
	height: 100%; 
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

<script>
$(document).ready(function(){

	windowWidth=($(window).height()-40)/4;
	windowHeight=($(window).height()-40)/4;
	windowHeightTotal=$(window).height()-40;
	windowRight=(($(window).height()-40)/4)+30;
	windowTop=($(window).height()-40)/4;
	
	$(".content,.content3").animate({
		width:windowWidth+'0px',
		height:windowHeightTotal+'0px',
		right:'30px'
	},0);
	$(".content2").animate({
		width:windowWidth+'0px',
		height:windowHeightTotal+'0px',
		right:windowRight+'0px'
	},0);
	$(".pic_block,.img_bg").animate({
		height:windowHeight+'0px'
	},0);
	
	$("#p_01,#p_02,#p_03,#p_04,#p_05,#p_06,#p_07,#p_08,#p_09,#p_10,#p_11,#p_12,#p_13,#p_14,#p_15,#p_16,#p_17,#p_18,#p_19,#p_20,#p_21,#p_22,#p_23,#p_24,#p_25,#p_26,#p_27,#p_28,#p_29,#p_30").animate({
		top:windowTop+'0px'
	},0);
	
	
	
	$('#b_01').hover(function(){
		$('#p_01').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_01').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_02').hover(function(){
		$('#p_02').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_02').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_03').hover(function(){
		$('#p_03').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_03').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_04').hover(function(){
		$('#p_04').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_04').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_05').hover(function(){
		$('#p_05').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_05').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_06').hover(function(){
		$('#p_06').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_06').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_07').hover(function(){
		$('#p_07').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_07').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_08').hover(function(){
		$('#p_08').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_08').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_09').hover(function(){
		$('#p_09').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_09').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_10').hover(function(){
		$('#p_10').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_10').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_11').hover(function(){
		$('#p_11').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_11').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_12').hover(function(){
		$('#p_12').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_12').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_13').hover(function(){
		$('#p_13').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_13').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_14').hover(function(){
		$('#p_14').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_14').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_15').hover(function(){
		$('#p_15').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_15').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_16').hover(function(){
		$('#p_16').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_16').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_17').hover(function(){
		$('#p_17').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_17').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_18').hover(function(){
		$('#p_18').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_18').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_19').hover(function(){
		$('#p_19').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_19').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_20').hover(function(){
		$('#p_20').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_20').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_21').hover(function(){
		$('#p_21').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_21').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_22').hover(function(){
		$('#p_22').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_22').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_23').hover(function(){
		$('#p_23').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_23').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_24').hover(function(){
		$('#p_24').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_24').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_25').hover(function(){
		$('#p_25').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_25').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_26').hover(function(){
		$('#p_26').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_26').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_27').hover(function(){
		$('#p_27').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_27').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_28').hover(function(){
		$('#p_28').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_28').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_29').hover(function(){
		$('#p_29').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_29').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
	
	$('#b_30').hover(function(){
		$('#p_30').stop().animate({ //滑鼠進來
			top: '0px'
		},250);
	}, function(){
		$('#p_30').stop().animate({ //滑鼠出去
			top:windowTop+'0px'
		},250);
	});
			
			
});
</script>