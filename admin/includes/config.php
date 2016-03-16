<?php
/*$script_filename = getenv('PATH_TRANSLATED');
if (empty($script_filename)) {
	$script_filename = getenv('SCRIPT_FILENAME');
}
echo "實體路徑為 : <font color=blue>". $script_filename."</font><HR>";exit;*/
define("Host_Name", 'http://'.$_SERVER['HTTP_HOST'].'/');
define("Web_Control", Host_Name.'admin/');
define("Root_Path", $_SERVER['DOCUMENT_ROOT'].'/');
define("Root_Admin_Path", Root_Path.'admin/');
define("Root_Includes_Path", Root_Admin_Path.'includes/');
define("Proj_Name", 'waterfrom');
define("Login_User", Proj_Name.'_user_id');
define("Login_System_User", Proj_Name.'_admin_id');
define("Shopping_Data", Proj_Name.'_orderlist');

date_default_timezone_set("Asia/Taipei");
define("Session_Limit_Time", '30');	//單位:分鐘
//DB CONNECT
define("DB_Host", "localhost");
define("DB_Name", "waterfrom_com_DB");
define("DB_USER", "ftmcom_waterfrom");
define("DB_Password", "Xz8)mT?IFwOG");
//mcrypt key
define("Mcrypt_Key_Admin", "admin0911556220");
define("Mcrypt_Key_Member", "0911556220");
//SMTP
define("SMTP_SMTPAuth", 'false');
define("SMTP_Host", 'mail.directcoffee.com.tw');
define("SMTP_Port", '25');
define("SMTP_Username", 'service@directcoffee.com.tw');
define("SMTP_Password", '40074007');
//Designer Information
define("Design_Company", '菲兔麥有限公司');
define("Design_Company_Web", '');
define("Design_Company_Phone", '');
define("Design_Company_Email", '');
?>