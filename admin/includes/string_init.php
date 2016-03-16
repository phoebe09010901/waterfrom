<?php
require_once("array_init.php");
require_once("array_twzipcode.php");

//變數宣告
$obj_menu1  = new mysql_page();
$obj_menu2  = new mysql_page();
$obj_menu3  = new mysql_page();
$obj_menu4  = new mysql_page();
$obj_data   = new mysql_page();	
$obj_log    = new mysql_page();	
$obj_system = new mysql_page();		
$obj_proj = new mysql_page();		

$obj_madeofnzimg = new mysql_page();		
//table_name
$main_str_pages    = 'pages';
$table_name_pages  = Proj_Name.'_'.$main_str_pages;
$main_str_banner   = 'banner';
$table_name_banner = Proj_Name.'_'.$main_str_banner;

$main_str_banner2   = 'banner2';
$table_name_banner2 = Proj_Name.'_'.$main_str_banner2;

$main_str_faq     = 'faq';
$table_name_faq   = Proj_Name.'_'.$main_str_faq;

$main_str_madeofnz     = 'madeofnz';
$table_name_madeofnz   = Proj_Name.'_'.$main_str_madeofnz;

$main_str_madeofnzimg     = 'madeofnzimg';
$table_name_madeofnzimg   = Proj_Name.'_'.$main_str_madeofnzimg;

$main_str_news     = 'news';
$table_name_news   = Proj_Name.'_'.$main_str_news;
$main_str_news2    = 'news2';
$table_name_news2  = Proj_Name.'_'.$main_str_news2;

$main_str_country    = 'country';
$table_name_country  = Proj_Name.'_'.$main_str_country;

