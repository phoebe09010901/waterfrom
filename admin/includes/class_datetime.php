<?php
class adjustdatetime {	
	public $newdate;
	public $days;
	public $hours;
	//construct
	function __construct() {
	}
	
	//該時區正確時間
	public function time_zone($format_data, $time_zone) {
		$time_zone = $time_zone - 8;	//修正為以台灣server為主的時間
		$time_zone = explode(".", $time_zone);
		$time_zone1 = $time_zone[0];
		$time_zone2 = '0.'.$time_zone[1];
		
		return date($format_data, mktime(date("H")+$time_zone1, date("i")+60*$time_zone2, date("s"), date("m"), date("d"), date("Y")));
	}	
	//計算兩個日期相差天數
	public function twodate_days($fromdate, $todate) {
		$fromdate = explode("-", $fromdate);
		$todate   = explode("-", $todate);
		$date1    = mktime(0, 0, 0, $fromdate[1], $fromdate[2], $fromdate[0]);
		$date2    = mktime(0, 0, 0, $todate[1], $todate[2], $todate[0]);
		
		$total_secs  = $date2 - $date1;
		$this->days  = $total_secs / 60 / 60 / 24;
		$this->hours = $total_secs / 60 / 60;
	}
	//計算加上天數後的日期
	public function adddays_date($fromdate, $years, $months, $days) {
		$fromdate = explode("-", $fromdate);
		
		$this->newdate = date("Y-m-d", mktime(0, 0, 0, $fromdate[1]+$months, $fromdate[2]+$days, $fromdate[0]+$years));
	}
	//農民曆
	public function chinacalendar1() {
		echo '<script language="JavaScript"><!--
		function CalConv(){
			FIRSTYEAR = 1998;
			LASTYEAR = 2031;
			today = new Date();
			SolarYear = today.getFullYear();
			SolarMonth = today.getMonth() + 1;
			SolarDate = today.getDate();
			Weekday = today.getDay();
			LunarCal = [	
				new tagLunarCal( 27, 5, 3, 43, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 0, 1 ),		
				new tagLunarCal( 46, 0, 4, 48, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1 ), /* 1999 */		
				new tagLunarCal( 35, 0, 5, 53, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1 ), /* 2000 */		
				new tagLunarCal( 23, 4, 0, 59, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1 ),		
				new tagLunarCal( 42, 0, 1, 4, 1, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1 ),		
				new tagLunarCal( 31, 0, 2, 9, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0 ),		
				new tagLunarCal( 21, 2, 3, 14, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1 ), /* 2004 */		
				new tagLunarCal( 39, 0, 5, 20, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1 ),		
				new tagLunarCal( 28, 7, 6, 25, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 1 ),		
				new tagLunarCal( 48, 0, 0, 30, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1 ),		
				new tagLunarCal( 37, 0, 1, 35, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1 ), /* 2008 */		
				new tagLunarCal( 25, 5, 3, 41, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1 ),		
				new tagLunarCal( 44, 0, 4, 46, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1 ),		
				new tagLunarCal( 33, 0, 5, 51, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1 ),		
				new tagLunarCal( 22, 4, 6, 56, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0 ), /* 2012 */		
				new tagLunarCal( 40, 0, 1, 2, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0 ),		
				new tagLunarCal( 30, 9, 2, 7, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1 ),		
				new tagLunarCal( 49, 0, 3, 12, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 0, 1 ),		
				new tagLunarCal( 38, 0, 4, 17, 1, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0 ), /* 2016 */		
				new tagLunarCal( 27, 6, 6, 23, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1 ),		
				new tagLunarCal( 46, 0, 0, 28, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0 ),		
				new tagLunarCal( 35, 0, 1, 33, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0 ),		
				new tagLunarCal( 24, 4, 2, 38, 0, 1, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1 ), /* 2020 */		
				new tagLunarCal( 42, 0, 4, 44, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1 ),		
				new tagLunarCal( 31, 0, 5, 49, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0 ),		
				new tagLunarCal( 21, 2, 6, 54, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1 ),		
				new tagLunarCal( 40, 0, 0, 59, 0, 1, 0, 0, 1, 0, 1, 1, 0, 1, 1, 0, 1 ), /* 2024 */		
				new tagLunarCal( 28, 6, 2, 5, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 0 ),		
				new tagLunarCal( 47, 0, 3, 10, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1 ),		
				new tagLunarCal( 36, 0, 4, 15, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 1 ),		
				new tagLunarCal( 25, 5, 5, 20, 1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0 ), /* 2028 */		
				new tagLunarCal( 43, 0, 0, 26, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1 ),		
				new tagLunarCal( 32, 0, 1, 31, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 0 ),		
				new tagLunarCal( 22, 3, 2, 36, 0, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 1, 0 )
			];
			
			/* 西曆年每月之日數 */
			SolarCal = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];
			/* 西曆年每月之累積日數, 平年與閏年 */
			SolarDays = [
				0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334, 365, 396,
				0, 31, 60, 91, 121, 152, 182, 213, 244, 274, 305, 335, 366, 397
			];
			AnimalIdx = ["馬 ", "羊 ", "猴 ", "雞 ", "狗 ", "豬 ", "鼠 ", "牛 ", "虎 ", "兔 ", "龍 ", "蛇 "];	
			LocationIdx = [ "南", "東", "北", "西"];	
			if ( SolarYear<= FIRSTYEAR || SolarYear> LASTYEAR ) return 1;	
			sm = SolarMonth - 1;	
			if ( sm< 0 || sm> 11 ) return 2;	
			leap = GetLeap( SolarYear );	
			if ( sm == 1 )
				d = leap + 28;
			else
				d = SolarCal[sm];
			if ( SolarDate< 1 || SolarDate> d ) return 3;
			y        = SolarYear - FIRSTYEAR;
			acc      = SolarDays[ leap*14 + sm ] + SolarDate;	
			kc       = acc + LunarCal[y].BaseKanChih;	
			Kan      = kc % 10;	
			Chih     = kc % 12;
			Location = LocationIdx[kc % 4];
		
			Age = kc % 60;
		
			if ( Age < 22 )
				Age = 22 - Age;
			else
				Age = 82 - Age;
		
			Age = Age + 3;
		
			if (Age < 10)
				Age = Age+60;
		
			Animal = AnimalIdx[Chih ];
		
			if ( acc<= LunarCal[y].BaseDays ) {
				y--;		
				LunarYear = SolarYear - 1;		
				leap = GetLeap( LunarYear );		
				sm += 12;		
				acc = SolarDays[leap*14 + sm] + SolarDate;
			}else
				LunarYear = SolarYear;
			l1 = LunarCal[y].BaseDays;	
			for ( i=0; i<13; i++ ) {	
				l2 = l1 + LunarCal[y].MonthDays[i] + 29;	
				if ( acc<= l2 ) break;	
				l1 = l2;
			}
			LunarMonth = i + 1;	
			LunarDate  = acc - l1;	
			im         = LunarCal[y].Intercalation;
			if ( im != 0 &&LunarMonth>im ) {
				LunarMonth--;
				if ( LunarMonth == im ) LunarMonth = -im;
			}
			if ( LunarMonth> 12 ) LunarMonth -= 12;
			//show 農民曆
			document.write( "<center><font size=2 color=\'ff00ff\'>西元 " + SolarYear + "年" + SolarMonth + "月" + SolarDate + "日<br>" );	
			document.write( "農曆 " + LunarMonth + "月 " + LunarDate + "日<br>" );	
			document.write( "煞" + Location + " - 沖" + Animal + Age + " 歲</font></center>" );	
			return 0;
		}
		
