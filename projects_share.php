<?
	session_start();

	require_once('admin/includes/xprog.php');
	$Conn = DB_Open();	
	//echo $Conn;	
	
	list($html_title, $keywords, $description) = xheader_r1($Conn);

	$id = $_REQUEST['id'];
	$category = $_REQUEST['category'];	

	$sql1  = "select A.title as title, A.title2 as title2, A.content3 as content3, B.file1 as file1 from waterfrom_album as A join waterfrom_album_photos as B on A.id = B.album_id where ";
	$sql1 .= " A.category = '$category' ";	
	
	if($id != ""){	
		$sql1 .= "and A.id = '$id' ";
	}
	$sql1 .= "order by B.sort asc limit 0, 1";	
	//echo $sql1;

	$rl1 = mysql_query($sql1, $Conn);
	$row1 = mysql_fetch_array($rl1, MYSQL_ASSOC);	
	$title = $row1['title'];
	$title2 = $row1['title2'];	
	$content3 = $row1['content3'];
		
	$file1 = $row1['file1'];	


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$html_title?></title>

<meta property="og:title" content="<?=$title?> <?=$title2?>" /><!-- mars 這邊沒資料 -->
<meta property="og:site_name" content="<?=$html_title?>" />
<meta property="og:description" content="<?=$content3?>" /><!-- mars 這邊沒資料 -->
<meta property="og:url" content="http://<?=$_SERVER['HTTP_HOST']?>/projects_02.php%3Fcategory%3D<?=$category?>%26id%3D<?=$id?>" />
<meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST']?>/album_photos/<?=$id?>/<?=$file1?>" /><!-- mars 這邊幫我抓相本的第一張圖 -->
<meta property="og:type" content="website" />
<link href="http://<?=$_SERVER['HTTP_HOST']?>/album_photos/<?=$id?>/<?=$file1?>" rel="image_src" type="image/jpeg"/>



</head>

<body>
<!--
<a href="https://www.facebook.com/sharer.php?u=http://<?=$_SERVER['HTTP_HOST']?>/projects_02.php%3Fcategory%3D<?=$category?>%26id%3D<?=$id?>" target="_BLANK"><img src="images/news_icon.png" width="100"></a>
-->

<a href="#"><img src="images/news_icon.png" width="100" onclick="MM_openBrWindow('http://facebook.com/sharer.php?u=http://<?=$_SERVER['HTTP_HOST']?>/projects_share.php%3Fcategory%3D<?=$category?>%26id%3D<?=$id?>','','width=500,height=500')"></a>

<br /><br />

<a href="#"><img src="images/news_icon.png" width="100" onclick="MM_openBrWindow('https://www.pinterest.com/pin/create/button/?url=http://waterfrom.ftm.com.tw/projects_02.php?category=<?=$category?>&id=<?=$id?>&media=http://<?=$_SERVER['HTTP_HOST']?>/album_photos/<?=$id?>/<?=$file1?>&description=<?=$title?>-<?=$title2?>','','width=500,height=500')"></a>


</body>
</html>