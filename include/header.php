<!DOCTYPE html>
<html lang="de">
<head>

	<title><?=$title?> <?=@$MovieDetail['c00']?><?=@$SerieDetail[0]['c00']?></title>
	<link rel="shortcut icon" type="image/x-icon" href="./gfx/css/images/favicon.ico" />
	<?php include("./gfx/css/style.css.php");?>
	<link rel="stylesheet" href="./gfx/css/dhtmlxcalendar.css" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="./gfx/css/jquery-ui.min.css" />	
	
	<script src="./gfx/js/jquery.js" type="text/javascript"></script>
	<script src="./gfx/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="./gfx/js/functions.js" type="text/javascript"></script>
	<script src="./include/highcharts/highcharts.js"></script>

	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->

	<script src="./gfx/js/dhtmlxcalendar.js"></script>
	<script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject(["calendar","calendar2","calendar3"]);
		}

	</script>
</head>
<body onload="doOnLoad();">
	<script src="./gfx/js/wz_tooltip.js" type="text/javascript"></script>

