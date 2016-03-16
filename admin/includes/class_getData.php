<?php
class getData {	
	public $member;
	public $store;
	public $type;
	public $allowUsePoints;
	public $GetPoints;
	//construct
	public function __construct() {	
		$this->allowUsePoints     = 0;
		$this->GetPoints          = 0;
	}
	
	//會員資料
	public function memberData($memberIDkey) {
		global $table_name_member;
		$obj_member = new mysql_page();
		
		//member data
		$query = "select * from ".$table_name_member." where id='$memberIDkey'";
		$this->member = $obj_member->run_mysql_out($query);
		//member points
		/*$query = "select sum(points)-sum(used_points) as points from ".$table_name_member."_points where memberIDkey='".$member['id']."' and used=0 and pub=1 and (from_date<='".date("Y-m-d")."' and '".date("Y-m-d")."'<=to_date)";
		$points= $obj_member->run_mysql_out($query);
		$member['points'] = ($points['points'])?$points['points']:0;*/
		//等待生效購物金
		/*$query = "select sum(points) as points from ".$table_name_member."_points where memberIDkey='".$member['id']."' and used=0 and pub=1 and '".date("Y-m-d")."'<from_date";
		$points= $obj_member->run_mysql_out($query);
		$member['waiting_points'] = ($points['points'])?$points['points']:0;
		switch($member['lv']) {
		  case 'normal':
			$member['lv_str'] = '【網站會員】';
			break;
		  case 'dragon':
			$member['lv_str'] = '【龍海會員】';
			break;
		}*/
	}
	//會員購物時可使用之購物金
	public function memberusepointsData($agreeUse, $memberIDkey, $total_price) {		
		$this->memberData($memberIDkey);
		if($agreeUse==1) {
			switch($this->member['lv']) {
				case 'normal':	
					$this->allowUsePoints = round($total_price*Max_Points_Normal/100);
					$this->allowUsePoints = ($this->allowUsePoints<=$this->member['points'])?$this->allowUsePoints:$this->member['points'];
					break;
				case 'dragon':	
					$this->allowUsePoints = round($total_price*Max_Points_Dragon/100);
					$this->allowUsePoints = ($this->allowUsePoints<=$this->member['points'])?$this->allowUsePoints:$this->member['points'];
					break;
			}
		}	
	}
	//會員消費獲得購物金
	public function membergetpointsData($memberIDkey, $total_price) {
		$this->memberData($memberIDkey);
		switch($this->member['lv']) {
			case 'normal':	
				$this->GetPoints = round($total_price*Get_Points_Normal/100);
				break;
			case 'dragon':	
				$this->GetPoints = round($total_price*Get_Points_Dragon/100);
				break;
		}
	}
	//會員紅利點數Log
	public function memberpointslogData($memberIDkey, $action, $points) {
		global $table_name_member;
		$obj_member = new mysql_page();
		
		//檢查是否有記錄
		$query = "select id from ".$table_name_member."_points_log where memberIDkey='$memberIDkey' and action='$action' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
		$member = $obj_member->run_mysql_out($query);
		if(!$member) {
			$query = "insert into ".$table_name_member."_points_log(memberIDkey, points, action, year, month, day, create_time) values('$memberIDkey', '$points', '$action', '".date("Y")."', '".date("m")."', '".date("d")."', now())";
			$obj_member->run_mysql($query);
		}else {
			$query = "update ".$table_name_member."_points_log set points=points+".$points." where memberIDkey='$memberIDkey' and action='$action' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";	
			$obj_member->run_mysql($query);
		}
	}
	//商品類別資料
	public function productscategoryData($category) {
		global $table_name_prod;
		$obj_cate = new mysql_page();
		
		$query = "select pc1.id as cateID1, pc1.name as cateName1, pc1.onsale as onsale, pc2.id as cateID2, pc2.name as cateName2, pc3.id as cateID3, pc3.name as cateName3, pc3.file1 as cateFile3, pc3.banner_title as cateBannerTitle3, pc3.url_to as cateUrlto3 from ".$table_name_prod."_category pc1, ".$table_name_prod."_category pc2, ".$table_name_prod."_category pc3 where pc1.id=pc2.prev and pc2.id=pc3.prev and pc3.id='$category'";	
		$this->cate = $obj_cate->run_mysql_out($query);
	}
	//商品資料
	public function productsData($prod_id, $type_id) {
		global $table_name_prod;
		$obj_prod = new mysql_page();
		$obj_type = new mysql_page();
		
		$query = "select id, category, store_id, name, price, file1 from ".$table_name_prod." where id='$prod_id'";
		$this->prod = $obj_prod->run_mysql_out($query);
		$query = "select id, name, stock from ".$table_name_prod."_type where id='$type_id'";
		$this->type = $obj_type->run_mysql_out($query);
	}
	//供應商資料 
	public function storeData($store_id) {
		global $table_name_stores;
		$obj_store = new mysql_page();
		
		$query = "select id, name, cart_price from ".$table_name_stores." where id='$store_id'";	
		$this->store = $obj_store->run_mysql_out($query);
	}
	//瀏覽記錄
	public function member_viewlog($memberIDkey, $prod_id) {
		global $table_name_member;	
		$obj_member = new mysql_page();
		$max_viewlog_num = 50;
		
		//檢查是否有記錄
		$query = "select id from ".$table_name_member."_viewlog where memberIDkey='$memberIDkey' and prod_id='$prod_id'";
		$member = $obj_member->run_mysql_out($query);
		if(!$member) {
			$query = "insert into ".$table_name_member."_viewlog(memberIDkey, prod_id, create_time) values('$memberIDkey', '$prod_id', now())";
			$obj_member->run_mysql($query);
		}else {
			$query = "update ".$table_name_member."_viewlog set create_time=now() where memberIDkey='$memberIDkey' and prod_id='$prod_id'";	
			$obj_member->run_mysql($query);
		}
	}
	//訂單數量記錄
	public function orderlistlogData($action) {
		global $table_name_order;
		$obj_order = new mysql_page();
		
		//檢查是否有記錄
		$query = "select id from ".$table_name_order."_log where action='$action' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
		$obj_order->run_mysql_list($query);	
		if($obj_order->obj_all==0) {
			$query = "insert into ".$table_name_order."_log(order_num, action, year, month, day, create_time) values(1, '$action', '".date("Y")."', '".date("m")."', '".date("d")."', now())";
			$obj_order->run_mysql($query);	
		}else {
			$query = "update ".$table_name_order."_log set order_num=order_num+1 where action='$action' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";	
			$obj_order->run_mysql($query);
		}
	}
	//訂單金額記錄
	public function orderlisttotalpricelogData($total_price, $action) {
		global $table_name_order;
		$obj_order = new mysql_page();
		
		//檢查是否有記錄
		$query = "select id from ".$table_name_order."_total_price_log where action='$action' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
		$obj_order->run_mysql_list($query);	
		if($obj_order->obj_all==0) {
			$query = "insert into ".$table_name_order."_total_price_log(total_price, action, year, month, day, create_time) values('".$total_price."', '$action', '".date("Y")."', '".date("m")."', '".date("d")."', now())";
			$obj_order->run_mysql($query);	
		}else {
			$query = "update ".$table_name_order."_total_price_log set total_price=total_price+".$total_price." where action='$action' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";	
			$obj_member->run_mysql($query);
		}
	}
	//page hits
	public function hit_counts($page_name) {
		global $table_name_order;
		$obj_order = new mysql_page();
		$ip        = get_real_ip();
		
		$query = "insert into ".$table_name_hits."(hit_page, ip, create_time) values('$page_name', '$ip', now())";
		$obj_hits->run_mysql($query);
	}
	//get web content
	public function get_web_info( $web_url ) {		
		$ch = curl_init();
		$timeout = 300;
		curl_setopt ($ch, CURLOPT_URL, $web_url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false);
		$web_info = curl_exec($ch);
		curl_close($ch);
		
		return $web_info;
	}
	//products hit counts
	public function products_hit_counts($prod_id) {
		global $table_name_prod;
		$obj_hits = new mysql_page();
		
		$query = "select id from ".$table_name_prod."_hit_counts where prod_id='$prod_id' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
		$obj_hits->run_mysql_list($query);
		if($obj_hits->obj_all==0) {
			$query = "insert into ".$table_name_prod."_hit_counts(prod_id, hit_counts, year, month, day) values('$prod_id', 1, '".date("Y")."', '".date("m")."', '".date("d")."')";
			$obj_hits->run_mysql($query);
		}else {
			$query = "update ".$table_name_prod."_hit_counts set hit_counts=hit_counts+1 where prod_id='$prod_id' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
			$obj_hits->run_mysql($query);
		}
	}
	//products buy counts
	public function products_buy_counts($prod_id, $prod_type, $prod_num) {
		global $table_name_prod;
		$obj_hits = new mysql_page();
		
		$query = "select id from ".$table_name_prod."_buy_counts where prod_id='$prod_id' and prod_type='$prod_type' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
		$obj_hits->run_mysql_list($query);
		if($obj_hits->obj_all==0) {
			$query = "insert into ".$table_name_prod."_buy_counts(prod_id, prod_type, buy_counts, year, month, day) values('$prod_id', '$prod_type', ".$prod_num.", '".date("Y")."', '".date("m")."', '".date("d")."')";
			$obj_hits->run_mysql($query);
		}else {
			$query = "update ".$table_name_prod."_buy_counts set buy_counts=buy_counts+".$prod_num." where prod_id='$prod_id' and prod_type='$prod_type' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
			$obj_hits->run_mysql($query);
		}
	}
	//products buy total price
	public function products_buy_total_price($prod_id, $prod_type, $prod_price, $prod_num) {
		global $table_name_prod;
		$obj_hits = new mysql_page();
		
		$total_price = round($prod_price * $prod_num);
		$query = "select id from ".$table_name_prod."_buy_total_price where prod_id='$prod_id' and prod_type='$prod_type' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
		$obj_hits->run_mysql_list($query);
		if($obj_hits->obj_all==0) {
			$query = "insert into ".$table_name_prod."_buy_total_price(prod_id, prod_type, total_price, year, month, day) values('$prod_id', '$prod_type', ".$total_price.", '".date("Y")."', '".date("m")."', '".date("d")."')";
			$obj_hits->run_mysql($query);
		}else {
			$query = "update ".$table_name_prod."_buy_total_price set total_price=total_price+".$total_price." where prod_id='$prod_id' and prod_type='$prod_type' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
			$obj_hits->run_mysql($query);
		}
	}
	//products income
	public function products_income($prod_id, $prod_type, $prod_price, $prod_cost, $prod_num) {
		global $table_name_prod;
		$obj_hits   = new mysql_page();
		$obj_income = new mysql_page();
		
		$income = round(($prod_price - $prod_cost) * $prod_num);
		$query = "select id from ".$table_name_prod."_income where prod_id='$prod_id' and prod_type='$prod_type' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
		$obj_income->run_mysql_list($query);
		if($obj_income->obj_all==0) {
			$query = "insert into ".$table_name_prod."_income(prod_id, prod_type, income, year, month, day) values('$prod_id', '$prod_type', ".$income.", '".date("Y")."', '".date("m")."', '".date("d")."')";
			$obj_income->run_mysql($query);
		}else {
			$query = "update ".$table_name_prod."_income set income=income+".$income." where prod_id='$prod_id' and prod_type='$prod_type' and year='".date("Y")."' and month='".date("m")."' and day='".date("d")."'";
			$obj_income->run_mysql($query);
		}
	}
	//products stock
	public function products_stock($action, $prod_type, $prod_num) {
		global $table_name_prod;
		$obj_hits = new mysql_page();
		
		if($action=="buy") {	//購買
			$query = "update ".$table_name_prod."_type set stock=stock-".$prod_num." where id='$prod_type'";	
		}elseif($action=="cancel") {	//退單
			$query = "update ".$table_name_prod."_type set stock=stock+".$prod_num." where id='$prod_type'";	
		}
		$obj_prod->run_mysql($query);
	} 
	//統計 -- 商品瀏覽/購買次數
	public function AnalyzeproductscountsData($prod_id, $prod_type, $search_type, $search_range, $year, $month, $day) {
		global $table_name_prod;
		$obj_prod = new mysql_page();
		
		switch($search_range) {
			case "everyMonth":	
				$where_str = "and year='$year' and month='$month'";
				break;
			case "everySeason":	
				if($month==1)
					$where_str = "and year='$year' and (month='01' or month='02' or month='03')";
				if($month==2)
					$where_str = "and year='$year' and (month='04' or month='05' or month='06')";
				if($month==3)
					$where_str = "and year='$year' and (month='07' or month='08' or month='09')";
				if($month==4)
					$where_str = "and year='$year' and (month='10' or month='11' or month='12')";
				break;
			case "everyDay":	
				$where_str = "and year='$year' and month='$month' and day='$day'";
				break;
		}
		if($search_type=='hit') {
			$query = "select sum(hit_counts) as counts from ".$table_name_prod."_hit_counts where prod_id='$prod_id' $where_str";
			$counts= $obj_prod->run_mysql_out($query);
			echo number_format($counts['counts']);
		}elseif($search_type=='buy_counts') {
			$query = "select sum(buy_counts) as counts from ".$table_name_prod."_buy_counts where prod_id='$prod_id' and prod_type='$prod_type' $where_str";
			$counts= $obj_prod->run_mysql_out($query);
			echo number_format($counts['counts']);
		}elseif($search_type=='buy_total_price') {
			$query = "select sum(total_price) as total_price from ".$table_name_prod."_buy_total_price where prod_id='$prod_id' and prod_type='$prod_type' $where_str";
			$prod  = $obj_prod->run_mysql_out($query);
			echo number_format($prod['total_price']);
		}elseif($search_type=='income') {
			$query = "select sum(income) as income from ".$table_name_prod."_income where prod_id='$prod_id' and prod_type='$prod_type' $where_str";
			$income= $obj_prod->run_mysql_out($query);
			echo number_format($income['income']);
		}
	}
	//統計 -- 訂單
	public function AnalyzeorderlistData($action, $search_type, $search_range, $year, $month, $day) {
		global $table_name_order;
		$obj_order = new mysql_page();
		
		switch($search_range) {
			case "everyMonth":	
				$where_str = "and year='$year' and month='$month'";
				break;
			case "everySeason":	
				if($month==1)
					$where_str = "and year='$year' and (month='01' or month='02' or month='03')";
				if($month==2)
					$where_str = "and year='$year' and (month='04' or month='05' or month='06')";
				if($month==3)
					$where_str = "and year='$year' and (month='07' or month='08' or month='09')";
				if($month==4)
					$where_str = "and year='$year' and (month='10' or month='11' or month='12')";
				break;
			case "everyDay":	
				$where_str = "and year='$year' and month='$month' and day='$day'";
				break;
		}
		if($search_type=="orderlist") {
			$query = "select sum(order_num) as order_num from ".$table_name_order."_log where action='$action' $where_str";
			$order = $obj_order->run_mysql_out($query);
			echo number_format($order['order_num']);
		}elseif($search_type=="orderlist_totalprice") {
			$query = "select sum(total_price) as total_price from ".$table_name_order."_total_price_log where action='$action' $where_str";
			$order = $obj_order->run_mysql_out($query);
			echo number_format($order['total_price']);
		}
	}
	//統計 -- 購物金
	public function AnalyzeorderlistpointsData($action, $search_type, $search_range, $year, $month, $day) {
		global $table_name_prod;
		$obj_prod   = new mysql_page();
		$obj_points = new mysql_page();
		
		switch($search_range) {
			case "everyMonth":	
				$where_str = "and year='$year' and month='$month'";
				break;
			case "everySeason":	
				if($month==1)
					$where_str = "and year='$year' and (month='01' or month='02' or month='03')";
				if($month==2)
					$where_str = "and year='$year' and (month='04' or month='05' or month='06')";
				if($month==3)
					$where_str = "and year='$year' and (month='07' or month='08' or month='09')";
				if($month==4)
					$where_str = "and year='$year' and (month='10' or month='11' or month='12')";
				break;
			case "everyDay":	
				$where_str = "and year='$year' and month='$month' and day='$day'";
				break;
		}
		$query = "select sum(points) as points from ".$table_name_member."_points_log where action='$action' $where_str";
		$points= $obj_points->run_mysql_out($query);
		echo number_format($points['points']);
	}
}
?>