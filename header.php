<?php
	echo '<div id = "header-wrapper">
		<div id = "menu-button">
			<img src="images/menu.jpg">
		</div>
		
		<div id = "logo-image">
			<div id = "logo-text">
				<a href="index.php">Dance <span style="font-size:60%">the</span> <span id="logo-break"><br></span>Blues</a> 
			</div>
		</div>
		<div class = "navigation">
		<div id = "menu-horizontal">
		';
			$submenu_style_start = '<div class="dropdown-content">';
			$submenu_style_end = '</div>';
			$dropdown_style = 'class="dropdown"';
			include 'menu.php';
		echo '</div>
		</div>
		<div id = "large-screen-padding">
			<!-- Just Padding -->
		</div>
	</div>
	<div class = "navigation">
	<div id = "menu-vertical" class="menu-closed">
	';
		$submenu_style_start = '<div class="dropdown-content">';
		$submenu_style_end = '</div>';
		$dropdown_style = 'class="dropdown-v-closed"><span class="drop-button plus" >+</span><span class="drop-button minus">-</span';
		include 'menu.php';
	echo '</div>
	</div>
	';
?>