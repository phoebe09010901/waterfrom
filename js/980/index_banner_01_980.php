<script type="text/javascript">
// JavaScript Document

$(document).ready(function(){
	
	
	//banner循環放大縮小
	function NEXT () {
		$(".banner_01_01").animate({
			width:"105%",
			height:"105%"
		},5000);
		$(".banner_01_01").animate({
			width:"100%",
			height:"100%"
		},5000);
		$(".banner_02_01").animate({
			width:"113%",
			height:"113%"
		},5000);
		$(".banner_02_01").animate({
			width:"108%",
			height:"108%"
		},5000);
		$(".banner_03_01").animate({
			width:"105%",
			height:"105%"
		},5000);
		$(".banner_03_01").animate({
			width:"100%",
			height:"100%"
		},5000);
		$(".banner_04_01").animate({
			width:"113%",
			height:"113%"
		},5000);
		$(".banner_04_01").animate({
			width:"108%",
			height:"108%"
		},5000);
	};
	var TT = setInterval(NEXT,1000); //只有這邊要自動重複
	//banner循環放大縮小
	
	//function NEXT2 () {
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
			right:'47%',
			opacity:'1'
		},1000);
		
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
	//};
	//var TT2 = setTimeout(NEXT2,300000); //只有這邊要自動重複
	
	
	/*在第一張 點 pre */
	$(".prv_01").click(function(){
		
	});
	
	/*在第一張 點 next */
	$(".next_01").click(function(){
		$(".prv_01").animate({/*第一層箭頭退場*/
			right: '-25px',
			opacity:'0'
		},0);
		$(".next_01").animate({/*第一層箭頭退場*/
			right: '-25px',
			opacity:'0'
		},0);
		$(".prv_02").animate({/*第二層箭頭進場*/
			right: '0px',
			opacity:'1'
		},0);
		$(".next_02").animate({/*第二層箭頭進場*/
			right: '0px',
			opacity:'1'
		},0);
		$(".index_menu_01").animate({/*menu移動*/
			right:'47%',
			opacity:'1'
		},1000);
		$(".banner_01").animate({/*第一層圖片退場*/
			left:'2498px'
		},1000);
		$(".banner_02").animate({/*第二層圖片進場*/
			right:'25px'
		},1000);
		$(".index_info_01").animate({/*第一層logo退場*/
			left:'2498px'
		},1000);
		$(".index_info_02").animate({/*第二層logo進場*/
			left:'0px'
		},1000);
	});
	
	
	
	
	/*在第二張 點 prv */
	$(".prv_02").click(function(){
		$(".prv_01").animate({/*第一層箭頭進場*/
			right: '0px',
			opacity:'0.3'
		},0);
		$(".next_01").animate({/*第一層箭頭進場*/
			right: '0px',
			opacity:'1'
		},0);
		$(".prv_02").animate({/*第二層箭頭退場*/
			right: '-25px',
			opacity:'0'
		},0);
		$(".next_02").animate({/*第二層箭頭退場*/
			right: '-25px',
			opacity:'0'
		},0);
		$(".banner_01").animate({/*第一層圖片進場*/
	  		left:'0px'
		},500);		
		$(".index_info_01").animate({/*第一層logo進場*/
	  		left:'<?php echo ($width*0.5) ;?>px'
    	},500);
		$(".index_menu_01").animate({/*menu移動*/
			right:'25px'
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
			right:'0px',
			opacity:'1'
		},0);
		$(".next_03").animate({/*第三層箭頭進場*/
			right:'0px',
			opacity:'1'
		},0);
		$(".prv_02").animate({/*第二層箭頭退場*/
			right:'-25px',
			opacity:'0'
		},0);
		$(".next_02").animate({/*第二層箭頭退場*/
			right:'-25px',
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
			right:'25px'
		},1000);
		$(".index_menu_01").animate({/*menu移動*/
			right:'36%'
		},1000);
		
	});
	
	
	
	
	/*在第三張 點 pre */
	$(".prv_03").click(function(){
		$(".prv_03").animate({/*第三層箭頭退場*/
			right: '-25px',
			opacity:'0'
		},0);
		$(".next_03").animate({/*第三層箭頭退場*/
			right: '-25px',
			opacity:'0'
		},0);
		$(".prv_02").animate({/*第二層箭頭進場*/
			right: '0px',
			opacity:'1'
		},0);
		$(".next_02").animate({/*第二層箭頭進場*/
			right: '0px',
			opacity:'1'
		},0);
		$(".banner_02").animate({/*第二層圖片進場*/
			right:'25px'
		},1000);	
		$(".index_info_02").animate({/*第二層logo進場*/
			left:'0px'
		},1000);
		$(".index_menu_01").animate({/*menu移動*/
			right:'47%',
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
			right: '0px',
			opacity:'1'
		},0);
		$(".next_04").animate({/*第四層箭頭進場*/
			right: '0px',
			opacity:'1'
		},0);
		$(".prv_03").animate({/*第三層箭頭退場*/
			right: '-25px',
			opacity:'0'
		},0);
		$(".next_03").animate({/*第三層箭頭退場*/
			right: '-25px',
			opacity:'0'
		},0);
		$(".banner_03").animate({/*第三層圖片退場*/
	  		left:'-2498px'
		},500);
		$(".index_info_03").animate({/*第三層logo退場*/
			right:'-2498px'
		},500);
		$(".banner_04").animate({/*第四層圖片進場*/
	  		right:'25px'
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
			right: '-25px',
			opacity:'0'
		},0);
		$(".next_04").animate({/*第四層箭頭退場*/
			right: '-25px',
			opacity:'0'
		},0);
		$(".prv_03").animate({/*第三層箭頭進場*/
			right: '0px',
			opacity:'1'
		},0);
		$(".next_03").animate({/*第三層箭頭進場*/
			right: '0px',
			opacity:'1'
		},0);
		$(".banner_03").animate({/*第三層圖片進場*/
	  		left:'0px'
		},1000);	
		$(".index_info_03").animate({/*第三層logo進場*/
			right:'25px'
		},1000);
		$(".index_menu_01").animate({/*menu移動*/
			right:'36%'
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