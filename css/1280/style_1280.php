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
@charset "UTF-8";
/* 1280 */

body { background:#E6E6E6;font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;}
img { border:0px;}
.clear {
  clear: both;
} 

@font-face {
font-family: 'UniversNextPro-Light';
src:url('font/258C67_0_0.eot');
src:url('font/258C67_0_0.eot?#iefix') format('embedded-opentype'),
    url('font/258C67_0_0.woff') format('woff'),
    url('font/258C67_0_0.ttf') format('truetype');
font-weight: normal;
font-style: normal;
}

@font-face {
font-family: 'Klill-Light';
src:url('font/Klill-Light.eot');
src:url('font/Klill-Light.eot?#iefix') format('embedded-opentype'),
    url('font/Klill-Light.woff') format('woff'),
    url('font/Klill-Light.ttf') format('truetype'),
    url('font/Klill-Light.svg#Klill-Light') format('svg');
font-weight: normal;
font-style: normal;
}

@font-face {
font-family: 'MyriadSetPro-Thin';
src:url('font/MyriadSetPro-Thin.eot');
src:url('font/MyriadSetPro-Thin.eot?#iefix') format('embedded-opentype'),
    url('font/MyriadSetPro-Thin.woff') format('woff'),
    url('font/MyriadSetPro-Thin.ttf') format('truetype'),
    url('font/MyriadSetPro-Thin.svg#MyriadSetPro-Thin') format('svg');
font-weight: normal;
font-style: normal;
}

@font-face {
font-family: 'ArnoPro-LightDisplay';
src:url('font/ArnoPro-LightDisplay.eot');
src:url('font/ArnoPro-LightDisplay.eot?#iefix') format('embedded-opentype'),
    url('font/ArnoPro-LightDisplay.woff') format('woff'),
    url('font/ArnoPro-LightDisplay.ttf') format('truetype'),
    url('font/ArnoPro-LightDisplay.svg#ArnoPro-LightDisplay') format('svg');
font-weight: normal;
font-style: normal;
}

@font-face {
font-family: 'Montserrat';
src:url('font/Montserrat.eot');
src:url('font/Montserrat.eot?#iefix') format('embedded-opentype'),
    url('font/Montserrat.woff') format('woff'),
    url('font/Montserrat.ttf') format('truetype'),
    url('font/Montserrat.svg#Montserrat') format('svg');
font-weight: normal;
font-style: normal;
}

.size { position:absolute; z-index:99999; top:20px; left:20px; text-indent:-999999px;}

.wapper_01 {
	position:absolute;
	left:50%;  
	top:50%;
	background:#FFF;
	overflow:hidden;
	z-index:1;
	opacity:0;
}


/*第一張*/
.banner_01 {
	width:60%;
	height:98%;
	position:absolute;
	left:2498px;
	top:0px;
	z-index:2;
	overflow:hidden;
}
.banner_01_01 {
	width:100%;
	height:100%;
}
.index_info_01 {
	width:<?php echo ($height/4)+50 ;?>px;
	height:100%;
	position:absolute;
	left:2498px;
	top:0px;
	z-index:4;
}
.index_menu_01 {
	width:312px;
	height:100%;
	position:absolute;
	right:50px;
	top:0px;
	z-index:3;
	opacity:0;
	background:#FFF;
}
	.index_menu_01 .index_title_01 {
		width:150px;
		position:absolute;
		bottom:25px;
		right:40px;
	}
		.index_menu_01 .index_title_01 .logo{
			margin-bottom:70px;
			margin-top:30px;
			width:100%;
			font-family: 'Klill-Light';
			font-size:26px;
			line-height:22px;
		}
		.index_menu_01 .index_title_01 .logo a{
			color:#3d3a39;
			text-decoration:none;
		}
			.index_menu_01 .index_title_01 .logo .small_font {
				font-family: 'Klill-Light';
				font-size:18px;
			} 
		.index_menu_01 .index_title_01 ul {
			list-style: none;
			width:100px;
			padding:0;
			margin:0;
		} 
		.index_menu_01 .index_title_01 ul li{
			font-size:16px;
			color:#969696;
			line-height:38px;
			width:100px;
			font-family: 'UniversNextPro-Light';
		}
		.index_menu_01 .index_title_01 ul li a {
			color:#969696;
		} 
		.index_menu_01 .index_title_01 ul li a:hover{
			color:#3e3a39;
		}

.prv_01 {width:30px; height:60px; position:absolute; z-index:6; right:-40px; bottom:127px; opacity:0.3; background:url(images/index_pre_01.png); background-size:30px 60px}
.next_01  {width:30px; height:60px; position:absolute; z-index:6; right:-40px; bottom:68px; opacity:1; background:url(images/index_next_01.png); background-size:30px 60px}


/*第二張*/
.banner_02 {
	width:35%;
	height:100%;
	right:-2498px;
	position:absolute;
	z-index:2;
	overflow:hidden;
}
.banner_02_01 {
	width:100%;
	height:100%;
}
.index_info_02 {
	width:35%;
	height:100%;
	position:absolute;
	left:-2498px;
	top:0px;
	z-index:2;
}

.prv_02 {width:30px; height:60px; position:absolute; z-index:5; right:-40px; bottom:127px; opacity:0; background:url(images/index_pre_01.png); background-size:30px 60px}
.next_02  {width:30px; height:60px; position:absolute; z-index:5; right:-40px; bottom:68px; opacity:0; background:url(images/index_next_01.png); background-size:30px 60px}


/*第三張*/
.banner_03 {
	width:43%;
	height:100%;
	left:-2498px;
	position:absolute;
	z-index:8;
	overflow:hidden;
}
.banner_03_01 {
	width:100%;
	height:100%;
}
.index_info_03 {
	width:35%;
	height:100%;
	position:absolute;
	right:-2498px;
	top:0px;
	z-index:7;
}

.prv_03 {width:30px; height:60px; position:absolute; z-index:5; right:-40px; bottom:127px; opacity:0; background:url(images/index_pre_01.png); background-size:30px 60px}
.next_03  {width:30px; height:60px; position:absolute; z-index:5; right:-40px; bottom:68px; opacity:0; background:url(images/index_next_01.png); background-size:30px 60px}


/*第四張*/
.banner_04 {
	width:30%;
	height:98%;
	right:-2498px;
	position:absolute;
	z-index:10;
	overflow:hidden;
}
.banner_04_01 {
	width:100%;
	height:100%;
}
.index_info_04 {
	width:50%;
	height:100%;
	position:absolute;
	left:-2498px;
	top:0px;
	z-index:9;
}

.prv_04 {width:30px; height:60px; position:absolute; z-index:5; right:-40px; bottom:127px; opacity:0; background:url(images/index_pre_01.png); background-size:30px 60px}
.next_04  {width:30px; height:60px; position:absolute; z-index:5; right:-40px; bottom:68px; opacity:0; background:url(images/index_next_01.png); background-size:30px 60px}


.index_logo { width:58px; height:58px; position:absolute; top:12px; left:14px;}
.index_name { color:#FFF; transform:rotate(-90deg); -webkit-transform:rotate(-90deg); -moz-transform:rotate(-90deg); -ms-transform:rotate(-90deg); letter-spacing:1px; font-family: 'Klill-Light'; font-size:9px; position:absolute; top:115px; left:-30px;}


/* projects */
.projects_logo {
	width:45%;
	height:100%;
	position:absolute;
	left:0px;
	top:0px;
	z-index:3;
}
.projects_menu {
	width:320px;
	height:100%;
	position:absolute;
	right:<?php echo ($height/2)+20 ;?>px;
	top:0px;
	z-index:4;
	opacity:1;
	background:#FFF;
}
	.projects_menu .index_title_01 {
		width:150px;
		position:absolute;
		bottom:25px;
		right:40px;
	}
		.projects_menu .index_title_01 .logo{
			margin-bottom:70px;
			margin-top:30px;
			width:100%;
			font-family: 'Klill-Light';
			font-size:26px;
			line-height:22px;
		}
		.projects_menu .index_title_01 .logo a{
			color:#3d3a39;
			text-decoration:none;
		}
			.projects_menu .index_title_01 .logo .small_font {
				font-family: 'Klill-Light';
				font-size:18px;
			} 
		.projects_menu .index_title_01 ul li{
			font-size:16px;
			color:#969696;
			line-height:38px;
			width:100px;
			font-family: 'UniversNextPro-Light';
		}
		.projects_menu .index_title_01 ul li a {
			color:#969696;
		} 
		.projects_menu .index_title_01 ul li a:hover{
			color:#3e3a39;
		}
		
.projects_menu_02 {
	width:190px;
	height:100%;
	position:absolute;
	right:<?php echo ($height/4)+20 ;?>px;
	top:0px;
	z-index:4;
	opacity:1;
	background:#FFF;
}
	.projects_menu_02 .index_title_01 {
		width:150px;
		position:absolute;
		bottom:25px;
		right:40px;
	}
		.projects_menu_02 .index_title_01 .logo{
			margin-bottom:70px;
			margin-top:30px;
			width:100%;
			font-family: 'Klill-Light';
			font-size:26px;
			line-height:22px;
		}
		.projects_menu_02 .index_title_01 .logo a{
			color:#3d3a39;
			text-decoration:none;
		}
			.projects_menu_02 .index_title_01 .logo .small_font {
				font-family: 'Klill-Light';
				font-size:18px;
			} 
		.projects_menu_02 .index_title_01 ul {
			list-style: none;
			width:100px;
			padding:0;
			margin:0;
		} 
		.projects_menu_02 .index_title_01 ul li{
			font-size:16px;
			color:#969696;
			line-height:38px;
			width:100px;
			font-family: 'UniversNextPro-Light';
		}
		.projects_menu_02 .index_title_01 ul li a {
			color:#969696;
		} 
		.projects_menu_02 .index_title_01 ul li a:hover{
			color:#3e3a39;
		}

/* profile */
.profile_logo {
	width:<?php echo $height/4 ;?>px;
	height:100%;
	background:#baba79;
	position:absolute;
	right:30px;
	top:0px;
	z-index:4;
}
.profile_menu {
	width:677px;
	height:100%;
	position:absolute;
	right:<?php echo ($height/4)+20 ;?>px;
	top:0px;
	z-index:3;
	opacity:1;
	background:#FFF;
}
	.profile_menu .index_title_01 {
		width:150px;
		position:absolute;
		bottom:25px;
		right:40px;
	}
		.profile_menu .index_title_01 .logo{
			margin-bottom:70px;
			margin-top:30px;
			width:100%;
			font-family: 'Klill-Light';
			font-size:26px;
			line-height:22px;
		}
		.profile_menu .index_title_01 .logo a{
			color:#3d3a39;
			text-decoration:none;
		}
			.profile_menu .index_title_01 .logo .small_font {
				font-family: 'Klill-Light';
				font-size:18px;
			} 
		.profile_menu .index_title_01 ul {
			list-style: none;
			width:100px;
			padding:0;
			margin:0;
		} 
		.profile_menu .index_title_01 ul li{
			font-size:16px;
			color:#969696;
			line-height:38px;
			width:100px;
			font-family: 'UniversNextPro-Light';
		}
		.profile_menu .index_title_01 ul li a {
			color:#969696;
		} 
		.profile_menu .index_title_01 ul li a:hover{
			color:#3e3a39;
		}


/* projects */	
.projects_info {
	width:55%;
	height:100%;
	left:0px;
	top:0px;
	position:absolute;
	z-index:9;
	background:#F0F0F0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	overflow: auto;
}
	.projects_info .info_01 {
		/*color:#FFF; */
		color:#3E3A39;
		width:100%; 
		/*background:#72727c; */
		background:#F0F0F0;
		padding: 36px 37px; 
		-webkit-box-sizing: border-box; 
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		border-bottom:1px #333333 solid;
	}
		.projects_info .info_01 .font_01 {
			font-size:30px; line-height:30px;font-family: 'MyriadSetPro-Thin';
		}
		.projects_info .info_01 .font_02 {
			color: #191919; font-size:15px; line-height:30px;
		}
		.projects_info .info_01 .font_03 {
			color: #191919; font-size:11px; line-height:20px;
		}
	
	.projects_info .info_02 {
		/*color:#FFF; */
		color:#3E3A39;
		width:100%; 
		/*background:#027faf; */
		background:#F0F0F0;
		padding: 36px 37px; 
		-webkit-box-sizing: border-box; 
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		border-bottom:1px #333333 solid;
	}
		.projects_info img {
			width:100%; 
		}
		.projects_info .info_02 .font_01 {
			font-size:15px; line-height:30px;
		}
		.projects_info .info_02 .font_02 {
			font-size:30px; line-height:30px;font-family: 'MyriadSetPro-Thin';
		}
		.projects_info .info_02 .font_03 {
			color: #191919; font-size:11px; line-height:20px;
		}
	
	.projects_info .info_03 {
		color:#3E3A39; 
		width:100%; 
		/*background:#ced3d9; */
		background:#F0F0F0;
		padding: 36px 37px; 
		-webkit-box-sizing: border-box; 
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		border-bottom:1px #333333 solid;
	}
		.projects_info .info_03 .font_01 {
			font-size:16px; line-height:31px;
		}
		.projects_info .info_03 .font_02 {
			font-size:31px; line-height:31px; font-family: 'MyriadSetPro-Thin';
		}
		.projects_info .info_03 .teamList { width:530px; display:block;}
		.projects_info .info_03 .teamList .teamList_block {width:265px; height:70px; float:left;}
		.projects_info .info_03 .font_03 {
			color: #191919; font-size:12px; line-height:21px;
		}
		.projects_info .info_03 .font_04 {
			color: #191919; font-size:12px; line-height:21px; font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
		}
	
	.projects_info .info_04 {
		color:#3E3A39; 
		width:100%; 
		background:#F0F0F0; 
		padding: 36px 37px; 
		-webkit-box-sizing: border-box; 
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		border-bottom:1px #333333 solid;
	}
		.projects_info .info_04 .font_01 {
			font-size:15px; line-height:30px;
		}
		.projects_info .info_04 .font_02 {
			font-size:30px; line-height:30px;
		}
		.projects_info .info_04 .teamList { width:670px; display:block;}
		.projects_info .info_04 .teamList .teamList_block {width:333px; height:70px; float:left;}
		.projects_info .info_04 .font_03 {
			color: #191919; width:55px; font-size:11px; line-height:20px; float:left; height:35px;
		}
		.projects_info .info_04 .font_04 {
			color: #191919; width:100%; font-size:11px; line-height:20px;
		}
	.project_down { width:30px; height:30px; position:absolute; right:0px; z-index:5;}

.pressContent_info {
	width:55%;
	height:100%;
	left:0px;
	top:0px;
	position:absolute;
	z-index:9;
	background:#F0F0F0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	overflow: auto;
}
	.pressContent_info .info_01 {
		width:100%; 
		padding: 49px 0px 37px 30px;
		-webkit-box-sizing: border-box; 
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		border-bottom: 1px #000000 solid;
	}		
		.pressContent_info .info_01 .share_icon {
			margin-bottom:0px;
			position:absolute;
			top:16px;
			right:16px;
			width:30px;
		}
		.pressContent_info .info_01 .share_icon .facebook{
			background:url(images/news_icon.png) no-repeat; 
			background-size: 30px 14px; 
			background-position:top 0px left 0px; 
			width:14px; 
			height:14px; 
			float:left;
		}
		.pressContent_info .info_01 .share_icon .pinterest{
			background:url(images/news_icon.png) no-repeat; 
			background-size: 30px 14px; 
			background-position:top 0px right 0px; 
			width:14px; 
			height:14px;
			float:right;
		}
		.pressContent_info .info_01 .left_info {
			width:100%;
			float:left;
		}
			.pressContent_info .info_01 .left_info .font_01 {
				width:87%; font-size:11px; line-height:20px; color:#3E3A39; font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif; margin-bottom:47px;
			}
			.pressContent_info .info_01 .left_info .font_02 {
				width:87%; font-size:14px; line-height:20px; color:#3E3A39; font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif; margin-bottom:37px;
			}
				.pressContent_info .info_01 .left_info .font_02 .font_02_left {
					width:100%; float:left; height:90px;
				}
					.pressContent_info .info_01 .left_info .font_02 .font_02_left .title_01 {
						font-size:13px; line-height:30px; color:#191919;
					}
					.pressContent_info .info_01 .left_info .font_02 .font_02_left .title_02 {
						font-size:25px; line-height:30px; color:#191919; font-family: 'MyriadSetPro-Thin';
					}
				.pressContent_info .info_01 .left_info .font_02 .font_02_right {
					width:100%; float:left; font-size:11px; line-height:20px;
				}
			.pressContent_info .info_01 .left_info .font_03 {
				font-size:15px; line-height:15px; color:#727171;
			}
		
		.pressContent_info .info_01 .right_pic {
			width:54px;
			height:26px;
			float:right;
			margin-right:22px;
		}
		
	.pressContent_info .project_down2 { width:30px; height:30px; float:right;}
	
	.pressContent_info .info_02 {
		width:90%;
		margin-bottom:30px;
		margin-left:30px;
		-webkit-box-sizing: border-box; 
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		float:left;
		cursor:url(zoom.png),url(zoom.cur), default;
	}
	.pressContent_info .info_02_last {
		width:1298px;
		margin-bottom:0px;
		margin-left:92px;
		-webkit-box-sizing: border-box; 
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

		



/* press */
.press_menu {
	width:312px;
	height:100%;
	position:absolute;
	right:<?php echo ($height/4)+20 ;?>px;
	top:0px;
	z-index:3;
	opacity:1;
	background:#FFF;
}
	.press_menu .index_title_01 {
		width:150px;
		position:absolute;
		bottom:25px;
		right:40px;
	}
		.press_menu .index_title_01 .logo{
			margin-bottom:70px;
			margin-top:30px;
			width:100%;
			font-family: 'Klill-Light';
			font-size:26px;
			line-height:22px;
		}
		.press_menu .index_title_01 .logo a{
			color:#3d3a39;
			text-decoration:none;
		}
			.press_menu .index_title_01 .logo .small_font {
				font-family: 'Klill-Light';
				font-size:18px;
			} 
		.press_menu .index_title_01 ul {
			list-style: none;
			width:100px;
			padding:0;
			margin:0;
		} 
		.press_menu .index_title_01 ul li{
			font-size:16px;
			color:#969696;
			line-height:38px;
			width:100px;
			font-family: 'UniversNextPro-Light';
		}
		.press_menu .index_title_01 ul li a {
			color:#969696;
		} 
		.press_menu .index_title_01 ul li a:hover{
			color:#3e3a39;
		}

.press_pic {	
	overflow: hidden;
	position: absolute;
	width: 65%;
	height: 100%;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	left:0px;
	top:0px;
}

.press_info {
	width:55%;
	height:100%;
	left:0px;
	top:0px;
	position:absolute;
	z-index:9;
	background:#F0F0F0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	overflow: auto;
}
	.press_info .info_01 {
		width:100%;
		height:234px;
		padding: 12px 0px 0px 32px;
		margin-bottom:20px;
		-webkit-box-sizing: border-box; 
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		border-bottom: 1px #CCC solid;
		overflow:hidden;
	}
		.press_info .info_01 .left_info {
			width:30%;
			float:left;
		}
			.press_info .info_01 .left_info .font_01 {
			font-size:12px; line-height:21px; color:#191919;
			}
			.press_info .info_01 .left_info .font_02 {
				font-size:17px; line-height:21px;font-family: 'MyriadSetPro-Thin'; width:100%; height:130px; color:#191919;
			}
			.press_info .info_01 .left_info .font_03 {
				font-size:11px; line-height:20px; color:#727171;
			}
		
		.press_info .right_pic {
			width:63%;
			height:221px;
			float:right;
		}
		.press_info .right_pic img{
			height:221px;
		}
		
		
		
/* news */
.news_logo {
	width:<?php echo $height/4 ;?>px;
	height:100%;
	background:#478786;
	position:absolute;
	right:30px;
	top:0px;
	z-index:4;
}
.news_menu {
	width:677px;
	height:100%;
	position:absolute;
	right:<?php echo ($height/4)+20 ;?>px;
	top:0px;
	z-index:3;
	opacity:1;
	background:#FFF;
}
	.news_menu .index_title_01 {
		width:150px;
		position:absolute;
		bottom:25px;
		right:40px;
	}
		.news_menu .index_title_01 .logo{
			margin-bottom:70px;
			margin-top:30px;
			width:140px;
			height:40px;
			font-family: 'Klill-Light';
			font-size:26px;
			line-height:22px;
		}
		.news_menu .index_title_01 .logo a{
			color:#3d3a39;
			text-decoration:none;
		}
			.news_menu .index_title_01 .logo .small_font {
				font-family: 'Klill-Light';
				font-size:18px;
			} 
		.news_menu .index_title_01 ul {
			list-style: none;
			width:100px;
			padding:0;
			margin:0;
		} 
		.news_menu .index_title_01 ul li{
			font-size:16px;
			color:#969696;
			line-height:38px;
			width:100px;
			font-family: 'UniversNextPro-Light';
		}
		.news_menu .index_title_01 ul li a {
			color:#969696;
		} 
		.news_menu .index_title_01 ul li a:hover{
			color:#3e3a39;
		}


/*------------ issue ------------*/
.news_info {
	width:55%;
	height:100%;
	left:0px;
	top:0px;
	position:absolute;
	z-index:9;
	background:#F0F0F0;
	padding:16px;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	overflow: auto;
}
	.news_info .page_no {
		width:100%;
		text-align:right;
		float:right;
		margin-bottom:10px;
	}
		.news_info .page_no .right_no {
			font-size:14px;
			line-height:22px;
			opacity:0.3;
			float:right;
			font-family: 'MyriadSetPro-Thin';
			color: #656565;
		}
			.news_info .page_no .right_no a {
				text-decoration:none;
				color: #3E3A39;
			}
			.news_info .page_no .right_no a:hover {
				text-decoration:none;
			}
			.news_info .page_no .right_icon {
				float:right;
				opacity:0.3;
				height:15px;
				margin-left:20px;
			}
	.news_info .border_01 {
		width:100%;
		border-bottom:1px #999999 solid;
		margin-top:30px;
	}
	
	.news_info .info_01 {
		width:100%;
		float:left;
		margin-bottom:25px;
		position: relative;
		background:url(images/line.png) repeat-x bottom 3px left 0px;
	}
	.news_info .info_01 .year {
		font-size:12px;
		line-height:21px;
		font-family: 'ArnoPro-LightDisplay';
		color:#656565;
		width:9%;
		height: 20px;
		float:left;
		text-align:left;
	}
	.news_info .info_01 .left_info {
		color:#656565;
		width:38%;
		float:left;
	}
		.news_info .info_01 .left_info .font_01 {
			font-size:13px; color:#191919;
		}
		.news_info .info_01 .left_info .font_02 {
			font-size:21px; line-height:30px; font-family: 'MyriadSetPro-Thin'; color:#191919;
		}
		.news_info .info_01 .left_info .font_03 {
			font-size:11px; line-height:20px; color:#3E3A39; width:100%;
		}
		.news_info .info_01 .left_info .more {
			font-size:11px; line-height:20px; color:#656565; font-family: 'Klill-Light'; text-decoration:none;
		}
			.news_info .info_01 .left_info .more a {
				color:#656565;
				text-decoration:none;
			}
			.news_info .info_01 .left_info .more a:hover {
				color:#888;
				text-decoration:none;
			}
		.news_info .info_01 .left_info .share {
			width:30px;
			position:absolute;
			bottom:5px;
		}
		.news_info .info_01 .right_pic {
			width:50%;
			float:right;
		}
		
		
	.news_info .info_02 {
		width:100%;
		float:left;
		margin-bottom:25px;
		position: relative;
		background:url(images/line.png) repeat-x bottom 3px left 0px;
	}
	.news_info .info_02 .year {
		font-size:12px;
		line-height:21px;
		font-family: 'ArnoPro-LightDisplay';
		color:#656565;
		width:9%;
		height: 20px;
		float:left;
		text-align:right;
	}
	.news_info .info_02 .left_info {
		color:#656565;
		width:40%;
		float:right;
	}
		.news_info .info_02 .left_info .font_01 {
			font-size:13px; color:#595757;
		}
		.news_info .info_02 .left_info .font_02 {
			font-size:21px; line-height:30px; font-family: 'MyriadSetPro-Thin'; color:#000;
		}
		.news_info .info_02 .left_info .font_03 {
			font-size:11px; line-height:20px; color:#191919; width:100%;
		}
		.news_info .info_02 .left_info .more {
			font-size:11px; line-height:20px; color:#888; font-family: 'Klill-Light'; text-decoration:none;
		}
			.news_info .info_02 .left_info .more a {
				color:#888;
				text-decoration:none;
			}
			.news_info .info_02 .left_info .more a:hover {
				color:#888;
				text-decoration:none;
			}
		.news_info .info_02 .left_info .share {
			width:30px;
			position:absolute;
			bottom:5px;
		}
		.news_info .info_02 .right_pic {
			width:50%;
			float:left;
		}
		
	
		
/*------------ issue 02 ------------*/
.news_02_logo {
	width:<?php echo $height/4 ;?>px;
	height:100%;
	background:#AC9C7F;
	position:absolute;
	right:30px;
	top:0px;
	z-index:4;
}
.news_02_menu {
	width:677px;
	height:100%;
	position:absolute;
	right:<?php echo ($height/4)+20 ;?>px;
	top:0px;
	z-index:3;
	opacity:1;
	background:#FFF;
}
	.news_02_menu .index_title_01 {
		width:150px;
		position:absolute;
		bottom:25px;
		right:40px;
	}
		.news_02_menu .index_title_01 .logo{
			margin-bottom:70px;
			margin-top:30px;
			width:100%;
			font-family: 'Klill-Light';
			font-size:26px;
			line-height:22px;
		}
		.news_02_menu .index_title_01 .logo a{
			color:#3d3a39;
			text-decoration:none;
		}
			.news_02_menu .index_title_01 .logo .small_font {
				font-family: 'Klill-Light';
				font-size:18px;
			} 
		.news_02_menu .index_title_01 ul {
			list-style: none;
			width:100px;
			padding:0;
			margin:0;
		} 
		.news_02_menu .index_title_01 ul li{
			font-size:16px;
			color:#969696;
			line-height:38px;
			width:100px;
			font-family: 'UniversNextPro-Light';
		}
		.news_02_menu .index_title_01 ul li a {
			color:#969696;
		} 
		.news_02_menu .index_title_01 ul li a:hover{
			color:#3e3a39;
		}
	
.news_02_info {
	width:55%;
	height:100%;
	left:0px;
	top:0px;
	position:absolute;
	z-index:9;
	background:#F0F0F0;
	padding:16px;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;/*這個元素的內距和邊框將不會增加元素本身的寬度*/
	overflow: auto;
}
			
	.news_02_info .share_block {
		width:30px;
		height:16px;
		float:right;
	}
		.news_02_info .share {
			width:30px;
		}
		.news_02_info .share_block .facebook{
			background:url(images/news_icon.png) no-repeat; 
			background-size: 30px 14px; 
			background-position:top 0px left 0px; 
			width:14px; 
			height:14px;
			float:left;
		}
		.news_02_info .share_block .pinterest{
			background:url(images/news_icon.png) no-repeat; 
			background-size: 30px 14px; 
			background-position:top 0px right 0px; 
			width:14px; 
			height:14px;
			float:right;
		}
	.news_02_info .info_01 {
		width:100%;
		float:left;
	}
	.news_02_info .info_02 {
		width:100%;
		height:auto;
		float:left;
		margin-bottom:30px;
	}
	.news_02_info .year {
		font-size:12px;
		font-family: 'ArnoPro-LightDisplay';
		color:#656565;
		line-height:14px;
		width:10%;
		height: 20px;
		float:left;
		margin-top:3px;
	}
	.news_02_info .left_info {
		color:#656565;
		width:43%;
		height:auto;
		float:left;
	}
		.news_02_info .left_info .font_01 {
			font-size:13px; color:#595757; margin-bottom:5px;
		}
		.news_02_info .left_info .font_02 {
			font-size:21px; line-height:24px;font-family: 'MyriadSetPro-Thin'; color:#000; margin-bottom:5px;
		}
		.news_02_info .left_info .font_03 {
			font-size:11px; line-height:20px; color:#191919; width:100%; margin-bottom:10px;
		}
	.news_02_info .page_no {
		width:46%;
		text-align:right;
		float:right;
		margin-top:25px;
	}
		.news_02_info .page_no .right_icon_close {
			float:right;
			opacity:0.3;
			height:15px;
			margin-left:30px;
		}
		.news_02_info .page_no .right_icon {
			float:right;
			opacity:0.3;
			height:15px;
			margin-left:20px;
		}
	.news_02_info .right_pic {
		width:46%;
		float:right;
	}
	
	
	
	

			
		
/* contact */		
.contact_block {
	position:absolute; 
	z-index:9998; 
	top: -1287px; 
	left:37px; 
	width:70%; 
	height:90%;
	background:#D8D8D8;
}	
	.contact_block .menu_title { 
		width:178px;
		height:138px;
		text-align:right;
		position:absolute; 
		z-index:9999; 
		top:30px; 
		right:40px; 
	}
	.contact_block .com_area { 
		width:100%;
		margin: 30px 0 0 73px; 
		font-size:12px; 
		line-height:18px;
		font-family: 'MyriadSetPro-Thin'; 
		color:#000; 
	}
		.contact_block .com_area .company_01 { 
			width:20%;
			float:left;
			margin-right:35px;
		}
			.contact_block .com_area .company_01 .top_title { 
				position:absolute; top:30px; left:35px;
			}
			.contact_block .com_area .company_01 .bottom_info { 
				position:absolute; bottom:30px; left:35px;
			}
			.contact_block .com_area .company_01 .top_title2 { 
				position:absolute; top:30px; left:300px;
			}
			.contact_block .com_area .company_01 .bottom_info2 { 
				position:absolute; bottom:30px; left:300px;
			}
		
		.contact_block .com_area .company_02 { 
			width:20%;
			float:left;
			margin-right:98px;
		}
		.contact_block .com_area .company_03 { 
			width:20%;
			float:right;
			margin-right:125px;
		}
			.contact_block .com_area .company_03 .right_info { 
				position:absolute; bottom:30px; right:35px;
			}
		
		.contact_block .com_area .contury {
				font-size:21px; 
				line-height:24px;
				font-family: 'MyriadSetPro-Thin';
				width:100%;
				color:#191919;
			}
		.contact_block .com_area .city {
			font-size:13px; 
			line-height:13px;
			width:100%;
			color:#191919;
			margin-bottom:0px;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
			
		}
			.contact_block .com_area .city .city_01{
				color:#FFF; 
				font-size:13px;
				line-height:37px;
				font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
			}
		.contact_block .com_area .info_01 {
			font-size:11px; 
			line-height:18px;
			width:250px;
			color:#191919;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
		}
		.contact_block .com_area .info_02 {
			font-size:11px; 
			line-height:18px;
			width:250px;
			color:#191919;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
		}
		.contact_block .com_area .info_03 {
			font-size:11px; 
			line-height:18px;
			width:250px;
			color:#191919;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
		}
		.contact_block .com_area .info_04 {
			font-size:11px; 
			line-height:18px;
			width:250px;
			color:#6A6872;
			margin-top:5px;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
		}
		.contact_block .com_area .info_04 a {
			color:#6A6872;
			text-decoration:none;
		}
		.contact_block .com_area .info_04 a:hover {
			color:#6A6872;
			text-decoration:none;
		}
		.contact_block .com_area .info_05 {
			font-size:11px; 
			line-height:18px;
			width:250px;
			color:#191919;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
		}
		.contact_block .com_area .info_06 {
			font-size:11px; 
			line-height:18px;
			width:150px;
			color:#191919;
			margin-top:12px;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
		}
		.contact_block .com_area .info_07 {
			font-size:11px; 
			line-height:18px;
			width:150px;
			color:#6A6872;
			margin-bottom:25px;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
		}
		.contact_block .com_area .info_07 a {
			color:#6A6872;
			text-decoration:none;
		}
		.contact_block .com_area .info_07 a:hover {
			color:#6A6872;
			text-decoration:none;
		}
		.contact_block .com_area .info_08 {
			font-size:11px; 
			line-height:18px;
			width:150px;
			color:#191919;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
		}
		.contact_block .com_area .info_09 {
			font-size:11px; 
			line-height:18px;
			width:150px;
			color:#191919;
			font-family:'Microsoft JhengHei', 微軟正黑體,sans-serif;
			padding-left:21px;
		}
	
.contact_touch {position:absolute; z-index:9997; top: -1887px; left:0px; width:100%; height:100%;}
</style>