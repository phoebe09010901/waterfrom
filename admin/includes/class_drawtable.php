<?php
class drawtable {
	private $TableHeadItems, $now_page;
	//construct
	public function __construct() {	
	
	}	
	
	public function drawTable($result_data) {
		global $this_page, $page_go, $page_all, $page_num, $obj_all, $my_query_string;			
		$this->now_page = $this_page;
		
		switch($this->now_page) {			
			case 'pages_category.php':	//頁面類別管理
			case 'news_category.php':	//文章類別管理
			case 'news2_category.php':	//主題分享類別管理
			
			
			
			
			case 'country_category.php':	//國家管理			
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "國家名稱", ""), 
									array("Text", "center", "排　　 序", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;

			case 'proj_category.php':		//專案管理			
				$this->TableHeadItems = array(array("Text", "center", "修改", 40),
									//array("Text", "center", "上架", 35), 				
									array("Text", "center", "專案英文", ""), 
									array("Text", "center", "專案中文", ""), 									
									array("Text", "center", "排　　 序", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;	
										
			case 'proj2_category.php':		//Press管理
				$this->TableHeadItems = array(array("NewItem", "center", "新增", 65), 								
									array("Text", "center", "上架", 35), 				
									array("Text", "center", "年份", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;	

			case 'proj3_category.php':		//Issue管理
				$this->TableHeadItems = array(array("NewItem", "center", "新增", 65), 								
									array("Text", "center", "上架", 35), 				
									array("Text", "center", "英文標題", ""), 
									array("Text", "center", "中文標題", ""), 									
									array("Text", "center", "文章日期", "180"), 																		
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;					
								
			case 'country.php':				//城市
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "城市名稱", ""), 
									array("Text", "center", "排　　 序", ""), 									
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;				
				
				
				
				
			case 'products_category.php':	//商品類別管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "類別名稱", ""), 
									array("Text", "center", "排　　序", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'pages.php':	//頁面編輯管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "標　　題", ""), 
									array("Text", "center", "排　　序", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'banner.php':	//首頁大圖管理
				$this->TableHeadItems = array(array("", "center", "&nbsp;", 35),  
									//array("Text", "center", "上架", 35), 
									array("Text", "center", "Banner圖片", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;

			case 'banner2.php':	//首頁右側廣告管理
				$this->TableHeadItems = array(array("", "center", "&nbsp;", 35), 
									array("Text", "center", "首頁右側廣告小圖", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
								
			case 'news.php':	//文章管理
			case 'news2.php':	//主題分享管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "發佈日期", ""), 
									array("Text", "center", "標　　題", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;

			case 'faq_category.php'://FAQ管理
				$this->TableHeadItems = array( 
									array("", "center", "", 65), 
									array("Text", "center", "FAQ上方說明", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;		

			case 'faq.php':			//FAQ管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "標　　題", ""), 
									array("Text", "center", "排　　序", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;

			case 'madeofnz_category.php'://Made Of NZ管理
				$this->TableHeadItems = array(
									array("", "center", "", 65), 
									array("Text", "center", "Made Of NZ 上方說明", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;		

			case 'madeofnz.php':			//Made Of NZ管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "標　　題", ""), 
									array("Text", "center", "排　　序", ""), 									
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;				
										
				
			case 'teacher.php':	//教練陣容管理
				$ImagesSetting = array(1=>array("_width"=>100, "_height"=>100, "_width_s"=>(100), "_height_s"=>(100), "ImgFileSize"=>5));
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "圖　　片", 120), 
									array("Text", "center", "教練姓名", ""), 
									array("Text", "center", "教練介紹", ""), 
									array("Text", "center", "排　　序", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'album.php':	//相簿管理
				$this->TableHeadItems = array(
									//array("", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									//array("Text", "center", "ID", ""), 
									//array("Text", "center", "相簿日期", ""), 
									array("Text", "center", "英文名稱", ""), 
									array("Text", "center", "中文名稱", ""), 									
									array("Text", "center", "排序", 35), 									
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;

			case 'album2.php':	//相簿管理
				$this->TableHeadItems = array(
									//array("", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									//array("Text", "center", "ID", ""), 
									//array("Text", "center", "相簿日期", ""), 
									array("Text", "center", "英文名稱", ""), 
									array("Text", "center", "中文名稱", ""), 	
									array("Text", "center", "排序", 35), 																		
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;

			case 'album3.php':	//相簿管理
				$this->TableHeadItems = array(
									//array("", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									//array("Text", "center", "上架", 35), 
									//array("Text", "center", "ID", ""), 
									//array("Text", "center", "相簿日期", ""), 
									array("Text", "center", "專案名稱", ""), 									
									array("Text", "center", "圖　　片", ""), 									
									array("Text", "center", "排序", ""), 									
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;				
								
			case 'products.php':	//商品資料管理
				$ImagesSetting = array(1=>array("_width"=>120, "_height"=>120, "_width_s"=>(100), "_height_s"=>(100), "ImgFileSize"=>5));
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "推薦", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "商品圖片", 120), 
									array("Text", "center", "品名", ""), 
									array("Text", "center", "售價", ""), 
									array("Text", "center", "排序", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'orderlist.php':	//訂單資料管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("Text", "center", "&nbsp;", 65), 
									array("Text", "center", "付款狀態", 35), 
									array("Text", "center", "訂單狀態", 35), 
									array("Text", "center", "訂單編號", ""), 
									array("Text", "center", "收件人", ""), 
									array("Text", "center", "聯絡資料", ""), 
									array("Text", "center", "訂單金額", ""), 
									array("Text", "center", "配送方式", ""), 
									array("Text", "center", "付款方式", ""), 
									array("Text", "center", "訂單建立時間", 180));
				break;
			case 'links.php':	//相關連結管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "連結名稱", ""), 
									array("Text", "center", "排　　序", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'stores.php':	//商家資訊管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "經銷商名稱", ""), 
									array("Text", "center", "聯絡資料", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'download.php':	//檔案下載管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "檔案名稱", ""), 
									array("Text", "center", "排　　序", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'contact_form.php':	//聯絡我們表單
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("Text", "center", "&nbsp;", 65), 
									array("Text", "center", "回覆", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "發問者", ""), 
									array("Text", "center", "連絡電話", ""), 
									array("Text", "center", "E-mail", ""), 
									array("Text", "center", "資料建立時間", 180));
				break;
			//=====================================
			case 'member.php':	//會員資料管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "權限", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "會員帳號", ""), 
									array("Text", "center", "會員姓名", ""), 
									array("Text", "center", "生   日", ""), 
									array("Text", "center", "E-mail", ""), 
									array("Text", "center", "最近登入時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'board.php':	//留言板管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("Text", "center", "&nbsp;", 65), 
									array("Text", "center", "回覆", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "發問者", 125), 
									array("Text", "center", "內　　容", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'forum.php':	//討論區管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("Text", "center", "&nbsp;", 65), 
									array("Text", "center", "權限", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "發問者", 125), 
									array("Text", "center", "內　　容", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			case 'forum_reply.php':	//討論區回覆留言管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("Text", "center", "&nbsp;", 65), 
									array("Text", "center", "權限", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "留言者", 125), 
									array("Text", "center", "內　　容", ""), 
									array("Text", "center", "資料建立時間", 180));
				break;
			case 'edm.php':	//EDM 管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "&nbsp;", 60), 
									array("Text", "center", "&nbsp;", 60), 
									array("Text", "center", "上架", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "發佈日期", ""), 
									array("Text", "center", "標　　題", ""), 
									array("Text", "center", "資料建立時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;
			//=====================================
			case 'admin.php':	//帳號管理
				$this->TableHeadItems = array(array("SelectAll", "center", "&nbsp;", 35), 
									array("NewItem", "center", "新增", 65), 
									array("Text", "center", "權限", 35), 
									array("Text", "center", "ID", ""), 
									array("Text", "center", "帳　　號", ""), 
									array("Text", "center", "顯示名稱", ""), 
									array("Text", "center", "權限等級", ""), 
									array("Text", "center", "最近登入時間", 180), 
									array("Text", "center", "最近修改時間", 180));
				break;	
		}
		
		?><div class="mainContent"><?php
		?><div id="data_content"><?php
		$this->drawTableToolBar();
		?><div class="template_black">
        <form method="post" action="<?=$_SERVER['PHP_SELF']?>" name="list_form" id="list_form">
        <input type="hidden" name="action" id="action" value="">
        <input type="hidden" name="row_name" id="row_name" value="">
        <input type="hidden" name="row_value" id="row_value" value="">
        <table width="100%"  cellspacing="0" cellpadding="0" border="0">
        <?php
		$this->drawTableHead();
		$this->drawTableBody($result_data);
		?></table>
        </form>
        </div>
		</div><!--data_content end--><?php
		change_page_jyc($page_go, $page_all, $page_num, $obj_all, $my_query_string);	//分頁
		?></div><!--mainContent end--><?php
	}
	
	private function drawTableToolBar() {
		global $main_str, $page_go, $page_all, $page_num, $obj_all, $array_search, $search_row, $my_query_string;
		
		?><div class="toolbar"><?php
		
		if($this->now_page != "proj_category.php" && $this->now_page != "banner.php"){
			search_form($array_search, $search_row, $my_query_string);	//搜尋
			change_page_jyc_s($page_go, $page_all, $page_num, $obj_all, $my_query_string);	//分頁
		}
		
		switch($this->now_page) {
			case "pages.php":
			case "news2.php":
				//$this->drawiFramebutton("類別管理", $main_str."_category.php");
				$this->drawDelallbutton("批次刪除", 'action', 'del_all', 'list_form');
				$this->drawChangebutton("批次復權", 'action', 'change_data', 'row_name', 'pub', 'row_value', '1', 'list_form');
				$this->drawChangebutton("批次停權", 'action', 'change_data', 'row_name', 'pub', 'row_value', '0', 'list_form');
				break;
			case "news.php":
				$this->drawiFramebutton("類別管理", $main_str."_category.php");
				$this->drawDelallbutton("批次刪除", 'action', 'del_all', 'list_form');
				$this->drawChangebutton("批次復權", 'action', 'change_data', 'row_name', 'pub', 'row_value', '1', 'list_form');
				$this->drawChangebutton("批次停權", 'action', 'change_data', 'row_name', 'pub', 'row_value', '0', 'list_form');
				break;
			case "member.php":
				$this->drawDelallbutton("批次刪除", 'action', 'del_all', 'list_form');
				$this->drawChangebutton("批次復權", 'action', 'change_data', 'row_name', 'pub_by_admin', 'row_value', '1', 'list_form');
				$this->drawChangebutton("批次停權", 'action', 'change_data', 'row_name', 'pub_by_admin', 'row_value', '0', 'list_form');
				break;
			case "orderlist.php":
				$this->drawDelallbutton("批次刪除", 'action', 'del_all', 'list_form');
				break;
			case "album.php":
				require_once('includes/xprog.php');
				$Conn = DB_Open();
			?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td width="80">標題顏色：</td>
                <td width="150">
                <div style="width:30px; height:30px; background:#<?=xwaterfrom_album_titlecolorr1($Conn)?>; float:left; margin-right:10px; float:left;"></div>
                <input name="color_code" id="color_code" type="text" value="<?=xwaterfrom_album_titlecolorr1($Conn)?>" maxlength="6" style="width:100px" ></td>
                <td><input name="" type="button" value="儲存" onClick="location.href='includes/xtitle_colorw4.php?category=<?=$_REQUEST['category']?>&color_code=' + document.getElementById('color_code').value;"></td>
                </tr>
                </table>                
			<?			
				break;	
			case "album2.php":
				/*
				require_once('includes/xprog.php');
				$Conn = DB_Open();
			?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td width="80">標題顏色：</td>
                <td width="150">
                <div style="width:30px; height:30px; background:#<?=xwaterfrom_album2_titlecolorr1($Conn)?>; float:left; margin-right:10px; float:left;"></div>                
                <input name="color_code" id="color_code" type="text" value="<?=xwaterfrom_album2_titlecolorr1($Conn)?>" maxlength="6" style="width:100px" ></td>
                <td><input name="" type="button" value="儲存" onClick="location.href='includes/xtitle_colorw3.php?category=<?=$_REQUEST['category']?>&color_code=' + document.getElementById('color_code').value;"></td>
                </tr>
                </table>                
			<?
				*/			
				break;								
			case "proj_category.php":
				require_once('includes/xprog.php');
				$Conn = DB_Open();
			?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="80">標題顏色：</td>
                        <td width="150">
                            <div style="width:30px; height:30px; background:#<?=xwaterfrom_proj_category_titlecolorr1($Conn)?>; float:left; margin-right:10px; float:left;"></div>                                
                            <input name="color_code" id="color_code" type="text" value="<?=xwaterfrom_proj_category_titlecolorr1($Conn)?>" maxlength="6" style="width:100px" >
                        </td>
                        <td><input name="" type="button" value="儲存" onClick="location.href='includes/xtitle_colorw1.php?category=<?=$_REQUEST['category']?>&color_code=' + document.getElementById('color_code').value;"></td>

                        <td width="80">左側色塊：</td>
                        <td width="150">
                            <div style="width:30px; height:30px; background:#<?=xwaterfrom_proj_category_titlecolorr2($Conn)?>; float:left; margin-right:10px; float:left;"></div>                                
                            <input name="color_code" id="color_code2" type="text" value="<?=xwaterfrom_proj_category_titlecolorr2($Conn)?>" maxlength="6" style="width:100px" >
                        </td>
                        <td><input name="" type="button" value="儲存" onClick="location.href='includes/xtitle_colorw5.php?category=<?=$_REQUEST['category']?>&color_code=' + document.getElementById('color_code2').value;"></td>                        
                    </tr>
                </table>                
			<?			
				break;	
			case "proj2_category.php":
				require_once('includes/xprog.php');
				$Conn = DB_Open();
			?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td width="80">標題顏色：</td>
                <td width="150">
                <div style="width:30px; height:30px; background:#<?=xwaterfrom_proj_category2_titlecolorr1($Conn)?>; float:left; margin-right:10px; float:left;"></div>                                                
                <input name="color_code" id="color_code" type="text" value="<?=xwaterfrom_proj_category2_titlecolorr1($Conn)?>" maxlength="6" style="width:100px" ></td>
                <td><input name="" type="button" value="儲存" onClick="location.href='includes/xtitle_colorw2.php?category=<?=$_REQUEST['category']?>&color_code=' + document.getElementById('color_code').value;"></td>
                </tr>
                </table>                
			<?			
				break;								
			case "board.php":
			case "contact_form.php":
				$this->drawDelallbutton("批次刪除", 'action', 'del_all', 'list_form');
				$this->drawChangebutton("批次狀態回覆", 'action', 'change_data', 'row_name', 'pub', 'row_value', '1', 'list_form');
				$this->drawChangebutton("批次狀態未回覆", 'action', 'change_data', 'row_name', 'pub', 'row_value', '0', 'list_form');
				break;
			default:
				$this->drawDelallbutton("批次刪除", 'action', 'del_all', 'list_form');
				$this->drawChangebutton("批次復權", 'action', 'change_data', 'row_name', 'pub', 'row_value', '1', 'list_form');
				$this->drawChangebutton("批次停權", 'action', 'change_data', 'row_name', 'pub', 'row_value', '0', 'list_form');	
				break;
		}
		
		?></div><?php
	}
	private function drawTableHead() {
		echo '<tr>';
		foreach($this->TableHeadItems as $key => $items) {
			echo '<th align="'.$items[1].'" style="width:'.$items[3].'px">';
			switch($items[0]) {
				case "SelectAll":
					echo '<input type="checkbox" name="SelectAll" id="SelectAll" value="1" onclick="real_select_all(this.checked)" />';
					break;
				case "NewItem":
					echo '<button type="button" class="newone" onClick="real_add()">p'.$items[2].'</button>';
					break;
				case "Text":
					echo $items[2];
					break;
			}
			echo '</th>';
		}
		echo '</tr>';
	}
	private function drawTableBody($result_data) {
		global $main_str_banner, $main_str_prof, $main_str_prod, $main_str_down, $table_name_edm;
		global $array_pay_state, $array_orderlist_state, $array_cart_type, $array_pay_type, $twzipcode;
		global $my_query_string;
		$query_string = explode("&", $my_query_string);
		if(count($query_string)>0) {
			foreach($query_string as $key => $value)	{
				$value = explode("=", $value);
				${$value[0]} = $value[1];
			}
		}
		
		switch($this->now_page) {			
			case 'pages_category.php':	//頁面類別管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><a href="<?=($data['lv']<News_Category_Lv_Num)?'pages_category.php?prev='.$data['id']:'#'?>"><?=$data['name']?></a></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;		
			case 'news_category.php':	//文章類別管理
			case 'news2_category.php':	//主題分享類別管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><a href="<?=($data['lv']<News_Category_Lv_Num)?'news_category.php?prev='.$data['id']:'#'?>"><?=$data['name']?></a></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;

			case 'faq_category.php':	//主題分享類別管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center">
                    	<button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> 
					</td>
                    <td align="left"><a href="faq.php?category=<?=$data['id']?>"><?=strip_tags($data['content'])?></a></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;				
			case 'faq.php':	//主題分享管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['title']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['title']?></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>                    
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;

			case 'madeofnz_category.php':	//主題分享類別管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center">
                    	<button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> 
					</td>
                    <td align="left"><a href="madeofnz.php?category=<?=$data['id']?>"><?=strip_tags($data['content'])?></a></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;				
			case 'madeofnz.php':	//主題分享管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['title']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['title']?></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>                    
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;				
								
			case 'country_category.php':	//國家管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><a href="<?=($data['lv']<News_Category_Lv_Num)?'proj.php?category='.$data['id']:'#'?>"><?=$data['name']?></a></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;

			case 'proj_category.php':	//專案管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					
					$link = "album.php";
					/*
					switch ($data['id']) {
						case 12:
							$link = "album.php";
							break;
						case 13:
							$link = "album2.php";
							break;
						case 14:
							$link = "album3.php";
							break;
						case 15:
							$link = "album4.php";
							break;
						case 16:
							$link = "album5.php";
							break;
						case 17:
							$link = "album6.php";
							break;
						case 18:
							$link = "album7.php";
							break;
						case 19:
							$link = "album8.php";
							break;
																																																
					}	
					*/				
					?>
                    <tr>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button></td>
                    <!--
                    <td align="center">	                    
                    <input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>                    
                    -->
                    <td align="center"><a href="<?=$link . '?category='.$data['id']?>"><?=$data['name']?></a></td>
                    <td align="center"><a href="<?=$link . '?category='.$data['id']?>"><?=$data['name2']?></a></td>                    
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="if(this.value <= 8){	change_sort('<?=$data['id']?>', 'sort', this.value, event); }	else	{ alert('請輸入數字1-8。');}"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr>
					<?php	
				}
				break;	

			case 'proj2_category.php':	//Press管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					
					$link = "album2.php";		
					?>
                    <tr>
                    <td align="center">
                        <button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button>
                        <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['title']?>')">s</button>
                    </td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>                    
                    <td align="center"><a href="<?=$link . '?category='.$data['id']?>"><?=$data['name']?></a></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr>
					<?php	
				}
				break;	


			case 'proj3_category.php':	//Issue管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					
					$link = "album3.php";		
					?>
                    <tr>
                    <td align="center">
                        <button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button>
                        <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['title']?>')">s</button>
                    </td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>                    
                    <td align="center"><a href="<?=$link . '?category='.$data['id']?>"><?=$data['name2']?></a></td>
                    <td align="center"><a href="<?=$link . '?category='.$data['id']?>"><?=$data['name']?></a></td>                                        
                    <td align="center"><?=$data['release_date']?></td>                    
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr>
					<?php	
				}
				break;												

			case 'country.php':			//城市管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['name']?></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
												
			case 'products_category.php':	//商品類別管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> 
                    <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><a href="<?=($data['lv']<Products_Category_Lv_Num)?'products_category.php?prev='.$data['id']:'products.php?category='.$data['id']?>"><?=$data['name']?></a></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'pages.php':	//頁面編輯管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
					<td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['title']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['title']?></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'banner.php':	//首頁大圖管理
				global $main_str_banner, $CategoryList;
				$category = 1;
				$obj_image = new files();	
				
				$cate_str  = $CategoryList[$category]['Title'];
				$file_size = $CategoryList[$category]['FileSize'];
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';

					switch ($data['id']) {
						case 31:
							$_width    = 1390;
							$_height   = 1252;
							break;
						case 32:
							$_width    = 1152;
							$_height   = 1710;
							break;
						case 33:
							$_width    = 1479;
							$_height   = 1708;
							break;
						case 34:
							$_width    = 987;
							$_height   = 1675;
							break;			
					}	
				
					$_width_s  = $_width * 0.2;
					//$_height_s = $_height_s * 0.2;						
					?>
                    <tr>
                    <td align="center">
                    	<button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button>
                    </td>
                    <!--
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    -->
                    <td align="left">
						<?php 
							$obj_image->show_pic1($main_str_banner.'/'.$data['file1'], $_width*0.1, '', $data['title'], 'show_file'.$i); 
							echo "&nbsp;&nbsp;";
							$obj_image->show_pic1($main_str_banner.'/'.$data['file2'], $_width*0.1, '', $data['title'], 'show_file'.$i); 
							echo "&nbsp;&nbsp;";							
							$obj_image->show_pic1($main_str_banner.'/'.$data['file3'], $_width*0.1, '', $data['title'], 'show_file'.$i); 
							echo "&nbsp;&nbsp;";							
							$obj_image->show_pic1($main_str_banner.'/'.$data['file4'], $_width*0.1, '', $data['title'], 'show_file'.$i); 																					
						?>
                    </td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr>
					<?php	
				}
				break;

			case 'banner2.php':	//Banner管理	
				global $main_str_banner2, $CategoryList2;
				$obj_image = new files();	
				
				$cate_str  = $CategoryList2[$category]['Title'];
				$_width    = $CategoryList2[$category]['Width'];
				$_height   = $CategoryList2[$category]['Height'];
				$_width_s  = $CategoryList2[$category]['Width_s'];
				$_height_s = $CategoryList2[$category]['Height_s'];
				$file_size = $CategoryList2[$category]['FileSize'];
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center">
                    	<button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> 
					</td>
                    <td align="center"><?php $obj_image->show_pic1($main_str_banner.'/'.$data['file1'], $_width_s, $_height_s, $data['title'], 'show_file'.$i) ?></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
								
			case 'news.php':	//文章管理
			case 'news2.php':	//主題分享管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['title']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['news_date']?></td>
                    <td align="center"><?=$data['title']?></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'teacher.php':	//教練陣容管理	
				global $main_str_prof, $ImagesSetting;
				$obj_image = new files();	
				
				foreach($ImagesSetting as $key => $value) {
					foreach($value as $key1 => $value1) {
						${$key1.$key} = $value1;
					}
				}
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?php $obj_image->show_pic1($main_str_prof.'/'.$data['file1'], $_width_s1, $_height_s1, $data['name'], 'show_file'.$i) ?></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['name']?></td>
                    <td align="center"><?=$data['content']?></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'album.php':	//相簿管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center">
                    	<button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> 
                        <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button>
	                    <button type="button" class="editbtn edit_w65" title="管理" onClick="location.href='album_photos.php?category=<?=$_REQUEST['category']?>&album_id=<?=$data['id']?>'">管理</button>
                    </td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>                                        
                    <td align="center"><?=$data['title']?></td>
                    <td align="center"><?=$data['title2']?></td>                    
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>                    
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'album2.php':	//相簿管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center">
                    	<button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> 
                        <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button>                        
                    </td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>                    
                    <td align="center"><?=$data['title']?></td>                    
                    <td align="center"><?=$data['title2']?></td>                    
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>                    
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'album3.php':	//相簿管理
			
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center">
                    	<button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> 
                        <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '說明')">s</button>                        
                    </td>
                    <td align="left">
                    	<?=html_entity_decode($data['name'])?>
                    </td>                                        
                    <td align="center">
                    	<img width="<?=850*0.2?>" src="../album3/<?=$data['file1']?>">
                    </td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>                    
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;								
			case 'products.php':	//商品資料管理		
				global $main_str_prod, $ImagesSetting;
				$obj_image = new files();	
				foreach($ImagesSetting as $key => $value) {
					foreach($value as $key1 => $value1) {
						${$key1.$key} = $value1;
					}
				}

				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center" valign="middle"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_push<?=$i?>" value="1" <?php if($data['push']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'push', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?php $obj_image->show_pic2($main_str_prod.'/thumb/'.$data['file1'], $_width_s1, $_height_s1, $data['name'], 'show_file'.$i) ?></td>
                    <td align="center"><?=$data['name']?></td>
                    <td align="center"><?=number_format($data['price'])?></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'orderlist.php':	//訂單資料管理
				global $array_pay_state, $array_orderlist_state, $array_cart_type, $array_pay_type;
				foreach($result_data as $i => $data) {
					$data['order_time'] = explode(" ", $data['order_time']);
					$data['order_time'] = $data['order_time'][0].'<br><span class="txtgray">'.$data['order_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit('<?=$data['id']?>')">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del('<?=$data['id']?>', '<?=$data['id']?>')">s</button><button type="button" class="editbtn edit_w65" title="清單" onClick="real_orderlist_detail('<?=$data['id']?>')">清單</button></td>               
                    <td align="center"><select name="order_pay_state_<?=$i?>" id="order_pay_state_<?=$i?>" onChange="change_power('<?=$data['id']?>', 'pay_state', this.value)"><?php
                    if(count($array_pay_state)>0) {
                        foreach($array_pay_state as $key => $value)	 {
                        ?><option value="<?=$key?>" <?php if($key==$data['pay_state']){echo 'selected';} ?>><?=$value?></option><?php	
                        }
                    }
                    ?></select></td>           
                    <td align="center"><select name="order_orderlist_state_<?=$i?>" id="order_orderlist_state_<?=$i?>" onChange="change_power('<?=$data['id']?>', 'orderlist_state', this.value)"><?php
                    if(count($array_orderlist_state)>0) {
                        foreach($array_orderlist_state as $key => $value)	 {
                        ?><option value="<?=$key?>" <?php if($key==$data['orderlist_state']){echo 'selected';} ?>><?=$value?></option><?php	
                        }
                    }
                    ?></select></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['order_name']?></td>
                    <td align="center"><?=$data['order_email'].'<br>'.$data['order_mobile']?></td>
                    <td align="center"><?=number_format($data['total_price'])?></td>
                    <td align="center"><?=$array_cart_type[$data['cart_type']]?></td>
                    <td align="center"><?=$array_pay_type[$data['pay_type']]?></td>
                    <td align="center"><?=$data['order_time']?></td>
					</tr><?php	
				}
				break;
			case 'links.php':	//相關連結管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><a href="<?=($data['url_to'])?$data['url_to']:'#'?>" target="_blank"><?=$data['title']?></a></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'stores.php':	//商家資訊管理
				global $twzipcode;
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['name']?></td>
                    <td align="center"><?=$data['phone'].'<br>'.$data['email'].'<br>'.$data['zipcode'].$twzipcode[$data['zipcode']]['county'].$twzipcode[$data['zipcode']]['area'].$data['address']?></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'download.php':	//檔案下載管理
				global $main_str_down;
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['title']?>')">s</button><button type="button" class="editbtn edit_w65" title="下載" onClick="location.href='downfile.php?file=../<?=$main_str_down?>/<?=$data['file1']?>'">下載</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><a href="downfile.php?file=../<?=$main_str_down?>/<?=$data['file1']?>" target="_blank"><?=$data['title']?></a></td>
                    <td align="center"><input type="text" name="data_sort_<?=$i?>" id="data_sort_<?=$i?>" value="<?=$data['sort']?>" style="width:50px;" onChange="change_sort('<?=$data['id']?>', 'sort', this.value, event)"></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'contact_form.php':	//聯絡我們表單
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button><button type="button" class="editbtn edit_w65" title="查看" onClick="real_cont(<?=$data['id']?>, '<?=$data['name']?>')">查看</button></td>
                    <td align="center"><input type="checkbox" name="data_state" id="data_state<?=$i?>" value="1" <?php if($data['state']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'state', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['name']?></td>
                    <td align="center"><?=$data['phone']?></td>
                    <td align="center"><?=$data['email']?></td>
                    <td align="center"><?=$data['create_time']?></td>
					</tr><?php	
				}
				break;
			//=====================================
			case 'member.php':	//會員資料管理
				foreach($result_data as $i => $data) {
					$data['login_time']  = explode(" ", $data['login_time']);
					$data['login_time']  = $data['login_time'][0].'<br><span class="txtgray">'.$data['login_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['account']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub_by_admin']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub_by_admin', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['account']?></td>
                    <td align="center"><?=$data['name']?></td>
                    <td align="center"><?=$data['birthday']?></td>
                    <td align="center"><?=$data['email']?></td>
                    <td align="center"><?=$data['login_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'board.php':	//留言板管理
				foreach($result_data as $i => $data) {
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['name']?>')">s</button><button type="button" class="editbtn edit_w65" title="回覆" onClick="real_board(<?=$data['id']?>, '<?=$data['name']?>')">回覆</button></td>
                    <td align="center"><input type="checkbox" name="data_reply" id="data_reply<?=$i?>" value="1" <?php if($data['reply']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'reply', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['name']?></td>
                    <td align="left"><?=$data['content']?></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'forum.php':	//討論區管理
				require_once(Root_Includes_Path.'class_getData.php');
				$obj_getData= new getData();
				
				foreach($result_data as $i => $data) {
					$obj_getData->memberData($forum['memberIDkey']);
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['title']?>')">s</button><button type="button" class="editbtn edit_w65" title="留言" onClick="location.href='forum_reply.php?forum_id=<?=$data['id']?>'">留言</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$obj_getData->member['name']?></td>
                    <td align="left"><?='標題：'.$data['title'].'<br>'.$data['content']?></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			case 'forum_reply.php':	//討論區回覆留言管理
				require_once(Root_Includes_Path.'class_getData.php');
				$obj_getData= new getData();
				
				foreach($result_data as $i => $data) {
					if($data['memberIDkey']!=0) {
						$obj_getData->memberData($data['memberIDkey']);
						$member_name = $obj_getData->member['name'];
					}else {
						$member_name = '網站管理者';	
					}
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$obj_getData->member['name']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$member_name?></td>
                    <td align="left"><?=nl2br($data['content'])?></td>
                    <td align="center"><?=$data['create_time']?></td>
					</tr><?php	
				}
				break;
			case 'edm.php':	//EDM 管理
				global $table_name_edm;
				$obj_log = new mysql_page();
				foreach($result_data as $i => $data) {					
					$query = "select count(id) as counts from ".$table_name_edm."_log  where edm_id='".$data['id']."'";
					$log   = $obj_log->run_mysql_out($query);
					$data['create_time'] = explode(" ", $data['create_time']);
					$data['create_time'] = $data['create_time'][0].'<br><span class="txtgray">'.$data['create_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['title']?>')">s</button></td>
                    <td align="center"><button type="button" class="editbtn edit_w65" title="發送" onClick="enter_email_list('send', '<?=$data['formember']?>', <?=$data['id']?>, '<?=$data['title']?>')">發送</button></td>
                    <td align="center"><button type="button" class="editbtn edit_w65" title="發送測試" onClick="enter_email_list('test_send', '', <?=$data['id']?>, '<?=$data['title']?>')" style="font-size:12px">發送測試</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onChange="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['edm_date']?></td>
                    <td align="center"><?=$data['title'].' (Sent:'.number_format($log['counts']).')'?></td>
                    <td align="center"><?=$data['create_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;
			//=====================================
			case 'admin.php':	//帳號管理
				global $array_admin;
				foreach($result_data as $i => $data) {
					$data['login_time']  = explode(" ", $data['login_time']);
					$data['login_time']  = $data['login_time'][0].'<br><span class="txtgray">'.$data['login_time'][1].'</span>';
					$data['edit_time']   = explode(" ", $data['edit_time']);
					$data['edit_time']   = $data['edit_time'][0].'<br><span class="txtgray">'.$data['edit_time'][1].'</span>';
					?><tr>
                    <td align="center"><input type="checkbox" name="IDlist[]" id="IDlist<?=$i?>" value="<?=$data['id']?>" /></td>
                    <td align="center"><button type="button" class="editbtn edit_w25" title="編輯" onClick="real_edit(<?=$data['id']?>)">r</button> <button type="button" class="editbtn edit_w25" title="刪除" onClick="real_del(<?=$data['id']?>, '<?=$data['account']?>')">s</button></td>
                    <td align="center"><input type="checkbox" name="data_pub" id="data_pub<?=$i?>" value="1" <?php if($data['pub']==1){echo 'checked';} ?> onClick="change_power(<?=$data['id']?>, 'pub', this.checked)" /></td>
                    <td align="center"><?=$data['id']?></td>
                    <td align="center"><?=$data['account']?></td>
                    <td align="center"><?=$data['name']?></td>
                    <td align="center"><?=$array_admin[$data['lv']]?></td>
                    <td align="center"><?=$data['login_time']?></td>
                    <td align="center"><?=$data['edit_time']?></td>
					</tr><?php	
				}
				break;	
		}
	}
	
	public function drawiFramebutton($buttonVal, $iFrame_url) {
		echo '<a class="iFrame" href="'.$iFrame_url.'"><input type="button" class="batchButton1" value="'.$buttonVal.'"></a>　';	
	}
	public function drawDelallbutton($buttonVal, $actionID, $actionVal, $formID) {
		echo '<input type="button" class="batchButton2" value="'.$buttonVal.'" onClick="$(\'#'.$actionID.'\').val(\''.$actionVal.'\');$(\'#'.$formID.'\').submit();">　';	
	}
	public function drawChangebutton($buttonVal, $actionID, $actionVal, $rowNameID, $rowNameVal, $rowValueID, $rowValueVal, $formID) {
		echo '<input type="button" class="batchButton2" value="'.$buttonVal.'" onClick="$(\'#'.$actionID.'\').val(\''.$actionVal.'\');$(\'#'.$rowNameID.'\').val(\''.$rowNameVal.'\');$(\'#'.$rowValueID.'\').val(\''.$rowValueVal.'\');$(\'#'.$formID.'\').submit();">　';	
	}
}	
$obj_drawtable = new drawtable();	
?>