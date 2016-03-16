<?php
header("content-type:application/json;charset=utf-8");
require_once('set.php');

$main_str   = 'orderlist';
$table_name = Proj_Name.'_'.$main_str;
$obj_order  = new mysql_page();
$obj_order_d= new mysql_page();	
$data       = array();

if($action=='change_row') {	//update
	$data_id   = format_data($data_id, 'text');
	$row_name  = format_data($row_name, 'text');
	$row_value = format_data($row_value, 'text');
	$query = "update $table_name set ".$row_name."='".$row_value."' where id='$data_id'";
	$obj_order->run_mysql($query);
	if($obj_order->result) {
		echo 'succeed';	
	}else {
		echo 'error';	
	}exit;
}elseif($action=='detail_list') {
	$order_id = format_data($order_id, 'text');
	//detail list
	$query = "select * from ".$table_name."_detail where order_id='$order_id' order by id";
	$obj_order_d->run_mysql_list($query);
	foreach($obj_order_d->result_data as $i => $detail){
		if($detail) {
			$row['detail_id']	     = $detail['id'];
			$row['prod_id']          = $detail['prod_id'];
			$row['prod_name']	     = $detail['prod_name'];
			$row['prod_num']	     = $detail['prod_num'];
			$row['prod_price']	     = number_format($detail['prod_price']);
			$row['prod_total_price'] = number_format($detail['prod_num']*$detail['prod_price']);
			$row['remark']	         = $detail['remark'];
			array_push($data, $row);
		}
	}
	echo "{\"data\":" .json_encode($data). "}";exit;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
</body>
</html>