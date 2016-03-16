<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');
require_once(Root_Includes_Path.'function_page.php');

//echo $_SESSION[Login_System_User]['lang'];
//break;

if($_SESSION[Login_System_User]['lang'] == "tw"){
?>
	<script>location.replace('madeofnzimg_handle.php?id=10');</script>
<?	
	break;
}

if($_SESSION[Login_System_User]['lang'] == "en"){
?>
	<script>location.replace('madeofnzimg_handle.php?id=11');</script>
<?	
	break;
}

if($_SESSION[Login_System_User]['lang'] == "cn"){
?>
	<script>location.replace('madeofnzimg_handle.php?id=12');</script>
<?	
	break;
}

if($_SESSION[Login_System_User]['lang'] == "hk"){
?>
	<script>location.replace('madeofnzimg_handle.php?id=13');</script>
<?	
	break;
}


?>