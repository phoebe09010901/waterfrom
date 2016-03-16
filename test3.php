<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="js_new/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  alert($('.wapper_01').height());
});
</script>
<style>
.wapper_01 { width:300px; height:300px; }
</style>
</head>
<body>
<div class="wapper_01">
<p>文档的高度是 <span id="span2">unknown</span> px。</p>
<button class="btn1">获得高度</button>
<p>在本例中，窗口和文档的高度是相同的，因为它们在 iframe 中显示。</p>
</div>
</body>
</html>
