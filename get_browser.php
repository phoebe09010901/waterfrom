<?php
    $useragent = $_SERVER ['HTTP_USER_AGENT'];
    echo $useragent."<br>";
	if(strpos($useragent,"10.0") or strpos($useragent,"rv:11.0"))  
	echo "Windows"; 
?>