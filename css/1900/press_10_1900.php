<? if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') or strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') or strpos($_SERVER['HTTP_USER_AGENT'], 'Android')) {?>
<!-- 是行動裝置，就顯示以下內容 -->
    <?php 
    	$width = 980-20;
		$height = 643-20;
	?>
<? } else {?>
<!-- 不是行動裝置，就顯示以下內容 -->
	<?php 
		if ( $_GET["screenX"] >= 1900 ){
			$width = $_GET["screenX"]-50;
			$height = $_GET["windowY"]-50;
		} elseif ( $_GET["screenX"] <= 1899 ){
			$width = $_GET["screenX"]-20;
			$height = $_GET["windowY"]-20;
		} else {
			
		}
	?>	
<? }?>

<style type="text/css">
.boxgrid{ 
	width: <?php echo $height/4 ;?>px; 
	height: <?php echo $height/4 ;?>px; 
	float:left;  
	overflow: hidden; 
	position: relative; 
}	
.boxcaption{ 
	float: left; 
	position: absolute; 
	width: <?php echo $height/4 ;?>px; 
	height: <?php echo $height/4 ;?>px;
	text-align:right;
}
.captionfull .boxcaption {
	top: <?php echo $height/4 ;?>px;
	left: 0;
}
.caption .boxcaption {
	top: <?php echo $height/4 ;?>px;
	left: 0;
}

.projects-list,.projects-list li{padding:0;margin:0;list-style:none}
.project-list-item.project .hover-container,.project-list-item.project .hover-container:before{position:absolute;bottom:0;left:0;width:100%;display:block;text-decoration:none;}
.project-list-item.project .hover-container:before{height:100%;background-color:#4D4D4D;content:'';z-index:-1;opacity:0;-webkit-transform:translate3d(0,100%,0);transform:translate3d(0,100%,0)}
.project-list-item.project .hover-container .hover{padding:30px;color:#fff}
.project-list-item.project.current .hover-container,.project-list-item.project.visited .hover-container,.project-list-item.project:hover .hover-container{opacity:1;}
.project-list-item.project:hover .hover-container:before{opacity:.6;}
.project-list-item.project .thumb-container{display:block; width:<?php echo $height/4 ;?>px; height:<?php echo $height/4 ;?>px;}
.thumb-container-type { position:absolute; top:0px; right:0px; text-decoration:none; padding:15px 30px 0 0; }
.thumb-container-type2 { position:absolute; top:0px; right:0px; text-decoration:none; padding:40px 30px 0 0; }


.project-list-item.project.visited .thumb-container{opacity:.8;}
.project-list-item.project .hover-container,.project-list-item.project .hover-container:before{height:100%;opacity:0;-webkit-transition-duration:<?php echo $height/4 ;?>ms;transition-duration:<?php echo $height/4 ;?>ms;-webkit-transform:rotate(0deg); -moz-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg)}
.project-list-item.project .hover-container .hover{position:relative;-webkit-transition-delay:100ms;transition-delay:100ms;-webkit-transition-duration:650ms;transition-duration:650ms;opacity:0;-webkit-transform:translate3d(0,100%,0);transform:translate3d(0,100%,0)}
.project-list-item.project.current .hover-container .hover,.project-list-item.project:hover .hover-container .hover{opacity:1;-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}
.project-list-item.project .title{font-size:18px; line-height:34px; text-align:right; padding-top:3px; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; box-sizing:border-box;}
.project-list-item.project .title .title_01 {font-size:24px; line-height:34px; font-family: "UniversNextPro-Light";}
.project-list-item.project .title .title_02 {font-size:16px; line-height:31px;}



.content2 {
	overflow: auto;
	position: absolute;
	width: <?php echo $height/4 ;?>px;
	height: <?php echo $height;?>px;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	right:40px;
	top:0px;
	background:#F0F0F0;
}

.projects-grid-pane{width:650px}
.projects-grid-pane .projects-list{max-width:<?php echo $height/4 ;?>px}
.projects-grid-pane .projects-list:last-child{left:<?php echo $height/4 ;?>px}
.project-list-item.project{position:relative;overflow:hidden;max-width:<?php echo $height/4 ;?>px}


/*.project-list-item.project-list-item-ga .hover-container:before{background-color: #000000;}
.project-list-item.project-list-item-ga2 .hover-container:before{background-color: #acada7;}
.project-list-item.project-list-item-ga3 .hover-container:before{background-color: #7ecdc7;}
.project-list-item.project-list-item-ga4 .hover-container:before{background-color: #4e4d4d;}
.project-list-item.project-list-item-ga5 .hover-container:before{background-color: #afc1c3;}
.project-list-item.project-list-item-ga6 .hover-container:before{background-color: #152a83;}
.project-list-item.project-list-item-ga7 .hover-container:before{background-color: #acaca6;}
.project-list-item.project-list-item-ga8 .hover-container:before{background-color: #d2cfc7;}
.project-list-item.project-list-item-ga9 .hover-container:before{background-color: #4D4D4D;}
.project-list-item.project-list-item-ga10 .hover-container:before{background-color: #1b1b1b;}*/
</style>