<?php
	echo '<meta charset="utf-8">
	<meta name="keywords" content="blues, dancing, dance, classes, lessons, blues classes, dance classes, blues lessons, dance lessons, dancing lessons, dancing classes, brisbane, australia">
	<meta name="viewport" content="width=device-width, height= device-height, initial-scale=1.0">
	<link rel="icon" type="image/gif"  href="images/icon.gif">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Josefin+Sans:400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="DTB-Style.css">
	<script src="scripts/prefixfree.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	';
	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;
	if(($detect->isMobile()) || ($detect->isTablet())){
		echo '<script type="text/javascript" src="scripts/jquery.touchSwipe.min.js"></script>
		<script src="scripts/DTBscript-mobile.js"></script>
	';
	} else {
		echo '<script src="scripts/DTBscript.js"></script>
	';
	}
	//<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
?>