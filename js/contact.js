// JavaScript Document

$(document).ready(function(){
 
    /*點 contact 滑下*/
	$(".contact").click(function(){
		$(".contact_block").animate({/*第一層箭頭退場*/
			top: '0px'
		},700);
		$(".contact_touch").animate({/*第一層箭頭退場*/
			top: '0px'
		},700);
	});
	
	/*點 contact_touch 滑上*/
	$(".contact_touch").click(function(){
		$(".contact_block").animate({/*第一層箭頭退場*/
			top: '-1287px'
		},700);
		$(".contact_touch").animate({/*第一層箭頭退場*/
			top: '-1287px'
		},700);
	});

});