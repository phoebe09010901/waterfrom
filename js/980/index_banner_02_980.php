<script type="text/javascript">
// JavaScript Document
$(document).ready(function(){
 	//第二頁動畫
	$(".banner_01").delay(4000).animate({/*第一層圖片退場*/
		left:'2498px'
	},1000);
	$(".index_info_01").delay(4000).animate({/*第一層logo退場*/
		left:'2498px'
	},1000);
	$(".banner_02").delay(7500).animate({/*第二層圖片進場*/
		right:'25px'
	},1000);
	$(".index_info_02").delay(7500).animate({/*第二層logo進場*/
		left:'0px'
	},1000);
	$(".index_menu_01").delay(4000).animate({/*menu移動*/
		right:'57%',
		opacity:'1'
	},1000);
});	

$(document).ready(function(){	
	//第三頁動畫
	$(".banner_02").delay(4000).animate({/*第二層圖片退場*/
	  	right:'-2498px'
	},500);
	$(".index_info_02").delay(4000).animate({/*第二層logo退場*/
		left:'-2498px',
	},500);
	$(".banner_03").delay(12500).animate({/*第三層圖片進場*/
	  	left:'0px'
	},1000);
	$(".index_info_03").delay(12500).animate({/*第三層logo進場*/
		right:'25px'
	},1000);
	$(".index_menu_01").delay(4000).animate({/*menu移動*/
		right:'36%'
	},1000);
});	

$(document).ready(function(){	
	//第四頁動畫
	$(".banner_03").delay(4000).animate({/*第三層圖片退場*/
	  	left:'-2498px'
	},500);
	$(".index_info_03").delay(4000).animate({/*第三層logo退場*/
		right:'-2498px'
	},500);
	$(".banner_04").delay(16500).animate({/*第四層圖片進場*/
	  	right:'25px'
	},1000);
	$(".index_info_04").delay(16500).animate({/*第四層logo進場*/
		left:'30%'
	},1000);
	$(".index_menu_01").delay(4000).animate({/*menu移動*/
		right:'71%'
	},1000);
	$(".prv_04").delay(16500).animate({/*第四層箭頭進場*/
		right: '0px',
		opacity:'1'
	},1000);
	$(".next_04").delay(16500).animate({/*第四層箭頭進場*/
		right: '0px',
		opacity:'1'
	},1000);
});
</script>