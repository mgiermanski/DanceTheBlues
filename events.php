 <!DOCTYPE html>
<html>
<head>
	<title>Dance the Blues | Upcoming Events Information</title>
	<meta name="description" content="The latest information on any upcoming dance-able blues events in and around 
	Brisbane and Australia.">
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
	<?php $page_id=4;
	include 'header.php';?>
	<!-- Start of Content -->
	<div class="page-title row">
		<div class="page-title-text single-line-title">
			<h1>Events</h1>
		</div>
	</div>
	<div id = "content-wrapper">
		<div class="placemark">
			<a name="socials_placemark">socials</a>
		</div>
		<div class="gold-cont-100 row">
			<div class="clear-emphasis">
				<h2>Socials</h2>
			</div>
		</div>
		<div class="row">
			<div class="shaded-100">
				<div class="gold-cont-100">
					<div class="standard-content">
						<p>
						<!--Put description of type of event here-->
						Socials are a great way of putting all that you've learned into practice.
						There's a laid back atmosphere filled with dance-able music suplied by either
						a DJ, or if you're lucky, a live band. A class aimed at people who haven't 
						danced before is usually taught at the beginning of a social night , so feel
						free to bring your not-yet-dancing friends to join in the fun.<br><br>
						*Please note that while Dance the Blues is happy to advertise upcoming socials
						here they are not necessarily the organisers of these events, check the "Host" field
						for relevant parties.
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Handled by facebook PHP link-->
		<?php
		include 'facebook-events.php';
		echo $social_string;
		?>
		<div class="placemark">
			<a name="workshops_placemark">workshops</a>
		</div>
		<div class="gold-cont-100 row">
			<div class="clear-emphasis">
				<h2>Workshops</h2>
			</div>
		</div>
		<div class="row">
			<div class="shaded-100">
				<div class="gold-cont-100">
					<div class="standard-content">
						<p>Workshops are a great way to improve your dancing in addition to regular dance classes.
						They might consist of an intensive set of sessions focussing on a particular aspect
						of your dancing, or they might be a small battery of lessons taught by visiting interstate,
						or international teachers, and in either case, they're a whole lot of fun.<br>
						Workshops don't tend to follow a regular schedule, so keep
						an eye on this section for updates.<br><br>
						*Please be aware that some workshops require dancers to register before the date, 
						so please visit the linked facebook event page for more details.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Handled by facebook PHP link-->
		<?php
		echo $workshop_string;
		?>
		<div class="placemark">
			<a name="exchanges_placemark">exchanges</a>
		</div>
		<div class="gold-cont-100 row">
			<div class="clear-emphasis">
				<h2>Exchanges</h2>
			</div>
		</div>
		<div class="row">
			<div class="shaded-100">
				<div class="gold-cont-100">
					<div class="standard-content">
						<p>
						<!--Put description of type of event here-->
						Dance exchanges are the pinnacle of dance events. These are mekas for dancers,
						with dance-able music from both DJs and live bands filling the air, and dancing
						up until dawn being commonplace. There may even be workshops to improve your dancing,
						that is if you're not sleeping off the revelry of the evenings.<br><br>
						*Please note that exchanges are interstate affairs, and as such will not always be located
						in Brisbane, and registration is almost always necessary. Make sure to check the linked Facebook
						event page for details.
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Handled by facebook PHP link-->
		<?php
		echo $exchange_string;
		?>
		<div class="placemark">
			<a name="live_gigs_placemark">live gigs</a>
		</div>
		<div class="gold-cont-100 row">
			<div class="clear-emphasis">
				<h2>Live Gigs</h2>
			</div>
		</div>
		<div class="row">
			<div class="shaded-100">
				<div class="gold-cont-100">
					<div class="standard-content">
						<p>
						<!--Put description of type of event here-->
						Live gigs are an awesome experience, there may not always be room to
						dance, but the atmosphere provided by a live band is always phenomenal. Come
						out and support the musicians that provide us with such great music, hang out
						with friends, and maybe even bust out some of the moves you've learned at classes.<br><br>
						*Please note that while Dance the Blues is happy to advertise upcoming live events
						here they are not necessarily the organisers of these events, check the "Host" field
						for relevant parties.<br>
						**If you know of an event coming up where live blues music will be played, that you haven't
						seen here feel free to send us an email at <a href="mailto:info@dancetheblues.com.au?" target="_top">
						info@dancetheblues.com.au</a>, or use our <a href="contact.php">Contact Form</a>.
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Handled by facebook PHP link-->
		<?php
		echo $live_string;
		?>
	</div>
	<!-- End of Content -->
	<?php $page_id=0;
	include 'footer.php';?>
</div>
</body>