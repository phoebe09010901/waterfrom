<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'function_page.php');

//echo $_SESSION[Login_System_User]['lang'];

if($_SESSION[Login_System_User]['lang'] == "tw"){
?>
	<script>location.replace('aboutus_handle.php?id=1');</script>
<?	
	break;
}

if($_SESSION[Login_System_User]['lang'] == "en"){
?>
	<script>location.replace('aboutus_handle.php?id=2');</script>
<?	
	break;
}

if($_SESSION[Login_System_User]['lang'] == "cn"){
?>
	<script>location.replace('aboutus_handle.php?id=3');</script>
<?	
	break;
}

if($_SESSION[Login_System_User]['lang'] == "hk"){
?>
	<script>location.replace('aboutus_handle.php?id=4');</script>
<?	
	break;
}

break;
?>