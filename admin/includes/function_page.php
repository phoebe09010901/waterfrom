<?php
//列表頁搜尋form
function search_form($array_search, $match_row, $query_string) {
	$query_string = explode('&', $query_string);
	?><form method="get" action="<?=$_SERVER['PHP_SELF']?>" name="search_form" id="search_form"><?php
	if(count($query_string)>0) {
		foreach($query_string as $value) {
			$value = explode("=", $value);	
			if($value[0]!='search_row' && $value[0]!='keywords' && $value[0]) {
			?><input type="hidden" name="<?=$value[0]?>" value="<?=$value[1]?>" /><?php	
			}
		}
	}
	if(count($array_search)>0) {
		?>
    	<div class="toolselect">
        <select name="search_row" id="search_row" class="selectstyle"><?php
		foreach($array_search as $key=>$value) {
			?><option value="<?=$key?>" <?php if($key==$match_row){echo 'selected';} ?>><?=$value?></option><?php	
		}
		?></select>
        </div>
		<?php
	}
	?>
    <div class="pages_search">
       <input type="text" name="keywords" placeholder="search..."  class="searchstyle"/>
	   <div class="btn icomoon" onclick="$('#search_form').submit()">q</div>
    </div>
	</form><?php	
}
//跳頁用function1
function change_page1($page_go, $page_all, $query_string, $query_string_value) {
	if(count($query_string) > 0) {
		foreach($query_string as $key => $value) {
			$url_string .= '&'.$query_string[$key].'='.$query_string_value[$key];
		}
	}
	
	//show the change function of page
	?><span class="f"><?php
	if($page_go==1){ ?>第一頁<?php } 
    else { 
		?><a href='<?=$_SERVER['PHP_SELF']?>?page_go=0<?=$url_string?>' class="f2">第一頁</a><?php
    } 
    ?>
     | 
    <?php 
    if($page_go==1){ ?>上一頁<?php } 
    else { 
		$t = $page_go; 
		?><a href='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$t?><?=$url_string?>' class="f2">上一頁</a><?php
	} 
	?>
	 | 
	<SELECT onChange="MM_jumpMenu('this',this,0)" name=select> 
		<?php 
        for ($i=1; $i<=$page_all; $i++) { 
       		?><OPTION value='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$i?><?=$url_string?>' <? if($page_go==$i){ echo "selected"; }?>><?=$i?></OPTION><?php
        } 
        ?>		
	</SELECT>
	 | 
	<?php 
	if($page_go==$page_all || $page_all<=1){ ?>下一頁<?php } 
	else { 
		$t = $page_go + 1; 
		?><a href='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$t?><?=$url_string?>' class="f2">下一頁</a><?php
	} 
	?>
	 | 
	<?php 
	if($page_go==$page_all || $page_all<=1){ ?>最後頁<?php } 
	else { 
		$t = $page_all - 1; 
		?><a href='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$t?><?=$url_string?>' class="f2">最後頁</a><?php
	} 
	?></span><?php
}
//跳頁用function2
function change_page2($page_go, $page_all, $query_string, $query_string_value) {
	if(count($query_string) > 0) {
		foreach($query_string as $key => $value) {
			$url_string .= '&'.$query_string[$key].'='.$query_string_value[$key];
		}
	}
	
	//show the change function of page
	$limit_page_num = 10;
	
	?><div class="mid_2"><?php
	?><table width="0" border="0" align="center" cellpadding="2" cellspacing="0"><tr><?php
	?><td><table width="0" border="0" cellpadding="3" cellspacing="0"><tr><td bgcolor="#7DA417"><?php
    if($page_go==1){ ?><a href="#" class="page">上一頁</a>&nbsp;&nbsp;<?php } 
    else { 
		$t = $page_go - 1; 
		?><a href="<?=$_SERVER['PHP_SELF']?>?page_go=<?=$t?><?=$url_string?>" class="page">上一頁</a>&nbsp;&nbsp;<?php
	}
	?></td></tr></table></td><?php
	if($page_all > 0) {
		if($page_all <= $limit_page_num) {
			$start_page = 1;
			$end_page   = $page_all;
		}elseif($page_all > $limit_page_num) {
			//設定開始頁數
			if($page_go-3 <= 1)
				$start_page = 1;
			elseif($page_go-3 > 1)
				$start_page = $page_go-3;
			//設定結束頁數
			if($page_go+3 >= $page_all)
				$end_page = $page_all;
			elseif($page_go+3 < $page_all)
				$end_page = $page_go+3;
			//echo $start_page.' / '.$end_page.' / '.$page_all."<br>";
			//調整顯示頁數
			if($end_page-$start_page+1 < $limit_page_num) {
				if($start_page - ($limit_page_num-($end_page-$start_page+1)) <= 1) {
					$end_page = $end_page + ($limit_page_num-($end_page-$start_page+1));
				}else {
					$start_page = $start_page - ($limit_page_num-($end_page-$start_page+1));
				}
			}
		}//echo $start_page.' / '.$end_page.' / '.$page_all;
		for ($i=$start_page; $i<=$end_page; $i++) { 
			?><td><table width="0" border="0" cellpadding="3" cellspacing="0"><tr><td bgcolor="#7DA417"><a href='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$i?><?=$url_string?>' class="page"><?=$i?></a></td></tr></table></td><?php
		}
	}
	?><td><table width="0" border="0" cellpadding="3" cellspacing="0"><tr><td bgcolor="#7DA417"><?php
	if($page_go==$page_all || $page_all<=1){ ?>&nbsp;&nbsp;<a href="#" class="page">下一頁</a><?php } 
	else { 
		$t = $page_go + 1; 
		?>&nbsp;&nbsp;<a href="<?=$_SERVER['PHP_SELF']?>?page_go=<?=$t?><?=$url_string?>" class="page">下一頁</a><?php
	}
	?></td></tr></table></td><?php
	?></tr></table><?php
	?></div><?php
}
//跳頁用function2
function change_page2_en($page_go, $page_all, $query_string, $query_string_value) {
	if(count($query_string) > 0) {
		foreach($query_string as $key => $value) {
			$url_string .= '&'.$query_string[$key].'='.$query_string_value[$key];
		}
	}
	
	//show the change function of page
	$limit_page_num = 10;
	
	?><div class="mid_2"><?php
	?><table width="0" border="0" align="center" cellpadding="2" cellspacing="0"><tr><?php
	?><td><table width="0" border="0" cellpadding="3" cellspacing="0"><tr><td bgcolor="#7DA417"><?php
    if($page_go==1){ ?><a href="#" class="page">Prev</a>&nbsp;&nbsp;<?php } 
    else { 
		$t = $page_go - 1; 
		?><a href="<?=$_SERVER['PHP_SELF']?>?page_go=<?=$t?><?=$url_string?>" class="page">Prev</a>&nbsp;&nbsp;<?php
	}
	?></td></tr></table></td><?php
	if($page_all > 0) {
		if($page_all <= $limit_page_num) {
			$start_page = 1;
			$end_page   = $page_all;
		}elseif($page_all > $limit_page_num) {
			//設定開始頁數
			if($page_go-3 <= 1)
				$start_page = 1;
			elseif($page_go-3 > 1)
				$start_page = $page_go-3;
			//設定結束頁數
			if($page_go+3 >= $page_all)
				$end_page = $page_all;
			elseif($page_go+3 < $page_all)
				$end_page = $page_go+3;
			//echo $start_page.' / '.$end_page.' / '.$page_all."<br>";
			//調整顯示頁數
			if($end_page-$start_page+1 < $limit_page_num) {
				if($start_page - ($limit_page_num-($end_page-$start_page+1)) <= 1) {
					$end_page = $end_page + ($limit_page_num-($end_page-$start_page+1));
				}else {
					$start_page = $start_page - ($limit_page_num-($end_page-$start_page+1));
				}
			}
		}//echo $start_page.' / '.$end_page.' / '.$page_all;
		for ($i=$start_page; $i<=$end_page; $i++) { 
			?><td><table width="0" border="0" cellpadding="3" cellspacing="0"><tr><td bgcolor="#7DA417"><a href='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$i?><?=$url_string?>' class="page"><?=$i?></a></td></tr></table></td><?php
		}
	}
	?><td><table width="0" border="0" cellpadding="3" cellspacing="0"><tr><td bgcolor="#7DA417"><?php
	if($page_go==$page_all || $page_all<=1){ ?>&nbsp;&nbsp;<a href="#" class="page">Next</a><?php } 
	else { 
		$t = $page_go + 1; 
		?>&nbsp;&nbsp;<a href="<?=$_SERVER['PHP_SELF']?>?page_go=<?=$t?><?=$url_string?>" class="page">Next</a><?php
	}
	?></td></tr></table></td><?php
	?></tr></table><?php
	?></div><?php
}
function change_page_jyc_s($page_go, $page_all, $page_num, $obj_all, $query_string) {
	$url_string = $query_string;
	?>
    <ul class="pages_top pages">
    	<li class="pageselect">
        <SELECT onChange="MM_jumpMenu('this',this,0)" class="selectstyle" name=select> 
			<?php 
            for ($i=1; $i<=$page_all; $i++) { 
                ?><OPTION value='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$i?><?=$url_string?>' <? if($page_go==$i){ echo "selected"; }?>><?=$i?></OPTION><?php
            } 
            ?>		
        </SELECT>
        </li>
    </ul>
    <?php
}
function change_page_jyc($page_go, $page_all, $page_num, $obj_all, $query_string) {	
	//show the change function of page
	$url_string     = $query_string;
	$limit_page_num = 10;
	?><ul class="statusbar pages borderleft"><?php
    if($page_go==1){ ?><a href="#"><li class="left icon">u</li></a><?php } 
    else { 
		$t = $page_go - 1; 
		?><a href="<?=$_SERVER['PHP_SELF']?>?page_go=<?=$t?><?=$url_string?>"><li class="left icon">u</li></a><?php
	}
	if($page_all > 0) {
		if($page_all <= $limit_page_num) {
			$start_page = 1;
			$end_page   = $page_all;
		}elseif($page_all > $limit_page_num) {
			//設定開始頁數
			if($page_go-3 <= 1)
				$start_page = 1;
			elseif($page_go-3 > 1)
				$start_page = $page_go-3;
			//設定結束頁數
			if($page_go+3 >= $page_all)
				$end_page = $page_all;
			elseif($page_go+3 < $page_all)
				$end_page = $page_go+3;
			//echo $start_page.' / '.$end_page.' / '.$page_all."<br>";
			//調整顯示頁數
			if($end_page-$start_page+1 < $limit_page_num) {
				if($start_page - ($limit_page_num-($end_page-$start_page+1)) <= 1) {
					$end_page = $end_page + ($limit_page_num-($end_page-$start_page+1));
				}else {
					$start_page = $start_page - ($limit_page_num-($end_page-$start_page+1));
				}
			}
		}//echo $start_page.' / '.$end_page.' / '.$page_all;
		for ($i=$start_page; $i<=$end_page; $i++) { 
			if($i==$page_go) {
				?><a href='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$i?><?=$url_string?>'><li class="left current"><?=$i?></li></a> <?php
			}else {
				?><a href='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$i?><?=$url_string?>'><li class="left"><?=$i?></li></a> <?php
			}
				$show_page = $i;
			
		}
	}
	if($page_go==$page_all || $page_all<=1){ ?><a href="#"><li class="left icon">w</li></a><?php } 
	else { 
		$t = $page_go + 1; 
		?><a href="<?=$_SERVER['PHP_SELF']?>?page_go=<?=$t?><?=$url_string?>"><li class="left icon">w</li></a><?php
	}
	//上一頁
    if($page_go==1){ $prev_url = '#'; } 
    else { 
		$t = $page_go - 1; 
		$prev_url = $_SERVER['PHP_SELF'].'?page_go='.$t.$url_string;
	} 
	//下一頁
	if($page_go==$page_all || $page_all<=1){ $next_url = '#'; } 
	else { 
		$t = $page_go + 1; 
		$next_url = $_SERVER['PHP_SELF'].'?page_go='.$t.$url_string;
	} 
	//from - to
	$from = ($obj_all>0)?($page_go-1)*$page_num+1:1;
	$to   = ($page_go!=$page_all)?$page_go*$page_num:$obj_all;
	?>
      <li class="pageselect">
      <SELECT onChange="MM_jumpMenu('this',this,0)" class="selectstyle" name=select> 
		<?php 
        for ($i=1; $i<=$page_all; $i++) { 
       		?><OPTION value='<?=$_SERVER['PHP_SELF']?>?page_go=<?=$i?><?=$url_string?>' <? if($page_go==$i){ echo "selected"; }?>><?=$i?></OPTION><?php
        } 
        ?>		
	  </SELECT>
      
      <div class="number">第<?=$page_go?>頁</div>
      <div class="arrow icomoon">s</div>
      </li>
      <li class="left"><div class="number"><?=$from?>-<?=$to?> of <?=$obj_all?>  <input name="prevpageButton" id="prevpageButton" type="button" value="<" onclick="location.href='<?=$prev_url?>'"/><input name="nextpageButton" id="nextpageButton" type="button" value=">" onclick="location.href='<?=$next_url?>'"/></div></li>
      <a href="javascript:history.go(-1)"><li class="right icon">Z</li></a>
   </ul>
    <?php
}
?>