<?php
class mysqlExec extends cloud_mysql {
	private $requestData;
	private $TableFieldsType;
	private $update_str;
	
	//登入
	public function login($type, $request_value) {
		global $main_str, $table_name_admin;
		
		switch($main_str) {
			case "admin":
				$this->TableFieldsType = array("login_account"=>"text", "login_pw"=>"text", "key_c"=>"text", "remember_ac"=>"int");
				$login_account = strtolower($login_account);
				break;
		}
		//檢查傳送參數
		$this->checkRequestValue($request_value);
		//特殊參數處理
		switch($main_str) {
			case "admin":
				$this->requestData['login_account'] = strtolower($this->requestData['login_account']);
				$url_to = 'login.php?login_account='.urlencode($this->requestData['login_account']);
				
				//check check_code
				if(strtoupper($this->requestData['key_c']) != $_SESSION['s_checksum']) {
					js_a_l('驗證碼錯誤', $url_to);exit;
				}
				if(!ereg ("^([a-zA-z]){1}([0-9a-zA-z]){2,}$", $this->requestData['login_account'])){
					js_a_l('資料錯誤: 帳號只能由英文、數字組合，且開頭需為英文字母', $url_to);exit;
				}
				//檢查 Password 是否為英文、數字結合
				if($login_pw && !ereg ("^([0-9a-zA-z]){1,}$", $this->requestData['login_pw'])) {
					js_a_l('資料錯誤: 密碼含有不合法字元', $url_to);exit;
				}
				if($remember_ac==1) {
					setcookie("my_account", $this->requestData['login_account']);	
				}
				$this->requestData['login_pw'] = encrypt(Mcrypt_Key_Admin, $this->requestData['login_pw']);
				/*if ($img->check($key_c) == false) {
				  // the code was incorrect
				  // you should handle the error so that the form processor doesn't continue
				 
				  // or you can use the following code if there is no validation or you do not know how
				  js_a_l('驗證碼錯誤', 'login.php?login_account='.$login_account);exit;
				}*/
				$query  = "select * from $table_name_admin where account='".$this->requestData['login_account']."' And password='".$this->requestData['login_pw']."'";
				$this->run_mysql_list($query);
				if ($this->obj_all!=0) {
					$admin = $this->result_data[0];
					
					if($admin['pub']!=1) {
						js_a_l('您已被停權，如有任何問題請洽系統管理者', $url_to);exit;
					}
					//recorde login time
					$query = "update $table_name_admin set login_time=now() where account='".$this->requestData['login_account']."'";
					$this->run_mysql($query);
					$_SESSION[Login_System_User]['account'] = $admin['account'];
					$_SESSION[Login_System_User]['name']    = $admin['name'];
					$_SESSION[Login_System_User]['lv']      = $admin['lv'];
					$_SESSION[Login_System_User]['lang']    = 'tw';
					$_SESSION['my_action_time']             = date("U");
					
					js_a_l('','banner.php');exit;
				}else {
					js_a_l('錯誤：請重新檢查您的帳號密碼', $url_to);exit;
				}
				break;
		}
	}
	//新增/修改
	public function updateInit($type, $request_value) {	
		global $main_str;

		switch($main_str) {

			case 'pressimg':					//AboutUs
				$this->TableFieldsType = array("id"=>"int", "file1"=>"text");
				break;
				
			case 'aboutus':					//AboutUs
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "content"=>"content");
				break;
				
			case 'contactus':				//AboutUs
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "content1"=>"content", "content2"=>"content");
				break;				

			case 'faq_category':			//AboutUs
				$this->TableFieldsType = array("id"=>"int", "content"=>"content");
				break;
			case 'faq':	//主題分享管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "title"=>"text", "content"=>"content", "sort"=>"int");
				break;

			case 'madeofnz_category':			//AboutUs
				$this->TableFieldsType = array("id"=>"int", "content"=>"content");
				break;
				

