<?php
class jqx {
	private $twzipcode_url;
	private $cnregion_url;
	//construct
	public function __construct() {	
		$this->twzipcode_url = Host_Name.'twzipcode_data.php';
		$this->cnregion_url  = 'cnregion_data.php';
	}
	
	//下拉式縣市選單
	/*public function twzipcode($twzipcode_id, $input_value) {
		$input_value = ($input_value)?$input_value:0;
		//twzipcode start
		echo 'var url = "'.$this->twzipcode_url.'";';
		// prepare the data
		echo 'var source =
		{
			datatype: "json",
			datafields: [
				{ name: \'label\' },
				{ name: \'value\' }
			],
			id: \'zipcode\',
			url: url,
			async: false
		};';
		echo 'var dataAdapter = new $.jqx.dataAdapter(source);';
		echo 'var to_index;';
		echo '$("#'.$twzipcode_id.'").jqxDropDownList({ selectedIndex: 0, source: dataAdapter, displayMember: "label", valueMember: "value", width: 200, height: 25, theme: theme, renderer: function (index, label, value) {';
		echo '	if(value=='.$input_value.') { to_index = index; }';
		echo '	return label;';
		echo '}});';
		echo '$("#'.$twzipcode_id.'").jqxDropDownList("selectIndex", to_index);';
		echo '$("#'.$twzipcode_id.'").jqxDropDownList("ensureVisible", to_index);';
		echo '$("#'.$twzipcode_id.'").after(\'<input type="hidden" name="'.$twzipcode_id.'" id="input_'.$twzipcode_id.'" value="'.$input_value.'" />\');';
		echo '$("#'.$twzipcode_id.'").on(\'select\', function (event) {
			if (event.args) {
				var args = event.args;
				var value = args.item.value;//alert(value);
				$("#input_'.$twzipcode_id.'").val(value);
			}
		});';
	}*/
	public function twzipcode($div_id, $zipcode_id, $county_id, $area_id, $zipcode_value, $county_value, $area_value) {
		global $twzipcode;
		
		if(!$county_value)
			$county_value = $twzipcode[$zipcode_value]['county'];
		if(!$area_value)
			$area_value = $twzipcode[$zipcode_value]['area'];
		echo 'function get_county_list(zipcode_id, county_id, area_id, zipcode_value, county_value, area_value) {
				$("#'.$div_id.'").before(\'<input type="text" name="'.$zipcode_id.'" id="input_'.$zipcode_id.'" value="'.$zipcode_value.'" style="width:75px; float:left;" />\');
				$("#'.$div_id.'").before(\'<input type="hidden" name="'.$county_id.'" id="input_'.$county_id.'" value="'.$county_value.'" style="width:75px; float:left;" />\');
				$("#'.$div_id.'").before(\'<input type="hidden" name="'.$area_id.'" id="input_'.$area_id.'" value="'.$area_value.'" style="width:75px; float:left;" />\');
				$("#'.$div_id.'").before(\'<div id="'.$county_id.'" /></div>\');
				$("#'.$county_id.'").css("float", "left");
				$("#'.$div_id.'").before(\'<div id="'.$area_id.'" /></div>\');
				$("#'.$area_id.'").after("<br>");
				
				var url = "'.Host_Name.'twzipcode_data.php?action=getCounty";
				var source =
				{
					datatype: "json",
					datafields: [
						{ name: \'label\' },
						{ name: \'value\' }
					],
					url: url,
					async: false
				};
				var dataAdapter = new $.jqx.dataAdapter(source);
				var to_index;
				$("#"+county_id).jqxDropDownList({ selectedIndex: 0, source: dataAdapter, displayMember: "label", valueMember: "value", width: 200, height: 25, theme: theme, renderer: function (index, label, value) {	
					if(value==county_value) { to_index = index; }	
					return label;
				}});
				$("#"+county_id).jqxDropDownList("selectIndex", to_index);
				$("#"+county_id).jqxDropDownList("ensureVisible", to_index);
				$("#"+county_id).on("select", function (event) {
					if (event.args) {
						var args   = event.args;
						var county = args.item.value;
						$("#input_"+county_id).val(county);
						get_area_list(zipcode_id, county_id, area_id, zipcode_value, county, area_value);
					}
				});
			}
			function get_area_list(zipcode_id, county_id, area_id, zipcode_value, county_value, area_value) {
				var url = "'.Host_Name.'twzipcode_data.php?action=getArea&county="+county_value;
				var source =
				{
					datatype: "json",
					datafields: [
						{ name: \'label\' },
						{ name: \'value\' }
					],
					url: url,
					async: false
				};
				var dataAdapter = new $.jqx.dataAdapter(source);
				var to_index;
				$("#"+area_id).jqxDropDownList({ selectedIndex: 0, source: dataAdapter, displayMember: "label", valueMember: "value", width: 200, height: 25, theme: theme, renderer: function (index, label, value) {	
					if(label==area_value) { to_index = index; }	
					return label;
				}});
				$("#"+area_id).jqxDropDownList("selectIndex", to_index);
				$("#"+area_id).jqxDropDownList("ensureVisible", to_index);
				
				$("#"+area_id).on("select", function (event) {
					if (event.args) {
						var args    = event.args;
						var area    = args.item.label;
						var zipcode = args.item.value;
						$("#input_"+area_id).val(area);
						$("#input_"+zipcode_id).val(zipcode);
					}
				});
			}
			get_county_list("'.$zipcode_id.'", "'.$county_id.'", "'.$area_id.'", "'.$zipcode_value.'", "'.$county_value.'", "'.$area_value.'");
			get_area_list("'.$zipcode_id.'", "'.$county_id.'", "'.$area_id.'", "'.$zipcode_value.'", "'.$county_value.'", "'.$area_value.'");';
	}
	//大陸地區選單
	public function cnregion($region_id, $input_value1, $input_value2, $input_value3) {
		$input_value1 = ($input_value1)?$input_value1:0;
		$input_value2 = ($input_value2)?$input_value2:0;
		$input_value3 = ($input_value3)?$input_value3:0;
		
		echo 'function get_cnregion_data(region_id, lv, parent_id, input_value) {
			var url = "cnregion_data.php?action=get_region&lv="+lv+"&parent_id="+parent_id;
			var source =
			{
				datatype: "json",
				datafields: [
					{ name: \'label\' },
					{ name: \'value\' },
					{ name: \'lv\' }
				],
				id: region_id,
				url: url,
				async: false
			};
			var dataAdapter = new $.jqx.dataAdapter(source);
			var to_index;
			$("#"+region_id+lv).jqxDropDownList({ selectedIndex: 0, source: dataAdapter, displayMember: "label", valueMember: "value", width: 200, height: 25, theme: theme, renderer: function (index, label, value) {	
				if(value==input_value) { to_index = index; }	
				return label;
			}});
			$("#"+region_id+lv).jqxDropDownList("selectIndex", to_index);
			$("#"+region_id+lv).jqxDropDownList("ensureVisible", to_index);
			$("#"+region_id+lv).on(\'select\', function (event) {
				if (event.args) {
					var args      = event.args;
					var parent_id = args.item.value;
					//取得 region 階層
					var url = "cnregion_data.php?action=get_lv&region_id="+parent_id;
					$.ajax({
						url: url,
						type: \'GET\',
						dataType: \'json\',
						processData: true,
						success: function(request){
							var cnregion_info = request;
							$.each(cnregion_info, function(key, value){
								$.each(value, function(key1, value1){	
									$.each(value1, function(key2, value2){	
										if(value2==1) {
											lv = parseInt(value2) + 1;
											get_cnregion_data(region_id, lv, parent_id);
											lv = parseInt(lv) + 1;
											get_cnregion_data(region_id, lv, 0);
										}else if(value2==2) {
											lv = parseInt(value2) + 1;
											get_cnregion_data(region_id, lv, parent_id);
										}
									});
								});
							});
						},
						error: function(xhr, tStatus, err){alert(\'Ajax 發生錯誤，\'+xhr.responseText +\'\n\n請與網站工程師連絡\');}
					});	
				}
			});
		}';
		echo 'get_cnregion_data("'.$region_id.'", 1, 1, '.$input_value1.');';
        echo 'get_cnregion_data("'.$region_id.'", 2, '.$input_value1.', '.$input_value2.');'; 
        echo 'get_cnregion_data("'.$region_id.'", 3, '.$input_value2.', '.$input_value3.');'; 
	}
	//datepicker
	public function datepicker($datepicker_id, $input_date) {		
		if(!$input_date || $input_date=='0000-00-00') {
			$input_date = date("Y-m-d");	
		}
		$temp_date = explode("-", $input_date);
		$year  = $temp_date[0];
		$month = $temp_date[1];
		$tmp_m = $month - 1;
		$day   = $temp_date[2];
		
		echo 'var date = new Date();';
		echo 'date.setFullYear('.$year.', '.$tmp_m.', '.$day.');';
		echo '$(\'#'.$datepicker_id.'\').jqxDateTimeInput({ culture: \'400px\', height: 22, value: $.jqx._jqxDateTimeInput.getDateTime(date), formatString: \'yyyy-MM-dd\', culture: \'zh-TW\', theme: theme });';
		echo '$(\'#'.$datepicker_id.'\').on(\'valueChanged\', function (event) {
				var date = event.args.date;
				//$(\'#input_'.$datepicker_id.'\').val(date);
				var tmp_date = date.toDateString().split(" ");
				switch(tmp_date[1]) {
					case "Jan":
						tmp_date[1] = "01";
						break;
					case "Feb":
						tmp_date[1] = "02";
						break;
					case "Mar":
						tmp_date[1] = "03";
						break;
					case "Apr":
						tmp_date[1] = "04";
						break;
					case "May":
						tmp_date[1] = "05";
						break;
					case "Jun":
						tmp_date[1] = "06";
						break;
					case "Jul":
						tmp_date[1] = "07";
						break;
					case "Aug":
						tmp_date[1] = "08";
						break;
					case "Sep":
						tmp_date[1] = "09";
						break;
					case "Oct":
						tmp_date[1] = "10";
						break;
					case "Nov":
						tmp_date[1] = "11";
						break;
					case "Dec":
						tmp_date[1] = "12";
						break;
				}
				var format_date = tmp_date[3]+"-"+tmp_date[1]+"-"+tmp_date[2];
				$(\'#input_'.$datepicker_id.'\').val(format_date);
			});';
		echo '$(\'#'.$datepicker_id.'\').after(\'<input type="hidden" name="'.$datepicker_id.'" id="input_'.$datepicker_id.'" value="'.$input_date.'" />\');';
		echo '$(\'#'.$datepicker_id.'\').after(\'(點日曆表頭一次切換月/二次切換年)\');';
	}
}
?>