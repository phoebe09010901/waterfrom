<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');

$obj_admin  = new mysql_page();
$obj_hits   = new mysql_page();
$obj_banner = new mysql_page();
$obj_cate1  = new mysql_page();
$obj_pages  = new mysql_page();
$obj_cate2  = new mysql_page();
$obj_news   = new mysql_page();
$obj_board  = new mysql_page();
$obj_cont   = new mysql_page();
$obj_member = new mysql_page();
$obj_order  = new mysql_page();
//admin
$query = "select count(id) as counts from $table_name_admin where lv='admin'";
$admin1= $obj_admin->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_admin where lv='web'";
$admin2= $obj_admin->run_mysql_out($query);
//banner
$query = "select count(id) as counts from $table_name_banner where category=1";
$banner1 = $obj_banner->run_mysql_out($query);
//pages category
$query = "select id, name from ".$table_name_pages."_category where lang='".$_SESSION[Login_System_User]['lang']."' and prev=0 order by sort desc";
$obj_cate1->run_mysql_list($query);
//news category
$query = "select id, name from ".$table_name_news."_category where lang='".$_SESSION[Login_System_User]['lang']."' and prev=0 order by sort desc";
$obj_cate2->run_mysql_list($query);
//contact
$query = "select count(id) as counts from $table_name_cont where state=0";
$cont1 = $obj_cont->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_cont where state=1";
$cont2 = $obj_cont->run_mysql_out($query);
//member
$query = "select count(id) as counts from $table_name_member";
$member1 = $obj_member->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_member where pub_by_admin=0";
$member2 = $obj_member->run_mysql_out($query);
//orderlist
$query = "select count(id) as counts from $table_name_order where pub=1";
$order = $obj_order->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_order where pub=1 and orderlist_state=0";
$order1= $obj_order->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_order where pub=1 and orderlist_state=0 and pay_state=0";
$order11= $obj_order->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_order where pub=1 and orderlist_state=0 and pay_state=1";
$order12= $obj_order->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_order where pub=1 and orderlist_state=0 and pay_state=2";
$order13= $obj_order->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_order where pub=1 and orderlist_state=1";
$order2= $obj_order->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_order where pub=1 and orderlist_state=2";
$order3= $obj_order->run_mysql_out($query);
$query = "select count(id) as counts from $table_name_order where pub=1 and orderlist_state=3";
$order4= $obj_order->run_mysql_out($query);
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>
<script type="text/javascript" src="../jqwidgets/jqxdatetimeinput.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxcalendar.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxresponse.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxexpander.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	var theme = '<?=jqxStyle?>';
	// create jqxcalendar.
	$("#show_calendar").jqxCalendar({ width: 250, height: 250, theme: theme, culture:'zh-TW' });
	$(".monitorList").jqxExpander({width: '33%', theme: theme});
	
	var response = new $.jqx.response();
	var displayInformation = function () {
                var os = response.os;
                var browser = response.browser;
                var device = response.device;
                $("#os").html("OS: " + os.name + " " + os.version);
                $("#osPlatform").html("Platform: " + os.platform);
                $("#browser").html("Browser: " + browser.name + " " + browser.version + "<br>Access name: " + browser.accessName);
                $("#device").html("Device Type: " + device.type);
                $("#deviceSize").html("Device Width: " + device.width + "<br>Device Height: " + device.height);
                $("#deviceAvailSize").html("Device AvailWidth: " + device.availWidth + "<br>Device AvailHeight: " + device.availHeight);
                $("#deviceSupport").html("Supports Touch Events: " + device.touch + "<br>VML: " + browser.vml + "<br>SVG: " + browser.svg + "<br>Canvas: " + browser.canvas);
            }
	displayInformation();
});
</script>
<style type="text/css">
.calendarArea {
	float: left;
	width: 33%;
	min-width: 380px;
	min-height: 270px;
}
#show_calendar {
	float: left; 
	margin-right: 5px;
}
.calendarArea ul {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.monitorList {
	float: left;
	border-radius: 8px;
	min-width: 380px;
	min-height: 270px;
}
.monitorList div {
	padding: 5px 5px 5px 5px;
	border-radius: 8px;
}
.monitorContent {
	box-shadow: 0px 1px 15px #999 inset;
}
.monitorList ul {
	padding: 5px 5px 10px 10px;
	height: 150px;
}
</style>
</head>
<body>
<?php include("include_top.php"); ?>
<div class="admin-panel">
  <?php include("include_menu.php"); ?><!--slidebar end-->
   <div class="main set_page_h page_shadow">
   <ul class="topbar">
      <a href="index.php"><li class="title"><?=$page_title?></li></a>
      <li class="right"><?php include('include_welcome.php'); ?></li>
   </ul>
   <div class="mainContent">
   	 <div id="data_content">     
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
     <tr>
        <td>
        <div class="calendarArea">
        	<div id='show_calendar' class='show_calendar'></div>
        </div>
        <div class="monitorList">
          <div>系統管理</div>
          <div class="monitorContent">
          	<ul>
            	<li>
             	此系統使用之後端程式語言為 PHP 5<br>
             	搭配資料庫為 MYSQL 網頁編碼為 UTF-8<br><br>
             	</li><!-- end-->
             	<li>
             	<?=$array_admin['admin']?>：<?=$admin1['counts']?>位<br>
             	<?=$array_admin['web']?>：<?=$admin2['counts']?>位<br><br>
             	</li><!-- end-->
          	</ul>
          </div>
        </div>
        <div class="monitorList">
          <div>系統資訊</div>
          <div class="monitorContent">
          	<ul>
                	<li id="os"></li>
                	<li id="osPlatform"></li>
                	<li id="browser"></li>
                	<li id="device"></li>
                	<li id="deviceSize"></li>
                	<li id="deviceAvailSize"></li>
                	<li id="deviceSupport"></li>
          	</ul>
          </div>
        </div>
        <div class="monitorList">
          <div>刊登管理</div>
          <div class="monitorContent">
             <ul>
                 <li>
                 <?php
                 foreach($obj_cate1->result_data as $i => $cate){
                    if($cate) {
                        $query = "select count(id) as counts from $table_name_pages where category='".$cate['id']."' and pub=1";	
                        $pages = $obj_pages->run_mysql_out($query);
                        echo $cate['name'].'：'.$pages['counts'].'則<br>';
                    }
                 }echo '<br>';
                 foreach($obj_cate2->result_data as $i => $cate){
                    if($cate) {
                        $query = "select count(id) as counts from $table_name_news where category='".$cate['id']."' and pub=1";	
                        $news = $obj_news->run_mysql_out($query);
                        echo $cate['name'].'：'.$news['counts'].'則<br>';
                    }
                 }echo '<br>';
                 ?>
                 </li>
                 <li>
                 首頁Banner：<?=$banner1['counts']?>則<br>
                 </li>
             </ul><!-- end-->
          </div>
        </div>
        <div class="monitorList">
          <div>留言管理</div>
          <div class="monitorContent">
             <ul>
                 <li>
                 連絡我們(未處理)：<?=$cont1['counts']?>則<br>
                 連絡我們(已處理)：<?=$cont2['counts']?>則
             	 </li>
             </ul><!-- end-->
          </div>
        </div>
        </td>
     </tr>
     </table>
     </div><!--content end-->
   </div><!--mainContent end-->
   <?php include("include_footer.php"); ?>
  </div><!--main end-->
</div><!--admin-panel end-->
</body>
</html>