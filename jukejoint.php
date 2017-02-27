 <!DOCTYPE html>
<html>
<head>
	<title>Juke Joint | Dance the Blues</title>
	<meta name="description" content="Information on the Juke Joint monthly event">
	<?php
	include 'meta.php';?>
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77552362-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="page-wrapper">
	<!-- Page id for current page
	1 - Home
	2 - Classes
	3 - JukeJoint
	4 - Events
	5 - About
	6 - Contact--!>
	<?php $page_id=3;
	include 'header.php';?>
	<!-- Start of Content -->
	<!-- Load Facebook event info for juke joint -->
	<div class="page-title row" style="padding-top: 60px;">
		<div class="page-title-text single-line-title">
			<h1>Juke Joint</h1>
		</div>
	</div>
	<div id = "content-wrapper">
	<!-- About Juke Joint -->
		<div class="clear-container row">
			<div class="shaded-61-right">
				<div class="gold-cont-38" style="float: left">
					<div class = "clear-content" style="text-align: left;">
						<div class="large-screen-content">
								<img src="images/Image-Juke_Joint-Large.png" alt="Source: https://en.wikipedia.org/wiki/Blues_dance#/media/File:Jookjoint-dancing.jpg" width="100%">
						</div>
						<div class="small-screen-content">
								<img src="images/Image-Juke_Joint-Small.png" alt="Source: https://en.wikipedia.org/wiki/Blues_dance#/media/File:Jookjoint-dancing.jpg" width="100%">
						</div>
					</div>
				</div>
				<div class="gold-cont-61" style="float:right;">
					<div class ="standard-content">
						<h3>What is the Juke Joint?</h3>
						<p>The Juke Joint is Dance the Blues' monthly social; an opportunity to go out and enjoy a live blues band in Brisbane, 
						regardless of whether or not you dance regularly.<br><br>
						If you'd like to give blues dancing a go there is no better place. 
						We provide a free introductory class at the start of the event to get you moving, and then we keep you going with awesome
						bands, DJs and a chilled out atmosphere.<br><br>
						If you're not too interested in dancing, but love blues music, then the Juke Joint is for you too. We strive to get great live
						blues bands in each month, and this coupled with the ambience of the venue makes for a great night out, even if you're not dancing 
						(though we hope that seeing others dancing will intice you to give it a go).
						</p>
						<h3>Cost</h3>
						<p>$15 at the door<br>
						(EFTPOS facilities are available)</p>
						
					</div>
				</div>
			</div>
		</div>
		<!-- Venue -->
		<div class="placemark">
			<a name="venue_placemark">venue</a>
		</div>
		<div class="gold-cont-100 row">
			<div class="clear-emphasis">
				<h2>Venue</h2>
			</div>
		</div>
		<div class="shaded-100 row">
			<?php include 'facebook-juke_joint-location.php';?>
		</div>
		<div class="placemark">
			<a name="bands_placemark">bands</a>
		</div>
		<div class="gold-cont-100 row">
			<div class="clear-emphasis">
				<h2>Band Information</h2>
			</div>
		</div>
		<div class="shaded-100">
			<div class="gold-cont-100 row">
				<div class="standard-content">
				<p>Dance the Blues strives to get great blues bands to play at the Juke Joint, 
				and you can check out the line up for the next couple of months below. 
				If you would like more information on any featured artist please click on their 
				underlined name below.<br>
				If you are a blues artist in the area, and you'd like to perform at a Juke Joint
				please contact us via the <a href="contact.php">contact form</a>.</p>
				</div>
			</div>
		</div>
		<div class="clear-container row">
		<!-- Upcoming Bands -->
			<div class="gold-cont-50" >
				<div class="clear-emphasis">
					<h3  style="text-align: center;">Upcoming Bands</h3>
				</div>
				<div class="shadow">
					<?php include 'jukejoint_band.php';
					echo $upcoming_bands;?>
				</div>
				
			</div>
			
		<!-- Past Bands -->
			<div class="gold-cont-50">
				<div class="clear-emphasis">
					<h3  style="text-align: center;">Past bands</h3>
				</div>
				<div class="shadow">
					<?php echo $past_bands;?>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Content -->
	<?php $page_id=0;
	include 'footer.php';?>
</div>
</body>