			case 'proj2_categoryimg':			//AboutUs
				$this->TableFieldsType = array("id"=>"int", "file1"=>"text", "alt"=>"text");
				break;
								
			case 'madeofnz':	//主題分享管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "title"=>"text", "content"=>"content", "sort"=>"int");
				break;
							
			case 'pages_category':	//頁面類別管理
			case 'news_category':	//文章類別管理
			case 'news2_category':	//主題分享類別管理
						
			case 'country_category':	//國家管理
				$this->TableFieldsType = array("id"=>"int", "prev"=>"text", "name"=>"text", "lv"=>"int", "sort"=>"int");
				break;

			case 'proj_category':		//專案類別管理
				$this->TableFieldsType = array("id"=>"int", "prev"=>"text", "name"=>"text", "name2"=>"text", "lv"=>"int", "sort"=>"int", "file1"=>"text", "colorcode"=>"text", "colorcode2"=>"text");
				break;				

			case 'proj2_category':		//專案類別管理
				$this->TableFieldsType = array("id"=>"int", "prev"=>"text", "name"=>"text", "lv"=>"int", "sort"=>"int", "file1"=>"text", "file2"=>"text", "alt"=>"text", "colorcode"=>"text", "colorcode2"=>"text");
				break;	

			case 'proj3_category':		//專案類別管理
				$this->TableFieldsType = array("id"=>"int", "prev"=>"text", "name"=>"text", "name2"=>"text", "lv"=>"int", "sort"=>"int", "file1"=>"text", "alt"=>"text", "colorcode"=>"text", "release_date"=>"text", "content"=>"content", "content2"=>"content");
				break;												

			case 'country':				//城市管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "prev"=>"text", "name"=>"text", "lv"=>"int", "sort"=>"int");
				break;				
							
			case 'products_category':	//商品類別管理
				$this->TableFieldsType = array("id"=>"int", "prev"=>"text", "name"=>"text", "lv"=>"int", "sort"=>"int");
				break;
			case 'pages':	//頁面編輯管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "title"=>"text", "file1"=>"text", "content"=>"content", "sort"=>"int");
				break;
			case 'banner':	//首頁大圖管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"text", "title"=>"text", "file1"=>"text", "file2"=>"text", "file3"=>"text", "file4"=>"text", "url_to"=>"text", "sort"=>"int", "color_code"=>"text", "slogen"=>"content", "alt"=>"text");
				break;

			case 'banner2':	//首頁右側廣告管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"text", "title"=>"text", "file1"=>"text", "url_to"=>"text", "sort"=>"int");
				break;
				
			case 'faq_category':		//文章管理								
				$this->TableFieldsType = array("id"=>"int", "content"=>"content");
				break;			
			case 'news':	//文章管理
			case 'news2':	//主題分享管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "news_date"=>"text", "file1"=>"text", "title"=>"text", "content"=>"content");
				break;
				
