// JavaScript Document

$(document).ready(function(){
 
    /*點 contact 滑下*/
	$(".contact").click(function(){
		$(".contact_block").animate({/*第一層箭頭退場*/
			top: '0px'
		},2000);
		$(".contact_touch").animate({/*第一層箭頭退場*/
			top: '0px'
		},2000);
	});
	
	/*點 contact_touch 滑上*/
	$(".contact_touch").click(function(){
		$(".contact_block").animate({/*第一層箭頭退場*/
			top: '-5555px'
		},3500);
		$(".contact_touch").animate({/*第一層箭頭退場*/
			top: '-5555px'
		},3500);
	});

});