<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'function_page.php');

$main_str   = 'album3';
$table_name = Proj_Name.'_'.$main_str;	
$obj_album  = new mysql_page();	

$page_num   = 10; //設定每頁顯示數目
$page_go    = ($page_go)?format_data($page_go, 'int'):1;

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

$category = $_REQUEST['category'];
$query = "select id, name, file1, pub, sort, create_time, edit_time from $table_name where lang='".$_SESSION[Login_System_User]['lang']."' and category = '$category' $where_str order by sort desc";	
$obj_album->count_page($query, $page_go, $page_num);
$page_all = $obj_album->page_all;
$obj_all  = $obj_album->obj_all;

$page_subtitle = '';

if($category!=0) {		
	$tmp_prev = $category;
	do{
		$query = "select id, name, prev, lv from waterfrom_proj3_category where id='".$tmp_prev."'"; 
		$pc = $obj_proj->run_mysql_out($query);
		$page_title = $pc['name'];
		$_SESSION['page_title'] = $page_title;
		$page_subtitle = "<a href=proj3_category.php?category=".$pc['id']."><li class='left'>Issue管理</li></a>".$page_subtitle;
		$tmp_prev = $pc['prev'];
	}while($pc['prev']!=0);
}

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
   <?php $obj_drawtable->drawTable($obj_album->result_data); ?>
   <?php include("include_footer.php"); ?>
  </div><!--main end-->
</div><!--admin-panel end-->
</body>
</html>