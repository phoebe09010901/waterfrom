<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'function_page.php');

$main_str   = 'contact_form';
$table_name = Proj_Name.'_'.$main_str;	
$obj_cont   = new mysql_page();	

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
	$where_str = "where ".$search_row." like '%".$keywords."%'";	
}
$query = "select id, name, phone, email, state, create_time from $table_name $where_str order by create_time desc";	
$obj_cont->count_page($query, $page_go, $page_num);
$page_all = $obj_cont->page_all;
$obj_all  = $obj_cont->obj_all;
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>
<!-- window -->
<script type="text/javascript" src="../jqwidgets/jqxwindow.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	var theme = '<?=jqxStyle?>';
	// create jqxWindow.
    $("#cont_window").jqxWindow({ resizable: false, autoOpen: false, width: 500, height: 300, theme: theme });
});
function real_cont(cont_id, name) {
	if(cont_id) {
		$("#cont_window").jqxWindow('open');
		$("#cont_title").html('留言者: '+name);
		$("#cont_id").val(cont_id);
		var ajaxurl = "<?=$main_str?>_data.php?action=get_content&cont_id="+cont_id;
		$.ajax({
			url: ajaxurl,
			dataType: 'json',
			success: function(request) {
				$.each(request, function(k, v){
					$.each(v, function(k1, v1){
						if(v1.content)
							$("#<?=$main_str?>_content").html(v1.content);
					})			
				})
			}
		});
	}
}
</script>
</head>
<body>
<div id="cont_window">
	<div><span id="cont_title">留言資料</span></div>
    <div style="overflow: auto;">
        <div id="<?=$main_str?>_content"></div>
	</div>
</div>
<?php include("include_top.php"); ?>
<div class="admin-panel">
  <?php include("include_menu.php"); ?><!--slidebar end-->
  <div class="main set_page_h page_shadow">
   <?php $obj_drawpage->drawPageWelcome($page_subtitle); ?>
   <?php $obj_drawtable->drawTable($obj_cont->result_data); ?>
   <?php include("include_footer.php"); ?>
  </div><!--main end-->
</div><!--admin-panel end-->
</body>
</html>