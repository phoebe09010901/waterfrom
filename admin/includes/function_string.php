<?php
//**********************************************
//	字串處理 function
//**********************************************	
	function is_email ($email, $checkDNS = false) {
		$index = strrpos($email,'@');
	
		if ($index === false)       return false;   //  No at-sign
		if ($index === 0)           return false;   //  No local part
		if ($index > 64)            return false;   //  Local part too long
	
		$localPart      = substr($email, 0, $index);
		$domain         = substr($email, $index + 1);
		$domainLength   = strlen($domain);
	
		if ($domainLength === 0)    return false;   //  No domain part
		if ($domainLength > 255)    return false;   //  Domain part too long
		
		if (preg_match('/^\\.|\\.\\.|\\.$/', $localPart) > 0)               return false;   //  Dots in wrong place
		
		if (preg_match('/^"(?:.)*"$/', $localPart) > 0) {
			//  Local part is a quoted string
			if (preg_match('/(?:.)+[^\\\\]"(?:.)+/', $localPart) > 0)   return false;   //  Unescaped quote character inside quoted string
		} else {
			if (preg_match('/[ @\\[\\]\\\\",]/', $localPart) > 0)
				//  Check all excluded characters are escaped
				$stripped = preg_replace('/\\\\[ @\\[\\]\\\\",]/', '', $localPart);
			if (preg_match('/[ @\\[\\]\\\\",]/', $stripped) > 0)        return false;   //  Unquoted excluded characters
		}
	
		//  Now let's check the domain part...
		if (preg_match('/^\\[(.)+]$/', $domain) === 1) {
			//  It's an address-literal
			$addressLiteral = substr($domain, 1, $domainLength - 2);
			$matchesIP      = array();
	
			//  Extract IPv4 part from the end of the address-literal (if there is one)
			if (preg_match('/\\b(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/', $addressLiteral, $matchesIP) > 0) {
				$index = strrpos($addressLiteral, $matchesIP[0]);
	
				if ($index === 0) {
					//  Nothing there except a valid IPv4 address, so...
					return true;
				} else {
					//  Assume it's an attempt at a mixed address (IPv6 + IPv4)
					if ($addressLiteral[$index - 1] !== ':')            return false;   //  Character preceding IPv4 address must be ':'
					if (substr($addressLiteral, 0, 5) !== 'IPv6:')      return false;   //  RFC5321 section 4.1.3
	
					$IPv6 = substr($addressLiteral, 5, ($index ===7) ? 2 : $index - 6);
					$groupMax = 6;
				}
			} else {
				//  It must be an attempt at pure IPv6
				if (substr($addressLiteral, 0, 5) !== 'IPv6:')          return false;   //  RFC5321 section 4.1.3
				$IPv6 = substr($addressLiteral, 5);
				$groupMax = 8;
			}
	
			$groupCount = preg_match_all('/^[0-9a-fA-F]{0,4}|\\:[0-9a-fA-F]{0,4}|(.)/', $IPv6, $matchesIP);
			$index      = strpos($IPv6,'::');
	
			if ($index === false) {
				//  We need exactly the right number of groups
				if ($groupCount !== $groupMax)                          return false;   //  RFC5321 section 4.1.3
			} else {
				if ($index !== strrpos($IPv6,'::'))                     return false;   //  More than one '::'
				$groupMax = ($index === 0 || $index === (strlen($IPv6) - 2)) ? $groupMax : $groupMax - 1;
				if ($groupCount > $groupMax)                            return false;   //  Too many IPv6 groups in address
			}
	
			//  Check for unmatched characters
			array_multisort($matchesIP[1], SORT_DESC);
			if ($matchesIP[1][0] !== '')                                    return false;   //  Illegal characters in address
	
			//  It's a valid IPv6 address, so...
			return true;
		} else {
			//  It's a domain name...
			$matches    = array();
			$groupCount = preg_match_all('/(?:[0-9a-zA-Z][0-9a-zA-Z-]{0,61}[0-9a-zA-Z]|[a-zA-Z])(?:\\.|$)|(.)/', $domain, $matches);
			$level      = count($matches[0]);
	
			if ($level == 1)                                            return false;   //  Mail host can't be a TLD
	
			$TLD = $matches[0][$level - 1];
			if (substr($TLD, strlen($TLD) - 1, 1) === '.')              return false;   //  TLD can't end in a dot
			if (preg_match('/^[0-9]+$/', $TLD) > 0)                     return false;   //  TLD can't be all-numeric
	
			//  Check for unmatched characters
			array_multisort($matches[1], SORT_DESC);
			if ($matches[1][0] !== '')                          return false;   //  Illegal characters in domain, or label longer than 63 characters
	
			//  Check DNS?
			if ($checkDNS && function_exists('checkdnsrr')) {
				if (!(checkdnsrr($domain, 'A') || checkdnsrr($domain, 'MX'))) {
					return false;   //  Domain doesn't actually exist
				}
			}
	
			//  Eliminate all other factors, and the one which remains must be the truth.
			//      (Sherlock Holmes, The Sign of Four)
			return true;
		}
	}
	