$main_str_prof     = 'teacher';
$table_name_prof   = Proj_Name.'_'.$main_str_prof;
$main_str_album    = 'album';
$table_name_album  = Proj_Name.'_'.$main_str_album;
$main_str_prod     = 'products';
$table_name_prod   = Proj_Name.'_'.$main_str_prod;
$main_str_order    = 'orderlist';
$table_name_order  = Proj_Name.'_'.$main_str_order;
$main_str_links    = 'links';
$table_name_links  = Proj_Name.'_'.$main_str_links;
$main_str_stores   = 'stores';
$table_name_stores = Proj_Name.'_'.$main_str_stores;
$main_str_down     = 'download';
$table_name_down   = Proj_Name.'_'.$main_str_down;
$main_str_cont     = 'contact_form';
$table_name_cont   = Proj_Name.'_'.$main_str_cont;
$main_str_member   = 'member';
$table_name_member = Proj_Name.'_'.$main_str_member;
$main_str_board    = 'board';
$table_name_board  = Proj_Name.'_'.$main_str_board;
$main_str_forum    = 'forum';
$table_name_forum  = Proj_Name.'_'.$main_str_forum;
$main_str_edm      = 'edm';
$table_name_edm    = Proj_Name.'_'.$main_str_edm;
$main_str_admin    = 'admin';
$table_name_admin  = Proj_Name.'_'.$main_str_admin;
$main_str_hit      = 'hit_counts';
$table_name_hit    = Proj_Name.'_'.$main_str_hit;
$main_str_sys      = 'system_set';
$table_name_sys    = Proj_Name.'_'.$main_str_sys;
//this page
$this_page = $_SERVER['PHP_SELF'];
$this_page = basename($this_page);
//後台各頁面初始化設定
switch(Web_Control.$this_page) {
	case Web_Control.'pressimg_handle.php':
		$page_title    = 'Press首頁圖片';
		break;	
			
	case Web_Control.'aboutus.php':
		$page_title    = 'AboutUs';
		break;	
	case Web_Control.'aboutus_handle.php':
		$page_title    = 'AboutUs';
		break;	

	case Web_Control.'contactus.php':
		$page_title    = 'ContactUs';
		break;	
	case Web_Control.'contactus_handle.php':
		$page_title    = 'ContactUs';
		break;			
				
	case Web_Control.'index.php':
		$page_title    = '後台首頁';
		$array_allow_search_row = array();
		break;
	case Web_Control.'pages_category.php':
		$page_title    = '頁面類別管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'類別名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'pages_category_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'pages_category_handle.php':
		$page_title    = '頁面類別管理';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;
	case Web_Control.'pages.php':
		$page_title    = '頁面編輯管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'category');
		$array_search  = array('title'=>'頁面名稱');
		$jqxButionList = //'$(\'.batchButton1\').jqxButton({ width: 60, height: 25, theme: theme });'.
						 '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'pages_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'pages_handle.php':
		$page_title    = '頁面編輯管理';
		$array_allow_search_row = array('id', 'category', 'page_go');
		$images_num    = 1;
		$ImagesSetting = array(1=>array("_width"=>275, "_height"=>415, "_width_s"=>(275*0.5), "_height_s"=>(415*0.5), "ImgFileSize"=>5));
		break;
	case Web_Control.'banner.php':
		$page_title    = 'Banner管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'category');
		$array_search  = array('title'=>'Banner標題');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'banner_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'banner_handle.php':
		$page_title    = 'Banner管理';
		$array_allow_search_row = array('id', 'category', 'page_go');
		$images_num      = 4;
		break;

	case Web_Control.'banner2.php':
		$page_title    = '首頁右側廣告管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'category');
		$array_search  = array('title'=>'首頁右側廣告標題');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'banner2_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'banner2_handle.php':
		$page_title    = '首頁右側廣告管理';
		$array_allow_search_row = array('id', 'category', 'page_go');
		$images_num      = 1;
		break;
				
	case Web_Control.'news_category.php':
		$page_title    = '文章類別管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'類別名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'news_category_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'news_category_handle.php':
		$page_title    = '文章類別管理';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;

	case Web_Control.'faq_category.php':
		$page_title    = 'FAQ類別管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('content'=>'類別名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'faq_category_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'faq_category_handle.php':
		$page_title    = 'FAQ類別管理';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;

	case Web_Control.'faq.php':
		$page_title    = 'FAQ管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('content'=>'名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'faq_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'faq_handle.php':
		$page_title    = 'FAQ管理';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;


	case Web_Control.'madeofnz_category.php':
		$page_title    = 'Made Of NZ類別管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('content'=>'類別名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'madeofnz_category_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'madeofnz_category_handle.php':
		$page_title    = 'Made Of NZ類別管理';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;

	case Web_Control.'madeofnz.php':
		$page_title    = 'Made Of NZ管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('content'=>'名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'madeofnz_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'madeofnz_handle.php':
		$page_title    = 'Made Of NZ管理';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;		

	case Web_Control.'madeofnzimg_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
		
	case Web_Control.'madeofnzimg_handle.php':
		$page_title    = 'Made Of NZ IMG管理';
		$images_num      = 1;		
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;			
		
	case Web_Control.'country_category.php':
		$page_title    = '國家管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'類別名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;

	case Web_Control.'proj_category.php':
		$page_title    = 'Project管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'類別名稱');
		break;
		
	case Web_Control.'proj_category_handle.php':
		$page_title    = '<span onClick="location.href=\'proj_category.php\';" style="cursor: pointer;">Project管理</span>';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'類別名稱');
		break;	

	case Web_Control.'proj2_category.php':
		$page_title    = 'Press管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'年份');
		break;

	case Web_Control.'proj2_category_data.php':
		$page_title    = 'Press管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'年份');
		break;		
		
	case Web_Control.'proj2_category_handle.php':
		$page_title    = '<span onClick="location.href=\'proj2_category.php\';" style="cursor: pointer;">Press管理</span>';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'年份');
		break;	

	case Web_Control.'proj3_category.php':
		$page_title    = 'Issue管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name2'=>'英文名稱', 'name'=>'中文名稱');
		break;

	case Web_Control.'proj3_category_data.php':
		$page_title    = 'Issue管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'標題');
		break;		
		
	case Web_Control.'proj3_category_handle.php':
		$page_title    = '<span onClick="location.href=\'proj3_category.php\';" style="cursor: pointer;">Issue管理</span>';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'標題');
		break;			


	case Web_Control.'proj2_categoryimg.php':
		$page_title    = 'Press管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'年份');
		break;		
		
	case Web_Control.'proj2_categoryimg_handle.php':
		$page_title    = '<span onClick="location.href=\'proj2_category.php\';" style="cursor: pointer;">Press管理</span>';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'年份');
		break;						
		
	case Web_Control.'country_category_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
		
	case Web_Control.'country_category_handle.php':
		$page_title    = '國家管理';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;		



	case Web_Control.'country.php':
		$page_title    = '城市';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'類別名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
		
	case Web_Control.'country_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
		
	case Web_Control.'country_handle.php':
		$page_title    = '城市';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;	

		
		
		
		
		
	case Web_Control.'news.php':
		$page_title    = '文章管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'category');
		$array_search  = array('news_date'=>'發佈日期', 'title'=>'標　　題');
		$jqxButionList = '$(\'.batchButton1\').jqxButton({ width: 60, height: 25, theme: theme });'.
						 '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'news_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'news_handle.php':
		$page_title    = '文章管理';
		$array_allow_search_row = array('id', 'category', 'page_go');
		break;
	case Web_Control.'news2_category.php':
		$page_title    = '主題分享類別管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'類別名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'news2_category_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'news2_category_handle.php':
		$page_title    = '主題分享類別管理';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;
	case Web_Control.'news2.php':
		$page_title    = '主題分享管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'category');
		$array_search  = array('news_date'=>'發佈日期', 'title'=>'標　　題');
		$jqxButionList = //'$(\'.batchButton1\').jqxButton({ width: 60, height: 25, theme: theme });'.
						 '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'news2_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'news2_handle.php':
		$page_title    = '主題分享管理';
		$array_allow_search_row = array('id', 'category', 'page_go');
		$images_num    = 1;
		$ImagesSetting = array(1=>array("_width"=>214, "_height"=>181, "_width_s"=>(214), "_height_s"=>(181), "ImgFileSize"=>5));
		break;
	case Web_Control.'teacher.php':
		$page_title    = '教練陣容管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('name'=>'教練姓名', 'content'=>'教練介紹');
		$ImagesSetting = array(1=>array("_width"=>100, "_height"=>100, "_width_s"=>(100), "_height_s"=>(100), "ImgFileSize"=>5));
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'teacher_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'teacher_handle.php':
		$page_title    = '教練陣容管理';
		$array_allow_search_row = array('id', 'page_go');
		$images_num    = 1;
		$ImagesSetting = array(1=>array("_width"=>120, "_height"=>120, "_width_s"=>(100), "_height_s"=>(100), "ImgFileSize"=>5));
		break;
	case Web_Control.'album.php':
		$page_title    = '專案管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('title'=>'英文名稱', 'title2'=>'中文名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'album_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value', 'album_id', 'photo_id', 'update_row', 'update_text', 'update_text', 'file1');
		break;
	case Web_Control.'album_handle.php':
		$page_title    = '專案管理';
		$array_allow_search_row = array('id', 'page_go');
		break;
	case Web_Control.'album_photos.php':
		$page_title    = '專案照片管理';
		$array_allow_search_row = array('album_id', 'page_go');
		break;

	case Web_Control.'album.php':
		$page_title    = '專案管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('title'=>'專案名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'album2.php':
		$page_title    = '專案管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('title'=>'英文名稱', 'title2'=>'中文名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;		
	case Web_Control.'album2_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value', 'album_id', 'photo_id', 'update_row', 'update_text', 'update_text', 'file1');
		break;
		
	case Web_Control.'album2_handle.php':
		$page_title    = '專案管理';
		$array_allow_search_row = array('id', 'page_go');
		break;

	case Web_Control.'album3.php':
		$page_title    = '專案管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('title'=>'專案名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;		
	case Web_Control.'album3_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value', 'album_id', 'photo_id', 'update_row', 'update_text', 'update_text', 'file1');
		break;
	case Web_Control.'album3_handle.php':
		$page_title    = '專案管理';
		$array_allow_search_row = array('id', 'page_go');
		break;
		
	case Web_Control.'album2_photos.php':
		$page_title    = '專案照片管理';
		$array_allow_search_row = array('album_id', 'page_go');
		break;		
	case Web_Control.'products_category.php':
		$page_title    = '商品類別管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'prev');
		$array_search  = array('name'=>'類別名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'products_category_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'products_category_handle.php':
		$page_title    = '商品類別管理';
		$array_allow_search_row = array('id', 'prev', 'page_go');
		break;
	case Web_Control.'products.php':
		$page_title    = '商品資料管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'category');
		$array_search  = array('name'=>'商品名稱', 'sn'=>'型　　號');
		$ImagesSetting = array(1=>array("_width"=>120, "_height"=>120, "_width_s"=>(100), "_height_s"=>(100), "ImgFileSize"=>5));
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'products_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'products_handle.php':
		$page_title    = '商品資料管理';
		$array_allow_search_row = array('id', 'category', 'page_go');
		$images_num    = 1;
		$ImagesSetting = array(1=>array("_width"=>800, "_height"=>600, "_width_s"=>(800*0.2), "_height_s"=>(600*0.2), "ImgFileSize"=>5));
		break;
	case Web_Control.'orderlist.php':
		$page_title    = '訂單資料管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('id'=>'訂單編號', 'member_id'=>'訂購會員', 'order_name'=>'收件者', 'order_email'=>'E-mail', 'order_mobile'=>'連絡電話');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'orderlist_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value', 'order_id');
		break;
	case Web_Control.'orderlist_handle.php':
		$page_title    = '訂單資料管理';
		$array_allow_search_row = array('id', 'page_go');
		break;
	case Web_Control.'analyze.php':
		$page_title    = '營業報表統計';
		$array_allow_search_row = array('show_year');
		break;
	case Web_Control.'analyze_data.php':
		$array_allow_search_row = array('type', 'show_year', 'show_mon', 'show_day', '_', 'filterslength', 'pagenum', 'pagesize');
		break;
	case Web_Control.'links.php':
		$page_title    = '相關連結管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('title'=>'連結名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'links_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'links_handle.php':
		$page_title    = '相關連結管理';
		$array_allow_search_row = array('id', 'page_go');
		break;
	case Web_Control.'stores.php':
		$page_title    = '商家資訊管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('name'=>'經銷商名稱', 'phone'=>'連絡電話', 'email'=>'E-mail');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'stores_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'stores_handle.php':
		$page_title    = '商家資訊管理';
		$array_allow_search_row = array('id', 'page_go');
		break;
	case Web_Control.'download.php':
		$page_title    = '下載專區管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('title'=>'檔案名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'download_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'download_handle.php':
		$page_title    = '下載專區管理';
		$array_allow_search_row = array('id', 'page_go');
		$file_num      = 1;
		$FileSetting   = array(1=>array("FileSize"=>5));
		break;
	case Web_Control.'contact_form.php':
		$page_title    = '聯絡我們表單';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('name'=>'發問者', 'phone'=>'連絡電話', 'email'=>'E-mail');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'contact_form_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value', 'cont_id');
		break;
	//=====================================
	case Web_Control.'member.php':
		$page_title    = '會員資料管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('account'=>'會員帳號', 'name'=>'會員姓名', 'birthday'=>'生　　日', 'email'=>'E-mail');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'member_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'member_handle.php':
		$page_title    = '會員資料管理';
		$array_allow_search_row = array('id', 'page_go');
		break;
	case Web_Control.'board.php':
		$page_title    = '留言板管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('name'=>'發問者', 'content'=>'內　　容');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'board_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value', 'board_id', 'reply_content');
		break;
	case Web_Control.'forum.php':
		$page_title    = '討論區管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('title'=>'標　　題', 'content'=>'內　　容');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'forum_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'forum_reply.php':
		$page_title    = '討論區回覆留言管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords', 'forum_id');
		$array_search  = array('content'=>'內　　容');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'forum_reply_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'forum_reply_handle.php':
		$page_title    = '討論區回覆留言管理';
		$array_allow_search_row = array('id', 'forum_id', 'page_go');
		break;
	case Web_Control.'edm.php':
		$page_title    = 'EDM 管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('edm_date'=>'發佈日期', 'title'=>'標　　題');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'edm_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'edm_handle.php':
		$page_title    = 'EDM 管理';
		$array_allow_search_row = array('id', 'page_go');
		break;
	//=====================================
	case Web_Control.'admin.php':
		$page_title    = '帳號管理';
		$array_allow_search_row = array('action', 'page_go', 'search_row', 'keywords');
		$array_search  = array('account'=>'帳　　號', 'name'=>'顯示名稱');
		$jqxButionList = '$(\'.batchButton2\').jqxButton({ width: 100, height: 25, theme: theme });'.
						 '$(\'#prevpageButton\').jqxButton({ width: 25, height: 25, theme: theme });'.
						 '$(\'#nextpageButton\').jqxButton({ width: 25, height: 25, theme: theme });';
		break;
	case Web_Control.'admin_data.php':
		$array_allow_search_row = array('action', 'data_id', 'row_name', 'row_value');
		break;
	case Web_Control.'admin_handle.php':
		$page_title    = '帳號管理';
		$array_allow_search_row = array('id', 'page_go');
		break;
	case Web_Control.'web_setting.php':
		$page_title    = '網站設定管理';
		$array_allow_search_row = array();
		break;
	case Web_Control.'system_setting.php':
		$page_title    = '系統設定管理';
		$array_allow_search_row = array();
		break;
	case Web_Control.'login.php':
		$page_title    = '登入會員';
		$array_allow_search_row = array('login_account');
		break;
}
?>