<?php
// ABOUT
// =======================================================
// imageCheck_zz �v�H�Ʀr�T�{�� ver:0.1
// made by zenon blue,December 2006
// http://www.bluezz.com.tw/mybook/content.php?id=458
// service@bluezz.com.tw
// Copyright 2006 by bluezz
// =======================================================
header("Content-Type: text/xml");
session_start();
$result=0;
//�N�r�괫���j�g
$checksum=strtoupper($_REQUEST["checksum"]);
$s_checksum=$_SESSION['s_checksum'];
if( strLen($s_checksum) < 1 ){
	$result=2;	//�S��session
}elseif( $checksum ==  $s_checksum){
	$result=1;	//�{�ҽX���T
}else{
	$result=0;	//�{�ҽX���~
}
if(strlen($s_checksum) < 1 ||  strlen($checksum) < 1)
	$result=0;
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
?>

<root><?=  $result ?></root>