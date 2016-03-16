<?php
class cloud_mysql {
	private $tmp_data, $stmt;
	protected $mysqli;
	public $result, $obj_all, $result_data;
	//construct
	public function __construct() {
		$this->mysqli = @new mysqli(DB_Host, DB_USER, DB_Password, DB_Name);	
		if ($this->mysqli->connect_errno) {
			printf("Connect failed: %s\n", $this->mysqli->connect_error);
			exit();
		}
		$this->mysqli->set_charset("utf8");
		$this->stmt    = '';
		$this->result  = '';
		$this->obj_all = 0;
		$this->result_data = array();
	}
	
	//connect
	public function connect_mysql() {
		$query = "SET NAMES utf8;";
		$this->run_mysql($query);
		$query = "SET CHARACTER_SET_CLIENT=utf8;";
		$this->run_mysql($query);
		$query = "SET CHARACTER_SET_RESULTS=utf8;";
		$this->run_mysql($query);
		$query = "SET CHARACTER_SET_CONNECTION=utf8;";
		$this->run_mysql($query);
	}
	public function run_mysql($query) {	
		if($query) {
			//echo $query.'<br>';
			if($this->result = $this->mysqli->query($query)) {	
				//printf("%s\n", $this->mysqli->info);
				//echo $query.'<br>';
				//echo "Affected rows: " . $this->mysqli->affected_rows.'<br>';
				return $this->result;
			}else {
				echo 'Mysqli執行錯誤：'.$query.'<br>'; 
				echo '　　　錯誤代碼：'.$this->mysqli->errno.'<br>'; 
				echo '　　　錯誤訊息：'.$this->mysqli->error.'<br>'; 
			}
		}
	}
	public function run_mysql_nums($query) {
		$this->result_data = array();
		
		$this->result = $this->run_mysql($query);
		if($this->result){$this->obj_all = $this->result->num_rows;}
		
		$this->result->close;
		$this->mysqli->close;
		
		return $this->obj_all;
	}
	public function run_mysql_list($query) {
		$this->result_data = array();
		
		$this->result = $this->run_mysql($query);
		if($this->result){$this->obj_all = $this->result->num_rows;}
		for($i=0; $i<$this->obj_all; $i++) {
			$tmp_data = $this->result->fetch_array(MYSQLI_ASSOC);
			if($tmp_data) {
				$tmp_data = format_output($tmp_data);	
				array_push($this->result_data, $tmp_data);
			}
		}		
		
		$this->result->close;
		$this->mysqli->close;
		//print_r($this->result_data);exit;
	}
	public function run_mysql_out($query) {
		$this->result = $this->run_mysql($query);
		if($this->result){$this->result_data = $this->result->fetch_array(MYSQLI_ASSOC);}
		$this->result_data = format_output($this->result_data);	
		
		$this->result->close;
		$this->mysqli->close;	
		
		return $this->result_data;
	}
}
class mysql_page extends cloud_mysql {
	public $page_all;
	private $t;
	
	public function count_page($query, $page_go, $page_num) {	
		$this->result_data = array();
		
		$limit_obj_all = 0;
		if($page_num!=0) {
			$this->result = $this->run_mysql($query);
			if($this->result){$this->obj_all = $this->result->num_rows;}	
			//計算總頁數
			$this->page_all = ceil($this->obj_all / $page_num);
			if($this->page_all==0){$this->page_all = 1;}
						
			$t            = ($page_go-1) * $page_num; //設定query limit搜尋起始編號
			$query        = $query." Limit ".$t.",".$page_num."";
			$this->run_mysql_list($query);
		}		
		
		$this->result->close;
		$this->mysqli->close;
	}
} 
$obj_mysql = new cloud_mysql();
$obj_mysql->connect_mysql();
?>