function RemoveXSS($val) {  
    // Fix &entity\n;
	$data = str_replace(array('&amp;','&lt;','&gt;'),array('&amp;amp;','&amp;lt;','&amp;gt;'),$data);
	$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u','$1;',$data);
	$data = preg_replace('/(&#x*[0-9A-F]+);*/iu','$1;',$data);
	$data = html_entity_decode($data,ENT_COMPAT,'UTF-8');
	
	// Remove any attribute starting with "on" or xmlns
	$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu','$1>',$data);
	
	// Remove javascript: and vbscript: protocols
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu','$1=$2nojavascript...',$data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu','$1=$2novbscript...',$data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u','$1=$2nomozbinding...',$data);
	
	// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i','$1>',$data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i','$1>',$data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu','$1>',$data);
	
	// Remove namespaced elements (we do not need them)
	$data = preg_replace('#</*\w+:\w[^>]*+>#i','',$data);
	
	// http://www.phpernote.com/
	
	do{// Remove really unwanted tags
		$old_data = $data;
		$data     = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i','',$data);
	}while($old_data!==$data);

	// we are done...
	return $val;
}  
function format_data($str, $type, $len=0) {
	$str = RemoveXSS($str);
	//if($str && preg_match('/select|insert|update|delete|union|into|load_file|outfile/', $str)) {
	if($str && preg_match('/select|insert|update|delete|union|load_file|outfile/', $str)) {		
		js_a_l('參數錯誤：'.$str.'，參數中含有非法字串', 'back');exit;
	}
	if($type=='text') {
		$str = strip_tags( $str );
		return $str;
	}elseif($type=='content') {
		$str = htmlentities( $str, ENT_QUOTES ,"UTF-8");
		return $str;
	}elseif($type=='int') {
		if($str && !ereg ("^([0-9]){1,}$", $str)) {
			js_a_l('參數錯誤：'.$str.'，整數格式錯誤', 'back');exit;
		}
		return $str;
	}elseif($type=='number') {
		if($str && !is_numeric($str)) {
			js_a_l('參數錯誤：'.$str.'，數字格式錯誤', 'back');exit;
		}
		return $str;
	}elseif($type=='date') {
		$date = explode("-", $str);
		if(!checkdate($date[1], $date[2], $date[0])) {
			js_a_l('參數錯誤：'.$str.'，日期格式錯誤', 'back');exit;
		}
		return $str;
	}elseif($type=='email') {
		if(!is_email($str, true)) {
			return false;	
		}else {
			return $str;	
		}
	}elseif($type=='ip') {
		if($str && !ereg('^([0-9]{1,3}.){3}[0-9]{1,3}$',$str)) {
			js_a_l('IP格式錯誤', 'back');exit;
		}
	}
	//檢查文字長度
	if(strlen($str)>$len && $len>0) {
		js_a_l('"'.$str.'": 文字長度超過限制字數', 'back');exit;	
	}
}
function format_output($data) {
	if(is_array($data)) {
		if(count($data)>0) {
			foreach($data as $key => $value) {	
				$data[$key] = html_entity_decode(stripslashes($value));	
			}
		}
	}else {	
		$data = html_entity_decode(stripslashes($data));	
	}
	return $data;
}
//big5 string substr
function cnsubstr($str, $l2, $l3=0) {
  	$I2 = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
  	preg_match_all($I2, $str, $I3);
  	if (count($I3[0]) - $l3 > $l2) {
		return implode('',array_slice($I3[0], $l3, $l2))."...";
  	}
	return implode('',array_slice($I3[0], $l3, $l2));
}
//substr
function string_len($str) {
	$this->str_len = mb_strlen($str, "UTF-8");
}	
//編碼轉換
function big52utf8($str) {
	$blen = strlen($str);
	
	for($i=0; $i<$blen; $i++) {
	
		$sbit = ord(substr($str, $i, 1));
		//echo $sbit;
		//echo "<br>";
		if ($sbit < 129) {
			$this->out_string.=substr($str,$i,1);
		}elseif ($sbit > 128 && $sbit < 255) {
			$new_word = iconv("BIG5", "UTF-8", substr($str,$i,2));
			$this->out_string.=($new_word=="")?"?":$new_word;
			$i++;
		}
	}
	return $this->out_string;
}

