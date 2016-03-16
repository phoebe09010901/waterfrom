<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'function_page.php');

$main_str   = 'orderlist';
$table_name = Proj_Name.'_'.$main_str;	
$obj_order  = new mysql_page();

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
$query = "select id, member_account, order_name, order_email, order_mobile, total_price, cart_type, pay_type, pay_state, orderlist_state, order_time from $table_name where pub=1 $where_str order by order_time desc";	
$obj_order->count_page($query, $page_go, $page_num);
$page_all = $obj_order->page_all;
$obj_all  = $obj_order->obj_all;
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>
<!-- window -->
<script type="text/javascript" src="../jqwidgets/jqxwindow.js"></script>
<!-- datatable -->
<script type="text/javascript" src="../jqwidgets/jqxdatatable.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	var theme = '<?=jqxStyle?>';
	
	// create jqxWindow.
    $("#order_detail_window").jqxWindow({ resizable: false, autoOpen: false, width: 550, height: 300, theme: theme });
});
function real_orderlist_detail(order_id) {
	$("#order_detail_window").jqxWindow('open');
	$("#order_detail_title").html('訂單編號: '+order_id);
	
	var theme = 'shinyblack';
	//orderlist detail grid
	var url = "<?=$main_str?>_data.php?action=detail_list&order_id="+order_id;
	// prepare the data
	var source1 =
	{
		datatype: "json",
		datafields: [
			{ name: 'detail_id' },
			{ name: 'prod_id' },
			{ name: 'prod_name' },
			{ name: 'prod_num' },
			{ name: 'prod_price' },
			{ name: 'prod_total_price' },
			{ name: 'remark' }
		],
		id: 'detail_id',
		url: url,
		root: 'data'
	};
	var dataAdapter1 = new $.jqx.dataAdapter(source1);
	
	$("#<?=$main_str?>_detail_grid").jqxDataTable(
	{
		width: 530,
		height: 250,
		theme: theme,
		source: dataAdapter1,
		sortable: true,
		pageable: false,
		editable: true,
        pagerButtonsCount: <?=$page_num?>,
		columns: [
		  { text: '商品名稱', dataField: 'prod_name', width: 230, align: 'center', cellsalign: 'center', editable: false },
		  { text: '商品數量', dataField: 'prod_num', width: 60, align: 'center', cellsalign: 'center', editable: false },
		  { text: '商品單價', dataField: 'prod_price', width: 120, align: 'center', cellsalign: 'center', editable: false },
		  { text: '小計', dataField: 'prod_total_price', width: 120, align: 'center', cellsalign: 'center', editable: false }
		 ]
	});
}
</script>
</head>
<body>
<div id="order_detail_window">
	<div><span id="order_detail_title">訂單資料</span></div>
    <div style="overflow: hidden;">
        <div id="<?=$main_str?>_detail_grid" style="margin-top:5px"></div>
	</div>
</div>
<?php include("include_top.php"); ?>
<div class="admin-panel">
  <?php include("include_menu.php"); ?><!--slidebar end-->
  <div class="main set_page_h page_shadow">
   <?php $obj_drawpage->drawPageWelcome($page_subtitle); ?>
   <?php $obj_drawtable->drawTable($obj_order->result_data); ?>
   <?php include("include_footer.php"); ?>
  </div><!--main end-->
</div><!--admin-panel end-->
</body>
</html>