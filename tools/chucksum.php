<?php
// ABOUT
// =======================================================
// imageCheck_zz 影象數字產生器 ver:0.2
// made by zenon blue,December 2006
// last modify 2007/07/25
// http://bluezz.tw/mybook/content.php?id=458
// service@bluezz.com.tw
// =======================================================
include('../set.php');

function set_counter_img($sum){ 

	// 設定亂數種子
	mt_srand((double)microtime()*1000000);
	
	for($i=0;$i < strlen($sum) ;$i++){
		$src = Root_Path."images/check_code/". substr($sum,$i,1) .".png";		//找圖檔 
		$srcSize = getImageSize($src);
		$srcImage = ImageCreateFromPNG($src);
		$null = Root_Path."images/check_code/null.png";	//空白
		$nullImage = ImageCreateFromPNG($null);
		if($i==0){
			$destSize[0]=$srcSize[0] * strlen($sum) ;
			$destSize[1]=$srcSize[1];			
			$rcImage=ImageCreate($destSize[0],$destSize[1]);
			$white=imageColorAllocate($rcImage, 255, 239, 239);
			//$black=imageColorAllocate($rcImage,0,0,255);
			// 干擾線條
			for($j=0;$j<20;$j++) {
				$black=imageColorAllocate($rcImage, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
				//Imagearc($rcImage,rand(0, $destSize[0]), rand(0,$destSize[1]), rand(0, $destSize[0]*5), rand(0, $destSize[1]*3), 0, 360, $black);
				imageline($rcImage, rand(0, $destSize[0]), rand(0,$destSize[1]), rand(0, $destSize[0]*5), rand(0, $destSize[1]*3), $black);
			}
			// 干擾像素
			for($j=0;$j<100;$j++){				
				$black=imageColorAllocate($rcImage, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
			    imagesetpixel($rcImage, rand()%$destSize[0], rand()%$destSize[1] , $black);
			}
		}		
		//ImageCopyResized($rcImage, $srcImage, $srcSize[0] * $i + rand(0,3), rand(0,$srcSize[0]/4), 0, 0,rand($srcSize[0]/4 * 3 ,$srcSize[0]),rand($srcSize[1]/4 * 3,$srcSize[1]),$srcSize[0],$srcSize[1]);
		//ImageCopyResampled($rcImage, $srcImage, $srcSize[0] * $i + rand(0,3), rand(0, $srcSize[0]/4), 0, 0, rand($srcSize[0]/4 * rand(1,7), $srcSize[0]), rand($srcSize[1]/4 * rand(2,7), $srcSize[1]), $srcSize[0], $srcSize[1]);
		ImageCopyResampled($rcImage, $srcImage, $srcSize[0] * $i + rand(0,3), rand(0, $srcSize[0]/4), 0, 0, rand($srcSize[0]/4 * 3, $srcSize[0]), rand($srcSize[1]/4 * 3, $srcSize[1]), $srcSize[0], $srcSize[1]);
		imagedestroy($srcImage);
	}
	
	return imagePng($rcImage);
}

$s_checksum = format_data($_GET['s_checksum'], 'text');
echo set_counter_img($s_checksum);
?>