// JavaScript Document

$(document).ready(function(){
 
    $(".wapper_01").animate({
		opacity:'1'
    },1000);
	
	if ( $(window).width() >= 1900 ){
		$(".projects_menu").animate({
			right: (($(window).height()-80)/2+28) + 'px'
		},0);
	} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
		$(".projects_menu").animate({
			right: (($(window).height()-40)/2+30) + 'px'
		},0);
	} else {
	}
	
	$(window).resize(function() {
		if ( $(window).width() >= 1900 ){
			$(".projects_menu").animate({
				right: (($(window).height()-80)/2+28) + 'px'
			},0);
		} else if ( $(window).width() < 1900 && $(window).width() > 1200 ){
			$(".projects_menu").animate({
				right: (($(window).height()-40)/2+30) + 'px'
			},0);
		} else {
		}
	});
	
	$(".wapper_03").animate({
		opacity:'1'
    },1000);
	

});