<?php
header("content-type:text/html;charset=utf-8");
require_once('set.php');

$main_str   = 'orderlist';
$table_name = Proj_Name.'_'.$main_str;	

$show_year = ($show_year)?$show_year:date("Y");
?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=Console_Title?></title>
<?php include("include_head.php"); ?>
<!-- chart -->
<script type="text/javascript" src="../jqwidgets/jqxdata.js"></script> 
<script type="text/javascript" src="../jqwidgets/jqxchart.js"></script>
<!-- datatable -->
<script type="text/javascript" src="../jqwidgets/jqxdatatable.js"></script>
<script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>

<script type="text/javascript">
$(document).ready(function () {
	var theme = '<?=jqxStyle?>';
	//******************************
	//	月營業額表
	//******************************
	var source =
    {
		datatype: "json",
		datafields: [
			{ name: 'show_mon', type: 'string' },
			{ name: 'total_price_mon', type: 'float' }
		],
		url: 'analyze_data.php?type=year_chart&show_year=<?=$show_year?>'
    };
	var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
	// prepare jqxChart settings
    var settings = {
        title: "<?=Company_Name?>",
        description: "月營業額表",
        enableAnimations: true,
        showLegend: true,
        padding: { left: 5, top: 5, right: 5, bottom: 5 },
        titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
        source: dataAdapter,
        categoryAxis:
        {
            text: '月份',
            textRotationAngle: 0,
            dataField: 'show_mon',
            showTickMarks: true,
            tickMarksInterval: 1,
            tickMarksColor: '#888888',
            unitInterval: 1,
            showGridLines: false,
            gridLinesInterval: 1,
            gridLinesColor: '#888888',
            axisSize: 'auto'
        },
        colorScheme: 'scheme02',
        seriesGroups:
        [
        	{
                type: 'stackedcolumn',
                columnsGapPercent: 100,
                seriesGapPercent: 5,
                valueAxis:
                {
                    description: '營業額',
                    axisSize: 'auto',
                    tickMarksColor: '#888888'
                },
                series: [
                    { dataField: 'total_price_mon', displayText: '月份' }
            	]
        	}
    	]
    };
	$('#yearChart').jqxChart(settings);
	//	DataTable Start
	var source =
    {
		datatype: "json",
		datafields: [
			{ name: 'show_text', type: 'string' },
			{ name: 'mon01', type: 'string' },
			{ name: 'mon02', type: 'string' },
			{ name: 'mon03', type: 'string' },
			{ name: 'mon04', type: 'string' },
			{ name: 'mon05', type: 'string' },
			{ name: 'mon06', type: 'string' },
			{ name: 'mon07', type: 'string' },
			{ name: 'mon08', type: 'string' },
			{ name: 'mon09', type: 'string' },
			{ name: 'mon10', type: 'string' },
			{ name: 'mon11', type: 'string' },
			{ name: 'mon12', type: 'string' },
			{ name: 'total_year', type: 'string' }
		],
		url: 'analyze_data.php?type=year_DataTable&show_year=<?=$show_year?>'
    };
	var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
	$("#yearDataTable").jqxDataTable(
	{
    	width: '1010px',
		height: 60,
		theme: theme,
        source: dataAdapter,
        editable: true,
		columns: [
              { text: '月份', dataField: 'show_text', width: 100, align: 'center', cellsalign: 'center', editable: false, pinned: true },
              { text: '01', dataField: 'mon01', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '02', dataField: 'mon02', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '03', dataField: 'mon03', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '04', dataField: 'mon04', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '05', dataField: 'mon05', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '06', dataField: 'mon06', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '07', dataField: 'mon07', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '08', dataField: 'mon08', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '09', dataField: 'mon09', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '10', dataField: 'mon10', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '11', dataField: 'mon11', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '12', dataField: 'mon12', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '年累積', dataField: 'total_year', width: 70, align: 'center', cellsalign: 'center', editable: false }
        ],
	});
	
	//******************************
	//	日營業額表
	//******************************
	var source =
    {
		datatype: "json",
		datafields: [
			{ name: 'show_days', type: 'string' }<?php
			for($i=1; $i<=12; $i++) {
				while(strlen($i)<2)
					$i = '0'.$i;
				?>,{ name: 'total_price_<?=$i?>', type:'float' }<?php	
			}
			?>
		],
		url: 'analyze_data.php?type=month_chart&show_year=<?=$show_year?>'
    };
	var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
	// prepare jqxChart settings
    var settings = {
        title: "<?=Company_Name?>",
        description: "日營業額表",
        enableAnimations: true,
        showLegend: true,
        padding: { left: 5, top: 5, right: 5, bottom: 5 },
        titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
        source: dataAdapter,
        categoryAxis:
        {
            text: '日',
            textRotationAngle: 0,
            dataField: 'show_days',
            showTickMarks: true,
            tickMarksInterval: 1,
            tickMarksColor: '#888888',
            unitInterval: 1,
            showGridLines: false,
            gridLinesInterval: 1,
            gridLinesColor: '#888888',
            axisSize: 'auto'
        },
        colorScheme: 'scheme02',
        seriesGroups:
        [
        	{
                type: 'line',
                columnsGapPercent: 100,
                seriesGapPercent: 5,
                valueAxis:
                {
                    description: '營業額',
                    axisSize: 'auto',
                    tickMarksColor: '#888888'
                },
                series: [
                    <?php
					for($i=1; $i<=12; $i++) {
						while(strlen($i)<2)
							$i = '0'.$i;
						?>{ dataField: 'total_price_<?=$i?>', displayText:'<?=$i?>月', greyScale: true }<?php	
						if($i!=12)
							echo ",";
					}
					?>
            	]
        	}
    	]
    };
	//$('#monthChart').jqxChart(settings);
	//各月份
	<?php
	for($mon=1; $mon<=12; $mon++) {
		while(strlen($mon)<2)	
			$mon = '0'.$mon;
		?>
	//<?=$i?>月單月圖表
	var source =
    {
		datatype: "json",
		datafields: [
			{ name: 'show_days', type: 'string' },
			{ name: 'total_price_<?=$mon?>', type:'float' }
		],
		url: 'analyze_data.php?type=month_chart2&show_year=<?=$show_year?>&show_mon=<?=$mon?>'
    };
	var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
	// prepare jqxChart settings
    var settings = {
        title: "<?=Company_Name?>",
        description: "日營業額表",
        enableAnimations: true,
        showLegend: true,
        padding: { left: 5, top: 5, right: 5, bottom: 5 },
        titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
        source: dataAdapter,
        categoryAxis:
        {
            text: '日',
            textRotationAngle: 0,
            dataField: 'show_days',
            showTickMarks: true,
            tickMarksInterval: 1,
            tickMarksColor: '#888888',
            unitInterval: 1,
            showGridLines: false,
            gridLinesInterval: 1,
            gridLinesColor: '#888888',
            axisSize: 'auto'
        },
        colorScheme: 'scheme<?=$mon?>',
        seriesGroups:
        [
        	{
                type: 'line',
                columnsGapPercent: 100,
                seriesGapPercent: 5,
                valueAxis:
                {
                    description: '營業額',
                    axisSize: 'auto',
                    tickMarksColor: '#888888'
                },
                series: [
                    { dataField: 'total_price_<?=$mon?>', displayText:'<?=$mon?>月' }
            	]
        	}
    	]
    };
	$('#monthChart_<?=$mon?>').jqxChart(settings);
		<?php
	}
	?>
	//	DataTable Start
	var source =
    {
		datatype: "json",
		datafields: [
			{ name: 'month_id', type: 'string' },
			{ name: 'show_text', type: 'string' },
			{ name: 'show_chart', type: 'bool' },
			{ name: 'day01', type: 'string' },
			{ name: 'day02', type: 'string' },
			{ name: 'day03', type: 'string' },
			{ name: 'day04', type: 'string' },
			{ name: 'day05', type: 'string' },
			{ name: 'day06', type: 'string' },
			{ name: 'day07', type: 'string' },
			{ name: 'day08', type: 'string' },
			{ name: 'day09', type: 'string' },
			{ name: 'day10', type: 'string' },
			{ name: 'day11', type: 'string' },
			{ name: 'day12', type: 'string' },
			{ name: 'day13', type: 'string' },
			{ name: 'day14', type: 'string' },
			{ name: 'day15', type: 'string' },
			{ name: 'day16', type: 'string' },
			{ name: 'day17', type: 'string' },
			{ name: 'day18', type: 'string' },
			{ name: 'day19', type: 'string' },
			{ name: 'day20', type: 'string' },
			{ name: 'day21', type: 'string' },
			{ name: 'day22', type: 'string' },
			{ name: 'day23', type: 'string' },
			{ name: 'day24', type: 'string' },
			{ name: 'day25', type: 'string' },
			{ name: 'day26', type: 'string' },
			{ name: 'day27', type: 'string' },
			{ name: 'day28', type: 'string' },
			{ name: 'day29', type: 'string' },
			{ name: 'day30', type: 'string' },
			{ name: 'day31', type: 'string' },
			{ name: 'total_mon', type: 'string' }
		],
        id: 'month_id',
		url: 'analyze_data.php?type=month_DataTable&show_year=<?=$show_year?>'
    };
	var dataAdapter = new $.jqx.dataAdapter(source, { async: false, autoBind: true, loadError: function (xhr, status, error) { alert('Error loading "' + source.url + '" : ' + error); } });
	$("#monthDataTable").jqxDataTable(
	{
    	width: '90%',
		height: 375,
		theme: theme,
        source: dataAdapter,
        editable: true,
		columns: [
              { text: '月份', dataField: 'show_text', width: 100, align: 'center', cellsalign: 'center', editable: false, pinned: true },
              { text: '01', dataField: 'day01', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '02', dataField: 'day02', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '03', dataField: 'day03', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '04', dataField: 'day04', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '05', dataField: 'day05', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '06', dataField: 'day06', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '07', dataField: 'day07', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '08', dataField: 'day08', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '09', dataField: 'day09', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '10', dataField: 'day10', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '11', dataField: 'day11', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '12', dataField: 'day12', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '13', dataField: 'day13', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '14', dataField: 'day14', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '15', dataField: 'day15', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '16', dataField: 'day16', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '17', dataField: 'day17', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '18', dataField: 'day18', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '19', dataField: 'day19', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '20', dataField: 'day20', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '21', dataField: 'day21', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '22', dataField: 'day22', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '23', dataField: 'day23', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '24', dataField: 'day24', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '25', dataField: 'day25', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '26', dataField: 'day26', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '27', dataField: 'day27', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '28', dataField: 'day28', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '29', dataField: 'day29', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '30', dataField: 'day30', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '31', dataField: 'day31', width: 70, align: 'center', cellsalign: 'center', editable: false },
              { text: '月累積', dataField: 'total_mon', width: 70, align: 'center', cellsalign: 'center', editable: false }
        ],
	});
	var groups = $('#monthChart').jqxChart('seriesGroups');
	$("#monthDataTable").on('cellendedit', function (event) {
		var column     = args.datafield;
		var columntype = args.columntype;
		var row        = args.rowindex;
		var value      = args.value;
		if(columntype=='checkbox') {
			var dataRecord = $("#monthDataTable").jqxDataTable('getrowdata', row);
			var show_chart = dataRecord.month_id - 1;
			if(value==true) {
				$('#monthChart_'+dataRecord.month_id).show('slow');
				$('#monthChart_'+dataRecord.month_id).jqxChart('refresh');
				value = false;
			}else if(value==false) {
				$('#monthChart_'+dataRecord.month_id).hide();
				value = true;
			}
			//groups[0].series[show_chart].greyScale = value;
			//$('#monthChart').jqxChart({ enableAnimations: false });
           // $('#monthChart').jqxChart('refresh');
		}
	});	
});
</script>
</head>
<body>
<?php include("include_top.php"); ?>
<div class="admin-panel">
  <?php include("include_menu.php"); ?><!--slidebar end-->
  <div class="main set_page_h page_shadow">
   <?php $obj_drawpage->drawPageWelcome($page_subtitle); ?>
   <div class="mainContent">
   	 <div id="data_content">
   		<div class="template_black">
        <form method="post" action="pos_handle.php" name="list_form" id="list_form">
        <input type="hidden" name="action" id="action" value="order">
          <table width="100%"  cellspacing="2" cellpadding="0" border="0">
              <tr>
              	<td style="width:80px">查看年度：</td>
              	<td colspan="3"><select name="select_year" onChange="MM_jumpMenu('this',this,0)"><?php
                for($i=date("Y")-2; $i<=date("Y"); $i++) {
                    ?><option value="<?=$_SERVER['PHP_SELF']?>?show_year=<?=$i?>" <?php if($i==$show_year){echo 'selected';} ?>><?=$i?></option><?php	
                }
                ?>        
                </select></td>
              </tr>
              <tr>
              	<td colspan="4"><div id='yearChart' style="margin: 0px auto; width:90%; height:300px"></div><br><div id="yearDataTable" style="margin: 0px auto;"></div><br></td>
              </tr>
              <tr>
              	<td colspan="4"><div id='monthChart' style="margin: 0px auto; width:90%; height:300px; display:none;"></div>
                <?php
				for($i=1; $i<=12; $i++) {
					while(strlen($i)<2)	
						$i = '0'.$i;
					?><div id='monthChart_<?=$i?>' style="margin: 0px auto; width:90%; height:200px;"></div><?php
				}
				?>
                <br><div id="monthDataTable" style="margin: 0px auto;"></div></td>
              </tr>
        </table>
        </form>
      </div>
    </div><!--content end-->
    <?php include("include_footer.php"); ?>
   </div><!--mainContent end-->
  </div><!--main end-->
</div><!--admin-panel end-->

</body>
</html>