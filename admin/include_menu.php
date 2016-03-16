<?php
require_once(Root_Includes_Path.'class_category.php');		//class
$obj_cateloop  = new show_data_select();
//pages list
$query = "select id, name from ".$table_name_pages."_category where lang='".$_SESSION[Login_System_User]['lang']."' order by sort desc";
$obj_menu1->run_mysql_list($query);
//news list
$query = "select id, name from ".$table_name_news."_category where lang='".$_SESSION[Login_System_User]['lang']."' order by sort desc";
$obj_menu2->run_mysql_list($query);
//news2 list
$query = "select id, name from ".$table_name_news2."_category where lang='".$_SESSION[Login_System_User]['lang']."' order by sort desc";
$obj_menu3->run_mysql_list($query);

?><div class="slidebar set_page_h">
<div class="skin page_shadow set_page_h">
    <div class="logo"><h2>
    <span class="shortname"><?=Company_Name?></span>
    <span class="fullname"><?=Company_Name?></span>
    </h2></div>
      <ul class="navigation">
         <li>
         	<a href="banner.php"><span class="txt">Banner管理</span><span class="slideicon">A</span></a>            
         </li>   
         <li>
         	<a href="proj_category.php"><span class="txt">Project管理</span><span class="slideicon">B</span></a>            
         </li>            
         <li>
         	<a href="aboutus.php"><span class="txt">About Us管理</span><span class="slideicon">C</span></a>            
         </li> 
         <li>
         	<a href="proj3_category.php"><span class="txt">Issue管理</span><span class="slideicon">D</span></a>            
         </li>          
         <li>
         	<a href="#"><span class="txt">Press管理</span><span class="slideicon">E</span></a>            
            <ul>
            <li><a href="proj2_category.php"><span class="txt">Press管理</span></a></li>
            <li><a href="proj2_categoryimg_handle.php"><span class="txt">Press圖片管理</span></a></li>                
            </ul>
         </li>                             
         <li type='separator'></li>
         <?php if($_SESSION[Login_System_User]['lv']=='admin') { ?>
         <li>
           <a href="web_setting.php"><span class="txt admintxt">網站設定管理</span><span class="adminbtn">Y</span></a>
         </li>
         <li>
           <a href="admin.php"><span class="txt admintxt">後台帳號管理</span><span class="adminbtn">X</span></a>
         </li>
         <?php } ?>
         <li>
           <a href="logout.php"><span class="txt admintxt">登出</span><span class="adminbtn">Z</span></a>
         </li>
      </ul>
      <div class="info_box"></div>
      <div class="info info_box">
         <span class="cms">Cloud. CMS</span>
         <span class="version">v1.1501.01</span>
      </div>
   </div><!--skin end-->
</div><!--slidebar end-->