//===================字串 To 16位元====================
/*function stringToHex ($s) {
  $r = "0x";
  $hexes = array ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");
  for (var $i=0; $i<strlen($s); $i++) {$r += $hexes [$s.charCodeAt($i) >> 4] + $hexes [$s.charCodeAt($i) & 0xf];}
  return $r;
}*/

//===================16位元 To 字串====================
/*function hexToString ($h) {
  $r = "";
  for (var $i= ($h.substr(0, 2)=="0x")?2:0; $i<strlen($h); $i+=2) {$r += $String.fromCharCode (parseInt ($h.substr (i, 2), 16));}
  return $r;
}*/
//===================get ip address====================
function get_real_ip(){   
	$ip=false;   
	   
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){   
		$ip=$_SERVER["HTTP_CLIENT_IP"];   
	}   
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   
		$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);   
		if ($ip) { array_unshift($ips, $ip); $ip=FALSE; }   
		for ($i=0; $i < count($ips); $i++) {   
			if (!eregi ("^(10|172.16|192.168).", $ips[$i])) {   
				$ip=$ips[$i];   
				break;   
			}   
		}   
	}   
	$ip = format_data($ip, 'ip');
	
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);   
} 
//===================youtube ID====================
function get_youtube_id($youtube) {
	$youtube = explode("//", $youtube);
	$youtube = explode("/", $youtube[count($youtube)-1]);
	$youtube_id = $youtube[count($youtube)-1];	
	
	return $youtube_id;
} 
//===================隨機產生亂碼====================
function auto_checksum($len){
	srand();
	$UpdateKey_a=array("2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Y","Z");
	for($i=0;$i<$len;$i++){
		$run=rand(0,count($UpdateKey_a)-1);
		$UpdateKey.=$UpdateKey_a[$run];
	}
	return $UpdateKey;
}
//===================3DES加解密程式(要加载mcrypt)====================
function encrypt($Mcrypt_Key, $toencrypt){  
	//加密用的key 
	$key = $Mcrypt_Key;  	
	//使用3DES方法加密 
	$encryptMethod = MCRYPT_TRIPLEDES; 	
	//初始化向量來增加安全性
	$iv = mcrypt_create_iv(mcrypt_get_iv_size($encryptMethod,MCRYPT_MODE_ECB), MCRYPT_RAND);  	
	//使用mcrypt_encrypt函數加密，MCRYPT_MODE_ECB表示使用ECB模式
	$encrypted_toencrypt = mcrypt_encrypt($encryptMethod, $key, $toencrypt, MCRYPT_MODE_ECB, $iv); 
	//回傳解密後字串
	return base64_encode($encrypted_toencrypt);  
}  

//解密函數撰寫
function decrypt($Mcrypt_Key, $todecrypt) {  
	//解密用的key，必須跟加密用的key一樣
	$key = $Mcrypt_Key;  	
	//解密前先解開base64碼
	$todecrypt = base64_decode($todecrypt);	
	//使用3DES方法解密
	$encryptMethod = MCRYPT_TRIPLEDES;  
	//初始化向量來增加安全性 
	$iv = mcrypt_create_iv(mcrypt_get_iv_size($encryptMethod,MCRYPT_MODE_ECB), MCRYPT_RAND);  	
	//使用mcrypt_decrypt函數解密，MCRYPT_MODE_ECB表示使用ECB模式  
	$decrypted_todecrypt = mcrypt_decrypt($encryptMethod, $key, $todecrypt, MCRYPT_MODE_ECB, $iv);
	//拿掉亂碼
	$decrypted_todecrypt = urlencode($decrypted_todecrypt);
	$decrypted_todecrypt = str_replace("%00", "", $decrypted_todecrypt);
	$decrypted_todecrypt = urldecode($decrypted_todecrypt);
	//回傳解密後字串
	return $decrypted_todecrypt;  
}  
?>