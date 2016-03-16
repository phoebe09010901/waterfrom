<?php
class drawpage {
	//construct
	public function __construct() {	
	
	}
	
	public function drawPageWelcome($page_subtitle) {
		global $array_language, $array_admin, $page_title;
		
		?><ul class="topbar">
          <a href="#"><li class="left">首頁</li></a><?=$page_subtitle?>
          <li class="title"><?=$page_title?></li>
          <li class="right"><?php include('include_welcome.php'); ?></li>
        </ul><?php
	}

	public function drawPageWelcomeV2($page_subtitle) {
		global $array_language, $array_admin, $page_title, $page_title_link;
		
		?><ul class="topbar">
          <a href="#"><li class="left">首頁</li></a><?=$page_subtitle?>
          <a href="<?=$page_title_link?>"><li class="title"><?=$page_title?></li></a>
          <li class="right"><?php include('include_welcome.php'); ?></li>
        </ul><?php
	}	
	
	public function drawPageFooter() {
		?><div id='footer_dock' class="footer"><p align="center">&#169; Copyright <?=date("Y")?> <?=Company_Name?> | Powered by <a href="<?=Design_Company_Web?>"><?=Design_Company?> <?=Design_Company_Phone?></a> | <a href="#"><?=Design_Company_Email?></a></p></div><?php	
	}
}	
$obj_drawpage = new drawpage();	
?>