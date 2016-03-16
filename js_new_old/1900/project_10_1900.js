// JavaScript Document

$(document).ready(function(){
	
	$(".boxgrid").animate({
		width: (($(window).height()-80)/4) + 'px',
		height: (($(window).height()-80)/4) + 'px'
	});
	$(".boxcaption").animate({
		width: (($(window).height()-80)/4) + 'px',
		height: (($(window).height()-80)/4) + 'px'
	});
	$(".captionfull .boxcaption").animate({
		top: (($(window).height()-80)/4) + 'px'
	});
	$(".caption .boxcaption").animate({
		top: (($(window).height()-80)/4) + 'px'
	});
	$(".project-list-item.project .thumb-container").animate({
		width: (($(window).height()-80)/4) + 'px',
		height: (($(window).height()-80)/4) + 'px'
	});
	$(".project-list-item.project .title").animate({
		height: (($(window).height()-80)/4) + 'px'
	});
	$(".project-list-item.project .title .title_01").animate({
		height: (($(window).height()-80)/4) + 'px'
	});
	$(".project-list-item.project .title .title_01").animate({
		fontSize: '14px'
	});
	$(".project-list-item.project .title .title_01").animate({
		fontSize: '11px'
	});
	$(".content").animate({
		width: (($(window).height()-80)/4) + 'px',
		height: (($(window).height()-80)) + 'px'
	});
	$(".content2").animate({
		width: (($(window).height()-80)/4) + 'px',
		right: (($(window).height()-80)/4+28) + 'px'
	});
	$(".content3").animate({
		width: (($(window).height()-80)/4) + 'px',
		height: (($(window).height()-80)) + 'px'
	});
	$(".projects-grid-pane .projects-list").animate({
		maxWidth: (($(window).height()-80)/4) + 'px'
	});
	$(".projects-grid-pane .projects-list:last-child").animate({
		left: (($(window).height()-80)/4) + 'px'
	});
	$(".project-list-item .project").animate({
		maxWidth: (($(window).height()-80)/4) + 'px'
	});
	$(".project-list-item.project .hover-container").animate({
		width: (($(window).height()-80)/4) + 'px',
		height: (($(window).height()-80)/4) + 'px'
	});
});