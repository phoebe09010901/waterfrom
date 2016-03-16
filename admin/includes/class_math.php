<?php
class math {	
	public out_num;
	//construct
	public function __construct() {	
	}
	
	//percent(分子, 分母, 位數)
	public function show_percent($num, $deno, $digit=2) {
		if ($deno == 0){
			$this->out_num = 0;
		}elseif ($deno != 0) {
			$this->out_num = $num / $deno;
			$this->out_num = round($this->out_num * 100, $digit);
		}
		return $this->out_num;	
	}	
}
?>