		/* 求此西曆年是否為閏年, 返回 0 為平年, 1 為閏年 */
		function GetLeap( year ){
			if ( year % 400 == 0 )	
				return 1;	
			else if ( year % 100 == 0 )	
				return 0;	
			else if ( year % 4 == 0 )	
				return 1;	
			else	
				return 0;
		}
		
		function tagLunarCal( d, i, w, k, m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12, m13) {
			this.BaseDays = d; /* 到西曆 1 月 1 日到農曆正月初一的累積日數 */	
			this.Intercalation = i; /* 閏月月份. 0==此年沒有閏月 */	
			this.BaseWeekday = w; /* 此年西曆 1 月 1 日為星期幾再減 1 */	
			this.BaseKanChih = k; /* 此年西曆 1 月 1 日之干支序號減 1 */	
			this.MonthDays = [ m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12, m13 ];/* 此農曆年每月之大小, 0==小月(29日), 1==大月(30日) */
		}
		CalConv();
		//--></script>';	
	}
	public function chinacalendar2() {
		echo '<style type="text/css">#mort_cal_1 br {display:none;}</style><div style="width: 170px;text-align:center;"><div style="border:1px solid #000;background-color:#fefefe;padding: 0px 0px;margin: 0px 0px;align:center;text-align:center;overflow:hidden;"><div id="xcolor1_1" style="font-size:12px;color:#173a00;line-height:16px;font-family: arial; font-weight:bold;background:#94abf0;padding: 3px 1px;text-align:center;"><a href="http://www.bestday123.com/" alt="黃道吉日黃曆農曆" title="黃道吉日黃曆農曆" id="goodday_link" style="color:#000000;font-size:14px;text-decoration:none;line-height:16px;font-family: arial;" ><imgsrc="http://www.bestday123.com/day.gif" border="0" style="margin:0;padding:0;border:0;" />黃道吉日黃曆農曆</a></div><script type="text/javascript" src="http://www.bestday123.com/z.php"></script></div><a href="http://www.bestday123.com/" alt="黃道吉日黃曆農曆" title="黃道吉日黃曆農曆" id="goodday_link2" style="font-size:12px;text-decoration:none;line-height:16px;font-family: arial;align:center;" >黃道吉日查詢</a></div>';	
	}
}
?>