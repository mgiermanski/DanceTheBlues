<?php
	echo '<div id="footer-first" class="footer-fixed">
		<div style="float: right; margin: 5px;">
			<figure>
				<a href="https://www.facebook.com/DancetheBlues/?ref=bookmarks"><img src="images/FB-f-Logo__white_29.png" height="20" width="20" alt="Facebook Logo"></a>
			</figure>
		</div>
		<div style="float: right; margin: 5px;">
			<figure>
				<a href="mailto:info@dancetheblues.com.au?" target="_top"><img src="images/mail-to.png" height="20" width="20" alt="Email Logo"></a>
			</figure>
		</div>
	</div>
	<div  id="footer-sitemap">
	';
		$submenu_style_start = "";
		$submenu_style_end = "";
		$dropdown_style = '';
		include 'menu.php';
	echo '</div>
	';
?>