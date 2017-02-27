<?php
	echo '<ul>
		<li><a ';
		if ($page_id == 1){
			echo 'class="menu-active" ';
		}
		echo 'href="index.php">Home</a>
			<div>
				<!-- Needed to ensure mobile drop-down click does not select "Home" -->
			</div>
		</li>
		<li ';
		echo "$dropdown_style ><a ";
		if ($page_id == 2){
			echo 'class="menu-active" ';
		}
		echo 'href="classes.php">Classes</a>
		';
		echo "$submenu_style_start
		";
			echo '<ul>
				<a href="classes.php#upcoming_placemark">Upcoming Classes</a>
				<a href="classes.php#levels_placemark">Class Levels</a>
				<a href="classes.php#passport_placemark">The Passport</a>
			</ul>
			';
		echo "$submenu_style_end
		";
		echo '</li>
		<li ';
		echo "$dropdown_style ><a ";
		if ($page_id == 3){
			echo 'class="menu-active" ';
		}
		echo 'href="jukejoint.php">Juke Joint</a>
		';
		echo "$submenu_style_start
		";
			echo '<ul>
				<a href="jukejoint.php#venue_placemark">Venue</a>
				<a href="jukejoint.php#bands_placemark">Live Bands</a>
			</ul>
			';
		echo "$submenu_style_end
		";
		echo '</li>
		<li ';
		echo "$dropdown_style ><a ";
		if ($page_id == 4){
			echo 'class="menu-active" ';
		}
		echo 'href="events.php">Events</a>
		';
		echo "$submenu_style_start
		";
			echo '<ul>
				<a href="events.php#socials_placemark">Socials</a>
				<a href="events.php#workshops_placemark">Workshops</a>
				<a href="events.php#exchanges_placemark">Exchanges</a>
				<a href="events.php#live_gigs_placemark">Live Gigs</a>
			</ul>
			';
		echo "$submenu_style_end
		";
		echo '</li>
		<li ';
		echo "$dropdown_style ><a ";
		if ($page_id == 5){
			echo 'class="menu-active" ';
		}
		echo 'href="about.php">About</a>
		';
		echo "$submenu_style_start
		";
			echo '<ul>
				<a href="about.php#us_placemark">Dance the Blues</a>
				<a href="about.php#teachers_placemark">Teachers</a>
				<a href="about.php#conduct_placemark">Code of Conduct</a>
			</ul>
			';
		echo "$submenu_style_end
		";
		echo'</li>
		<li><a ';
		if ($page_id == 6){
			echo 'class="menu-active" ';
		}
		echo 'href="contact.php">Contact</a>
		</li>
	</ul>
	';
?>