<?php
	$upcoming_bands = '				<table style="color: rgba(255, 255, 255, 1); margin-left: auto; margin-right: auto;">
		';
	$past_bands = '				</table>
	';
	if (($band_link = fopen("https://docs.google.com/spreadsheets/d/1oJBQBD-s6DDqnEENpPW1nLXMQZjCz8MUqUYTIvTVyzY/pub?output=csv", "r")) !== FALSE){
		$today = time();
		
		$past_limit = strtotime('-7 months');
		$upcoming_limit = strtotime('+7 months');
	
		$header = fgetcsv($band_link, 1000, ",");
		
		$width = sizeof($header);
		
		while (($data = fgetcsv($band_link, 1000, ",")) !== FALSE) {
			// All info available
			$cdate = strtotime($data[0]);
			$band_name = $data[1];
			$band_site = $data[2];
			if($cdate >= $today){
				// Upcoming
				if($cdate < $upcoming_limit){
					if(empty($band_site)){
						$upcoming_bands .= '<tr>
							<td style="vertical-align: text-top;">' . date("d M", $cdate) . '</td>
							<td style="padding-left : 5px;">' . $band_name . '</td>
						</tr>
						';
					} else {
					$upcoming_bands .= '<tr>
							<td style="vertical-align: text-top;">' . date("d M", $cdate) . '</td>
							<td style="padding-left : 5px;"><a href="' . $band_site . '" style="color: white">' . $band_name . '</a></td>
						</tr>
						';
					}
				}
			} else {
				// Past
				if($cdate > $past_limit){
					if(empty($band_site)){
						$past_bands = '<tr>
							<td style="vertical-align: text-top;">' . date("d M", $cdate) . '</td>
							<td style="padding-left : 5px;">' . $band_name . '</td>
						</tr>
						' . $past_bands;
					} else {
					$past_bands = '<tr>
							<td style="vertical-align: text-top;">' . date("d M", $cdate) . '</td>
							<td style="padding-left : 5px;"><a href="' . $band_site . '" style="color: white">' . $band_name . '</a></td>
						</tr>
						' . $past_bands;
					}
				}
			}
		}
		
		fclose($handle);
	}
	$upcoming_bands .= '				</table>
	';
	$past_bands = '				<table style="color: rgba(255, 255, 255, 1); margin-left: auto; margin-right: auto;">
		' . $past_bands;
?>