<?php
class show_data_select {
	private $query;
	private $cate1;
	private $selected_str;
	
	//construct
	function __construct() {	
	}
	
	//Menu 選單用
	public function data_category_menu_reloop($main_str, $treepageName, $prev=0, $category_lv_num=1) {
		$obj_cate1 = new mysql_page();
		
		$query = "select id, name, lv from ".Proj_Name.'_'.$main_str." where lang='".$_SESSION[Login_System_User]['lang']."' and prev='$prev' order by sort desc";
		$obj_cate1->run_mysql_list($query);
		//show menu items
			
		foreach($obj_cate1->result_data as $i => $cate1) {
			if($cate1) {
				if($cate1['lv']!=$category_lv_num)
					$url_page = $main_str.'.php?prev='.$cate1['id'];
				else
					$url_page = $treepageName.'.php?category='.$cate1['id'];
					
				?><li><a href="<?=$url_page?>"><?=stripslashes($cate1['name'])?></a><?php
				if($cate1['lv']!=$category_lv_num){echo '<ul>';}
					$this->data_category_menu_reloop($main_str, $treepageName, $cate1['id'], $category_lv_num);
				if($cate1['lv']!=$category_lv_num){echo '</ul>';}
				?></li><?php
			}
		}
	}
	//類別選擇Parent用
	public function data_category_select_reloop($main_str, $prev_to_cate, $prev, $category_lv_num=1) {
		if($prev_to_cate==0)
			$selected_str = 'selected';
		else
			$selected_str = '';
		?><select name="prev"><option value="0|0" <?=$selected_str?>>-- --</option><?php
		$this->data_category_select_options($main_str, $prev_to_cate, $prev, $category_lv_num);
		?></select><?php
	}
	public function data_category_select_options($main_str, $prev_to_cate, $prev, $category_lv_num) {
		$obj_cate1 = new mysql_page();
		
		$query = "select id, lv, name from ".Proj_Name.'_'.$main_str." where lang='".$_SESSION[Login_System_User]['lang']."' and prev='".$prev_to_cate."' order by sort desc";
		$obj_cate1->run_mysql_list($query);
		foreach($obj_cate1->result_data as $i => $cate1) {
			if($cate1 && $cate1['lv']<$category_lv_num) {
				$space_num = '';
				for($j=0; $j<$cate1['lv']; $j++)
					$space_num .= '　';
				//selected
				if($prev && ($prev==$cate1['id'].'|'.$cate1['lv'] || $prev==$cate1['id']))
					$selected_str = 'selected';
				else
					$selected_str = '';
				if($cate1['lv'] < $category_lv_num) {
					?><option value="<?=$cate1['id']?>|<?=$cate1['lv']?>" <?=$selected_str?>><?=$space_num.stripslashes($cate1['name'])?></option><?php
					$this->data_category_select_options($main_str, $cate1['id'], $prev, $category_lv_num);
				}else {
					?><option value="<?=$cate1['id']?>|<?=$cate1['lv']?>" <?=$selected_str?>><?=$space_num.stripslashes($cate1['name'])?></option><?php
				}
			}
		}
	}
	//節點選擇Category用
	public function data_select_reloop($selectName, $main_str, $level_num, $categoryData, $category) {
		?><select name="<?=$selectName?>"><?php
		$this->data_select_options($main_str, $level_num, $categoryData, $category);
		?></select><?php
	}	
	public function data_select_options($main_str, $level_num, $categoryData, $category) {
		$obj_cate1 = new mysql_page();
		
		$query = "select id, lv, name from ".Proj_Name.'_'.$main_str." where lang='".$_SESSION[Login_System_User]['lang']."' and prev='".$categoryData['id']."' order by sort desc";
		$obj_cate1->run_mysql_list($query);
		foreach($obj_cate1->result_data as $i => $cate1) {
			if($cate1) {
				$space_num = '';
				for($j=0; $j<$cate1['lv']; $j++)
					$space_num .= '　';
				if($cate1['lv'] < $level_num) {
					?><optgroup label="<?=$space_num.$cate1['name']?>"><?=$space_num.stripslashes($cate1['name'])?></optgroup><?php
					$this->data_select_options($main_str, $level_num, $cate1, $category);
				}else {
					?><option value="<?=$cate1['id']?>" <?php if($category==$cate1['id'])echo 'selected'; ?>><?=stripslashes($space_num.$cate1['name'])?></option><?php
				}
			}
		}
	}	
}
?>