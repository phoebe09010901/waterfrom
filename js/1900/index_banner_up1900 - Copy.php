<script type="text/javascript">
// JavaScript Document

$(document).ready(function(){
 
    //banner循環999次放大縮小
	for(i=0;i<999;i++){ 
	　	$(".banner_01_01").delay(2500).animate({
			width:'105%' ,
			height:'105%'
		},10000);
		$(".banner_01_01").delay(2500).animate({
			width:'100%' ,
			height:'100%'
		},10000);
	}
	for(i=0;i<999;i++){
		$(".banner_02_01").animate({
			width:'105%' ,
			height:'105%'
		},10000);
		$(".banner_02_01").animate({
			width:'100%' ,
			height:'100%'
		},10000);
	}
	for(i=0;i<999;i++){
		$(".banner_03_01").animate({
			width:'105%' ,
			height:'105%'
		},10000);
		$(".banner_03_01").animate({
			width:'100%' ,
			height:'100%'
		},10000);
	}
	for(i=0;i<999;i++){
		$(".banner_04_01").animate({
			width:'105%' ,
			height:'105%'
		},10000);
		$(".banner_04_01").animate({
			width:'100%' ,
			height:'100%'
		},10000);
	}
	//banner循環999次放大縮小
	
	//第一頁動畫
	$(".wapper_01").animate({
		opacity:'1'
    },1000);
	$(".banner_01").delay(2000).animate({
	  	left:'0px'
    },1000);
	$(".index_info_01").delay(2000).animate({
	  	left:'<?php echo ($width*0.5) ;?>px'
    },500);
	$(".index_menu_01").delay(2000).animate({
		opacity:'1'
    },1000);
	
	//第二頁動畫
	
	
	
	
	/*在第一張 點 pre */
	$(".prv_01").click(function(){
		
	});
	
	/*在第一張 點 next */
	$(".next_01").click(function(){
		$(".prv_01").animate({/*第一層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".next_01").animate({/*第一層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".prv_02").animate({/*第二層箭頭進場*/
			right: '-10px',
			opacity:'1'
		},0);
		$(".next_02").animate({/*第二層箭頭進場*/
			right: '-10px',
			opacity:'1'
		},0);
		$(".index_menu_01").animate({/*menu移動*/
			right:'37%',
			opacity:'1'
		},1000);
		$(".banner_01").animate({/*第一層圖片退場*/
			left:'6498px'
		},1000);
		$(".banner_02").animate({/*第二層圖片進場*/
			right:'40px'
		},1000);
		$(".index_info_01").animate({/*第一層logo退場*/
			left:'6498px'
		},1000);
		$(".index_info_02").animate({/*第二層logo進場*/
			left:'0px'
		},1000);
	});
	
	
	
	
	/*在第二張 點 prv */
	$(".prv_02").click(function(){
		$(".prv_01").animate({/*第一層箭頭進場*/
			right: '-10px',
			opacity:'0.3'
		},0);
		$(".next_01").animate({/*第一層箭頭進場*/
			right: '-10px',
			opacity:'1'
		},0);
		$(".prv_02").animate({/*第二層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".next_02").animate({/*第二層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".banner_01").animate({/*第一層圖片進場*/
	  		left:'0px'
		},500);		
		$(".index_info_01").animate({/*第一層logo進場*/
	  		left:'<?php echo ($width*0.5) ;?>px'
    	},500);
		$(".index_menu_01").animate({/*menu移動*/
			right:'40px'
		},1000);
		$(".banner_02").animate({/*第二層圖片退場*/
	  		right:'-2498px'
		},500);
		$(".index_info_02").animate({/*第二層logo退場*/
			left:'-2498px'
		},500);
		
	});
	
	
	
	
	/*在第二張 點 next */
	$(".next_02").click(function(){
		$(".prv_03").animate({/*第三層箭頭進場*/
			right:'-10px',
			opacity:'1'
		},0);
		$(".next_03").animate({/*第三層箭頭進場*/
			right:'-10px',
			opacity:'1'
		},0);
		$(".prv_02").animate({/*第二層箭頭退場*/
			right:'-42px',
			opacity:'0'
		},0);
		$(".next_02").animate({/*第二層箭頭退場*/
			right:'-42px',
			opacity:'0'
		},0);
		$(".banner_02").animate({/*第二層圖片退場*/
	  		right:'-2498px'
		},500);
		$(".index_info_02").animate({/*第二層logo退場*/
			left:'-2498px',
		},500);
		$(".banner_03").animate({/*第三層圖片進場*/
	  		left:'0px'
		},1000);
		$(".index_info_03").animate({/*第三層logo進場*/
			right:'40px'
		},1000);
		$(".index_menu_01").animate({/*menu移動*/
			right:'40%'
		},1000);
		
	});
	
	
	
	
	/*在第三張 點 pre */
	$(".prv_03").click(function(){
		$(".prv_03").animate({/*第三層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".next_03").animate({/*第三層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".prv_02").animate({/*第二層箭頭進場*/
			right: '-10px',
			opacity:'1'
		},0);
		$(".next_02").animate({/*第二層箭頭進場*/
			right: '-10px',
			opacity:'1'
		},0);
		$(".banner_02").animate({/*第二層圖片進場*/
			right:'40px'
		},1000);	
		$(".index_info_02").animate({/*第二層logo進場*/
			left:'0px'
		},1000);
		$(".index_menu_01").animate({/*menu移動*/
			right:'37%'
		},1000);
		$(".banner_03").animate({/*第三層圖片退場*/
	  		left:'-2498px'
		},500);
		$(".index_info_03").animate({/*第三層logo退場*/
			right:'-2498px',
		},500);
		
	});
	
	
	
	
	/*在第三張 點 next */
	$(".next_03").click(function(){
		$(".prv_04").animate({/*第四層箭頭進場*/
			right: '-10px',
			opacity:'1'
		},0);
		$(".next_04").animate({/*第四層箭頭進場*/
			right: '-10px',
			opacity:'1'
		},0);
		$(".prv_03").animate({/*第三層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".next_03").animate({/*第三層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".banner_03").animate({/*第三層圖片退場*/
	  		left:'-2498px'
		},500);
		$(".index_info_03").animate({/*第三層logo退場*/
			right:'-2498px'
		},500);
		$(".banner_04").animate({/*第四層圖片進場*/
	  		right:'40px'
		},1000);
		$(".index_info_04").animate({/*第四層logo進場*/
			left:'30%'
		},1000);
		$(".index_menu_01").animate({/*menu移動*/
			right:'71%'
		},1000);
		
	});
	
	
	
	
	/*在第四張 點 pre */
	$(".prv_04").click(function(){
		$(".prv_04").animate({/*第四層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".next_04").animate({/*第四層箭頭退場*/
			right: '-42px',
			opacity:'0'
		},0);
		$(".prv_03").animate({/*第三層箭頭進場*/
			right: '-10px',
			opacity:'1'
		},0);
		$(".next_03").animate({/*第三層箭頭進場*/
			right: '-10px',
			opacity:'1'
		},0);
		$(".banner_03").animate({/*第三層圖片進場*/
	  		left:'0px'
		},1000);	
		$(".index_info_03").animate({/*第三層logo進場*/
			right:'40px'
		},1000);
		$(".index_menu_01").animate({/*menu移動*/
			right:'40%'
		},1000);
		$(".banner_04").animate({/*第四層圖片退場*/
	  		right:'-2498px'
		},1000);	
		$(".index_info_04").animate({/*第四層logo退場*/
			left:'-2498px',
		},1000);
	});

});
</script>