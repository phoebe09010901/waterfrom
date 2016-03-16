<!DOCTYPE html>
<?php		
	if(!$_GET["windowX"]) {	
?>	
<script src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
		location.href = "?<?=$QUERY_STRINGO?>windowX=" + $(window).width() + "&windowY=" + $(window).height(); 
</script>		
<?php	
		exit;	
	}	
?>

<script src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){		
  
	$(window).resize(function() {
        location.href = "?<?=$QUERY_STRINGO?>windowX=" + $(window).width() + "&windowY=" + $(window).height(); 
    });
	
});
</script>