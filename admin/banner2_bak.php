<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'function_page.php');

$main_str   = 'banner2';
$table_name = Proj_Name.'_'.$main_str;
$obj_banner = new mysql_page();
$obj_image  = new files();		

$page_num   = 20; //設定每頁顯示數目
$page_go    = ($page_go)?format_data($page_go, 'int'):1;
$category   = ($category)?$category:1;


$cate_str  = $CategoryList2[$category]['Title'];
$_width    = $CategoryList2[$category]['Width'];
$_height   = $CategoryList2[$category]['Height'];
$_width_s  = $CategoryList2[$category]['Width_s'];
$_height_s = $CategoryList2[$category]['Height_s'];
$file_size = $CategoryList2[$category]['FileSize'];

if($action=='del') {
	$obj_mysqlExec->deleteInit($id);
}elseif($_POST['action']=='del_all') {
	$obj_mysqlExec->batchDelete($_POST['IDlist']);
}elseif($_POST['action']=='change_data') {	//批次修改狀態
	$obj_mysqlExec->batchUpdate($_POST['row_name'], $_POST['row_value'], $_POST['IDlist']);
}

//data list
if($search_row) {
	$where_str = "and ".$search_row." like '%".$keywords."%'";	
}
$query = "select id, file1, title, url_to, sort, pub, create_time, edit_time from $table_name where lang='".$_SESSION[Login_System_User]['lang']."' and category=$category $where_str order by sort desc";	
$obj_banner->count_page($query, $page_go, $page_num);
$page_all = $obj_banner->page_all;
$obj_all  = $obj_banner->obj_all;
//subtitle
$page_subtitle = '<li class="left"><a href="banner2.php?category='.$category.'">'.$cate_str.'</a></li>';
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>
<script type="text/javascript">
$(document).ready(function () {
	var theme = '<?=jqxStyle?>';
});
</script>
</head>
<body>
<?php include("include_top.php"); ?>
<div class="admin-panel">
  <?php include("include_menu.php"); ?><!--slidebar end-->
  <div class="main set_page_h page_shadow">
   <?php $obj_drawpage->drawPageWelcome($page_subtitle); ?>
   <?php $obj_drawtable->drawTable($obj_banner->result_data); ?>
   <?php include("include_footer.php"); ?>
  </div><!--main end-->
</div><!--admin-panel end-->
</body>
</html>