			case 'teacher':	//教練陣容管理
				$this->TableFieldsType = array("id"=>"int", "name"=>"text", "file1"=>"text", "content"=>"content", "sort"=>"int");
				break;
			case 'album':	//相簿管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "title"=>"text", "title2"=>"text", "content"=>"content", "content2"=>"content", "content3"=>"content", "space_info"=>"text", "locate"=>"text", "area"=>"text", "material"=>"text", "file1"=>"text", "alt"=>"text", "colorcode"=>"text", "colorcode2"=>"text", "sort"=>"int");
				break;
			case 'album2':	//相簿管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "title"=>"text", "title2"=>"text", "period"=>"text", "file1"=>"text", "file2"=>"text", "file3"=>"text", "file1_alt"=>"text", "file2_alt"=>"text", "alt"=>"text", "colorcode2"=>"text", "sort"=>"int");
				break;
			case 'album3':	//相簿管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "name"=>"content", "file1"=>"text", "content"=>"content", "sort"=>"int");
				break;
			case 'products':	//商品資料管理
				$this->TableFieldsType = array("id"=>"int", "category"=>"int", "name"=>"text", "sn"=>"text", "file1"=>"text", "type"=>"text", "material"=>"text", "price"=>"int", "content"=>"content", "remark"=>"text", "sort"=>"int");
				break;
			case 'orderlist':	//訂單資料管理
				$this->TableFieldsType = array("id"=>"text", "order_name"=>"text", "order_email"=>"email", "order_phone"=>"text", "order_mobile"=>"text", "order_zipcode"=>"text", "order_county"=>"text", "order_area"=>"text", "order_address"=>"text", "cart_price"=>"int", "total_price"=>"int", "cart_type"=>"int", "pay_type"=>"int", "remark"=>"text");
				break;
			case 'links':	//相關連結管理
				$this->TableFieldsType = array("id"=>"int", "title"=>"text", "url_to"=>"text", "sort"=>"int");
				break;
			case 'stores':	//商家資訊管理
				$this->TableFieldsType = array("id"=>"int", "name"=>"text", "phone"=>"text", "mobile"=>"text", "email"=>"email", "zipcode"=>"text", "county"=>"text", "area"=>"text", "address"=>"text");
				break;
			case 'download':	//檔案下載管理
				$this->TableFieldsType = array("id"=>"int", "title"=>"text", "file1"=>"text", "content"=>"text", "sort"=>"int");	
				break;
			//=====================================
			case 'member':	//會員資料管理
				$this->TableFieldsType = array("id"=>"int", "account"=>"text", "password"=>"text", "password_check"=>"text", "name"=>"text", "phone"=>"text", "mobile"=>"text", "email"=>"email", "zipcode"=>"text", "county"=>"text", "area"=>"text", "address"=>"text");
				break;
			case 'forum_reply':	//討論區回覆留言管理
				$this->TableFieldsType = array("forum_id"=>"int", "content"=>"text");
				break;
			case 'edm':	//EDM 管理
				$this->TableFieldsType = array("id"=>"int", "edm_date"=>"text", "title"=>"text", "content"=>"content");
				break;
			//=====================================
			case 'admin':	//帳號管理
				$this->TableFieldsType = array("id"=>"int", "account"=>"text", "password"=>"text", "password_confirm"=>"text", "password_check"=>"text", "name"=>"text", "lv"=>"text");
				break;
			case 'system_set':	//網站設定管理
				$this->TableFieldsType = array("id"=>"int", "company"=>"text", "company_boss"=>"text", "company_email"=>"text", "company_phone"=>"text", "company_mobile"=>"text", "company_fax"=>"text", "company_zipcode"=>"text", "company_county"=>"text", "company_area"=>"text", "company_address"=>"text", "html_title"=>"text", "keywords"=>"text", "description"=>"text");
				break;
		}
		
		//檢查傳送參數
		$this->checkRequestValue($request_value);
		//特殊參數處理
		$this->checkRequestValue2();

		//後台
		if($type==1) {
			if(!$this->requestData['id']) {
				$result = $this->mysqlInsert();
			}elseif($this->requestData['id']) {
				$result = $this->mysqlUpdate();
			}
			//特殊處理3(需把資料儲存到資料庫方可執行之動作)
			$this->checkRequestValue3();
		}
		return $result;
	}	
	//檢查傳送參數
	private function checkRequestValue($request_value) {		
		if(count($request_value)>0) {
			foreach($request_value as $key => $value) {
				$this->requestData[$key] = format_data($value, $this->TableFieldsType[$key]);
				$this->requestData[$key] = $this->mysqli->real_escape_string($this->requestData[$key]);
			}
		}	
	}
	//特殊參數處理
	private function checkRequestValue2() {
		global $main_str;
		$table_name = Proj_Name."_".$main_str;
		
		switch($main_str) {
			case "admin":	
				$this->requestData['password_confirm'] = encrypt(Mcrypt_Key_Admin, $this->requestData['password_confirm']);
				if(!$this->requestData['id'])
					$url_to = $main_str.'_handle.php?account='.$this->requestData['account'].'&name='.$this->requestData['name'].'&lv='.$this->requestData['lv'];
				else
					$url_to = 'back';
				//檢查帳號是否重複
				if(!$this->requestData['id']) {
					$query  = "select account from $table_name where account='".$this->requestData['account']."'";
					$this->run_mysql_list($query);
					if($this->obj_all!=0) {
						js_a_l('資料錯誤: 此帳號已經被註冊過了', $url_to);exit;
					}
				}
				//檢查密碼是否輸入正確
				if($this->requestData['id']) {
					$query = "select id from $table_name where account='".$this->requestData['account']."' and password='".$this->requestData['password_confirm']."'";
					$this->run_mysql_list($query);
					if($this->obj_all==0) {
						js_a_l('密碼錯誤，請重新檢查密碼', $url_to);exit;
					}
				}
				//檢查 account 是否為英文、數字結合，且開頭為英文字母
				if(!ereg ("^([a-zA-z]){1}([0-9a-zA-z]){2,}$", $this->requestData['account'])){
					js_a_l('資料錯誤: 帳號只能由英文、數字組合，且開頭需為英文字母', $url_to);exit;
				}
				//檢查 Password 是否為英文、數字結合
				if($this->requestData['password'] && !ereg ("^([0-9a-zA-z]){1,}$", $this->requestData['password'])) {
					js_a_l('資料錯誤: 密碼只能由英文、數字組合', $url_to);exit;
				}
				//檢查是否密碼不同
				if($this->requestData['password'] != $this->requestData['password_check']) {
					js_a_l('資料錯誤: 請重新檢查密碼', $url_to);exit;
				}
				//檢查是否有資料遺漏
				if(!$this->requestData['account']||!$this->requestData['name']) {
					js_a_l('資料錯誤:請重新檢查是否有欄位遺漏', $url_to);exit;
				}
				//修改密碼
				if($this->requestData['account']) {
					if($this->requestData['password']) {
						$this->requestData['password'] = encrypt(Mcrypt_Key_Admin, $this->requestData['password']);
						$this->update_str .= " password='".$this->requestData['password']."',";	
					}
					if($this->requestData['lv']) {
						$this->update_str .= " lv='".$this->requestData['lv']."',";	
					}
				}else {
					$this->requestData['password']       = encrypt(Mcrypt_Key_Admin, $this->requestData['password']);
					$this->requestData['password_check'] = encrypt(Mcrypt_Key_Admin, $this->requestData['password_check']);
				}
				break;
			case "member":	
				if(!$this->requestData['id'])
					$url_to = $main_str.'_handle.php?account='.$this->requestData['account'].'&name='.$this->requestData['name'].'&id_number='.$this->requestData['id_number'].'&sex='.$this->requestData['sex'].'&birthday='.$this->requestData['birthday'].'&phone='.$this->requestData['phone'].'&mobile='.$this->requestData['mobile'].'&email='.$this->requestData['email'].'&county='.$this->requestData['county'].'&area='.$this->requestData['area'].'&zipcode='.$this->requestData['zipcode'].'&address='.$this->requestData['address'];
				else
					$url_to = 'back';
				//檢查帳號是否重複
				if(!$this->requestData['id']) {
					$query  = "select account from $table_name where account='".$this->requestData['account']."'";
					$this->run_mysql_list($query);
					if($this->obj_all!=0) {
						js_a_l('資料錯誤: 此帳號已經被註冊過了', $url_to);exit;
					}
				}
				//檢查 account 是否為英文、數字結合，且開頭為英文字母
				if(!ereg ("^([a-zA-z]){1}([0-9a-zA-z]){2,}$", $this->requestData['account'])){
					js_a_l('資料錯誤: 帳號只能由英文、數字組合，且開頭需為英文字母', $url_to);exit;
				}
				//檢查 Password 是否為英文、數字結合
				if(!ereg ("^([0-9a-zA-z!@#$%^&*{}]){1,}$", $this->requestData['password'])) {
					js_a_l('資料錯誤: 密碼只能由英文、數字組合', $url_to);exit;
				}
				//檢查是否密碼不同
				if($this->requestData['password'] != $this->requestData['password_check']) {
					js_a_l('資料錯誤: 請重新檢查密碼', $url_to);exit;
				}
				//檢查是否有資料遺漏
				if(!$this->requestData['account']||!$this->requestData['password']||!$this->requestData['name']) {
					js_a_l('資料錯誤:請重新檢查是否有欄位遺漏', $url_to);exit;
				}
				$this->requestData['password'] = encrypt(Mcrypt_Key_Member, $this->requestData['password']);
				break;
			case "pages_category":	
			case "news_category":	
			case "products_category":
				//類別層級
				$this->requestData['prev'] = explode('|', $this->requestData['prev']);
				$this->requestData['lv']   = $this->requestData['prev'][1] + 1;
				$this->requestData['prev'] = $this->requestData['prev'][0];
				break;
			case "orderlist":
				$url_to = 'back';
				//檢查是否有資料遺漏
				if(!$this->requestData['order_name']||!$this->requestData['order_email']||!$this->requestData['order_mobile']||!$this->requestData['total_price']) {
					js_a_l('資料錯誤:請重新檢查是否有欄位遺漏', $url_to);exit;
				}
				break;
		}
	}
	//特殊處理3(需把資料儲存到資料庫方可執行之動作)
	private function checkRequestValue3() {
		global $main_str;
		$table_name = Proj_Name."_".$main_str;
		$obj_image  = new files();	
		
		switch($main_str) {
			case "album":	
				//開啟相簿資料夾
				if(!$this->requestData['id']) {
					$query = "select id from $table_name order by id desc limit 0, 1";	
					$data  = $this->run_mysql_out($query);
				}
				if(!is_dir(Root_Path.$main_str.'_photos/'.$data['id'])) {
					$obj_image->add_dir(Root_Path.$main_str.'_photos/'.$data['id']);
				}
				break;
		}
	}
	//Insert
	private function mysqlInsert() {
		global $main_str;
		$table_name = Proj_Name."_".$main_str;
		
		switch($main_str) {
			case "admin":	
				$query = "insert into $table_name(";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id' && $key!='password_confirm' && $key!='password_check')
						$query .= $key.", ";
				}
				$query .= "pub, create_time, edit_time) values(";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id' && $key!='password_confirm' && $key!='password_check')
						$query .= "'".$this->requestData[$key]."', ";
				}
				$query .= "1, now(), now())";
				break;
			case "member":	
				$query = "insert into $table_name(";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id' && $key!='password_check')
						$query .= $key.", ";
				}
				$query .= "pub_by_admin, pub_by_user, create_time, edit_time) values(";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id' && $key!='password_check')
						$query .= "'".$this->requestData[$key]."', ";
				}
				$query .= "1, 1, now(), now())";
				break;
			case "products":	
				$query = "insert into $table_name(lang, ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= $key.", ";
				}
				$query .= "pub, push, hit_counts, create_time, edit_time) values('".$_SESSION[Login_System_User]['lang']."', ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= "'".$this->requestData[$key]."', ";
				}
				$query .= "1, 0, 0, now(), now())";
				break;
			case "orderlist":	
				$query = "insert into $table_name(";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= $key.", ";
				}
				$query .= "pay_state, orderlist_state, order_time) values(";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= "'".$this->requestData[$key]."', ";
				}
				$query .= "0, 0, now())";
				break;
			case "forum_reply":	
				$query = "insert into $table_name(memberIDkey, ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= $key.", ";
				}
				$query .= "pub, create_time, edit_time) values(0, ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= "'".$this->requestData[$key]."', ";
				}
				$query .= "1, now(), now())";
				break;
			case "system_set":	
				$query = "insert into $table_name(lang, ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= $key.", ";
				}
				$query .= "create_time, edit_time) values('".$_SESSION[Login_System_User]['lang']."', ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= "'".$this->requestData[$key]."', ";
				}
				$query .= "now(), now())";
				break;
			default:
				$query = "insert into $table_name(lang, ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= $key.", ";
				}
				$query .= "pub, create_time, edit_time) values('".$_SESSION[Login_System_User]['lang']."', ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= "'".$this->requestData[$key]."', ";
				}
				$query .= "1, now(), now())";
				break;
		}
		$this->run_mysql($query);
		$_SESSION['insert_id'] = $this->mysqli->insert_id;
				
		return $this->result;
	}
	//Update
	private function mysqlUpdate() {
		global $main_str;
		$table_name = Proj_Name."_".$main_str;
		
		switch($main_str) {
			case "admin":
				$query = "update $table_name set ".$this->update_str." name='".$this->requestData['name']."', edit_time=now() where id='".$this->requestData['id']."'";echo $query;
				break;
			case "member":	
				$query = "update $table_name set ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id' && $key!='password_check')
						$query .= $key."='".$this->requestData[$key]."', ";
				}
				$query .= "edit_time=now() where id='".$this->requestData['id']."'";
				break;
			default:
				$query = "update $table_name set ";
				foreach($this->TableFieldsType as $key => $value) {
					if($key!='id')
						$query .= $key."='".$this->requestData[$key]."', ";
				}
				$query .= "edit_time=now() where id='".$this->requestData['id']."'";
				break;
		}
	
		$this->run_mysql($query);
		return $this->result;
	}
	
	//刪除
	public function deleteInit($id) {
		global $main_str;
		$id = format_data($id, 'text');
		
		$this->checkDelObject($id);	//刪除特殊處理
		$result = $this->mysqlDel($id);	//刪除
		
		if($result) {
			js_a_l('刪除成功', 'back');exit;
		}else {
			js_a_l('刪除失敗，請重新再試一次', 'back');exit;	
		}
		return $result;
	}
	//刪除特殊處理
	private function checkDelObject($id) {
		global $main_str;
		$table_name = Proj_Name."_".$main_str;	
		$obj_image  = new files();	
		
		switch($main_str) {
			case "album":
				//delete photos
				$query = "select file1 from ".$table_name."_photos where album_id='".$id."'";
				$this->run_mysql_list($query);
				foreach($this->result_data as $i => $photo) {
					if(is_file(Root_Path.$main_str.'_photos/'.$id.'/'.$photo['file1'])) {
						$obj_image->del_file(Root_Path.$main_str.'_photos/'.$id.'/'.$photo['file1']); 
					}
				}
				$query = "delete from ".$table_name."_photos where album_id='".$id."'";	
				$this->run_mysql($query);
				//刪除資料夾
				if(is_dir(Root_Path.$main_str.'_photos/'.$id))
					$obj_image->del_dir(Root_Path.$main_str.'_photos/'.$id);
				break;
			case "banner":
			case "banner2":			
			case "download":
			case "teacher":
			case "news2":
			case "pages":
				$query = "select file1 from $table_name where id='".$id."'";
				$data  = $this->run_mysql_out($query);
				if($data['file1']) {
					$obj_image->del_file(Root_Path.$main_str.'/'.$data['file1']);
				}
				break;
			case "products":
				//刪除圖片
				$query = "select file1 from $table_name where id='".$id."'";
				$prod  = $this->run_mysql_out($query);
				if($prod['file1']) {
					$obj_image->del_file(Root_Path.$main_str.'/thumb/'.$prod['file1']);
					$obj_image->del_file(Root_Path.$main_str.'/'.$prod['file1']);
				}
				break;
			case "forum":
				//delete forum_reply
				$query = "delete from ".$table_name."_reply where forum_id='".$id."'";
				$this->run_mysql($query);
				break;
			case "pages_category":
				global $table_name_pages;
				//檢查其下是否有類別或是資料
				$query = "select id from ".$table_name_pages."_category where prev='".$id."'";
				$this->run_mysql_list($query);
				if($this->obj_all > 0) {
					js_a_l('該類別下尚有次類別，禁止刪除', 'back');exit;	
				}
				$query = "select id from ".$table_name_pages." where category='".$id."'";
				$this->run_mysql_list($query);
				if($this->obj_all > 0) {
					js_a_l('該類別下尚有資料，禁止刪除', 'back');exit;	
				}
				break;
			case "news_category":
				global $table_name_news;
				//檢查其下是否有類別或是資料
				$query = "select id from ".$table_name_news."_category where prev='".$id."'";
				$this->run_mysql_list($query);
				if($this->obj_all > 0) {
					js_a_l('該類別下尚有次類別，禁止刪除', 'back');exit;	
				}
				$query = "select id from ".$table_name_news." where category='".$id."'";
				$this->run_mysql_list($query);
				if($this->obj_all > 0) {
					js_a_l('該類別下尚有資料，禁止刪除', 'back');exit;	
				}
				break;
			case "faq_category":
				global $table_name_faq;
				//檢查其下是否有類別或是資料
				$query = "select id from ".$table_name_faq."_category where prev='".$id."'";
				$this->run_mysql_list($query);
				if($this->obj_all > 0) {
					js_a_l('該類別下尚有次類別，禁止刪除', 'back');exit;	
				}
				$query = "select id from ".$table_name_faq." where category='".$id."'";
				$this->run_mysql_list($query);
				if($this->obj_all > 0) {
					js_a_l('該類別下尚有資料，禁止刪除', 'back');exit;	
				}
				break;				
			case "products_category":
				global $table_name_prod;
				//檢查其下是否有類別或是資料
				$query = "select id from ".$table_name_prod."_category where prev='".$id."'";
				$this->run_mysql_list($query);
				if($this->obj_all > 0) {
					js_a_l('該類別下尚有次類別，禁止刪除', 'back');exit;	
				}
				$query = "select id from ".$table_name_prod." where category='".$id."'";
				$this->run_mysql_list($query);
				if($this->obj_all > 0) {
					js_a_l('該類別下尚有資料，禁止刪除', 'back');exit;	
				}
				break;
		}
	}
	//Delete
	private function mysqlDel($id) {
		global $main_str;
		$table_name = Proj_Name."_".$main_str;			
		
		switch($main_str) {
			case "orderlist":
				$query = "update $table_name set pub=0 where id='".$id."'";
				break;
			default:
				$query = "delete from $table_name where id='".$id."'";
				break;
		}
		$this->run_mysql($query);
		return $this->result;
	}
	
	//批次修改狀態
	public function batchUpdate($row_name, $row_value, $IDlist) {
		global $main_str, $page_go, $my_query_string;
		$table_name = Proj_Name."_".$main_str;
		
		$row_name  = format_data($row_name, 'text');
		$row_value = format_data($row_value, 'text');
		if(count($IDlist)>0) {
			foreach($IDlist as $value)	{
				$value     = format_data($value, 'text');
				$query = "update $table_name set ".$row_name."='".$row_value."' where id='$value'";
				$this->run_mysql($query);
			}
		}	
		js_a_l('批次資料更新完成', $_SERVER['PHP_SELF'].'?page_go='.$page_go.$my_query_string);exit;
	}
	//批次刪除
	public function batchDelete($IDlist) {
		global $main_str;
		$table_name = Proj_Name."_".$main_str;
		
		if(count($IDlist)>0) {
			foreach($IDlist as $value)	{
				$value = format_data($value, 'text');
				$this->checkDelObject($value);	//刪除特殊處理
				$result = $this->mysqlDel($value);	//刪除
			}
		}
		js_a_l('批次資料刪除完成', 'back');exit;
	}
} 
$obj_mysqlExec = new mysqlExec();
?>