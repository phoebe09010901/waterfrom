<?php
header("content-type:text/html;charset=utf-8");
include('set.php');

$main_str   = 'orderlist';
$table_name = Proj_Name.'_'.$main_str;	
$obj_order  = new mysql_page();
$data       = array();
$temp_data  = array();

if($type=='year_chart') {
	for($i=1; $i<=12; $i++) {
		while(strlen($i)<2)
			$i = '0'.$i;	
		//total_price data
		$query = "select sum(total_price) as total_price from $table_name where order_time like '".$show_year."-".$i."-%'";
		$order = $obj_order->run_mysql_out($query);
		$row['show_mon']        = $i.'月';
		$row['total_price_mon'] = round($order['total_price'], 0);	//該月總營業額
		array_push($data, $row);
	}
}elseif($type=='year_DataTable') {
	$total_price_year = 0;
	$row['show_text'] = $show_year.'年';
	for($i=1; $i<=12; $i++) {
		while(strlen($i)<2)
			$i = '0'.$i;	
		//total_price data
		$query = "select sum(total_price) as total_price from $table_name where order_time like '".$show_year."-".$i."-%'";
		$order = $obj_order->run_mysql_out($query);
		$row['mon'.$i] = number_format(round($order['total_price'], 0));	//該月總營業額
		$total_price_year = $total_price_year + round($order['total_price'], 0);
	}
	$row['total_year'] = number_format($total_price_year);
	array_push($data, $row);	
}elseif($type=='month_chart') {
	for($day=1; $day<=31; $day++) {
		while(strlen($day)<2)
			$day = '0'.$day;
		$row['show_days'] = $day;
		//存入各日每月的營業額
		for($mon=1; $mon<=12; $mon++) {
			while(strlen($mon)<2)
				$mon = '0'.$mon;	
			//total_price data
			$query = "select sum(total_price) as total_price from $table_name where order_time like '".$show_year."-".$mon."-".$day." %'";
			$order = $obj_order->run_mysql_out($query);
				
			$row['total_price_'.$mon] = round($order['total_price'], 0);	//該日總營業額
		}
		array_push($data, $row);
	}
}elseif($type=='month_chart2') {
	for($day=1; $day<=31; $day++) {
		while(strlen($day)<2)
			$day = '0'.$day;
		$row['show_days'] = $day;
		//存入各日每月的營業額
		//total_price data
		$query = "select sum(total_price) as total_price from $table_name where order_time like '".$show_year."-".$show_mon."-".$day." %'";
		$order = $obj_order->run_mysql_out($query);
				
		$row['total_price_'.$show_mon] = round($order['total_price'], 0);	//該日總營業額
		array_push($data, $row);
	}
}elseif($type=='month_DataTable') {
	for($mon=1; $mon<=12; $mon++) {
		$total_price_month = 0;
		while(strlen($mon)<2)
			$mon = '0'.$mon;	
		$row['month_id'] = $mon;
		$row['show_text'] = $mon.'月';
		$row['show_chart'] = 0;
		for($day=1; $day<=31; $day++) {
			while(strlen($day)<2)
				$day = '0'.$day;
			//total_price data
			$query = "select sum(total_price) as total_price from $table_name where order_time like '".$show_year."-".$mon."-".$day." %'";
			$order = $obj_order->run_mysql_out($query);
			$row['day'.$day] = number_format(round($order['total_price'], 0));	//該日總營業額
			$total_price_month = $total_price_month + round($order['total_price'], 0);
		}
		$row['total_mon'] = number_format($total_price_month);
		array_push($data, $row);
	}	
}
echo "{\"data\":" .json_encode($data). "}";exit;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
</body>
</html>