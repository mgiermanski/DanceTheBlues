<?php
	$fb_page_id = "938522976223668";

	$week_range = 2;

	// automatically adjust date range
	// human readable years
	$since_date = date('Y-m-d', strtotime('-' . $week_range . ' week'));
	 
	// unix timestamp years
	$since_unix_timestamp = strtotime($since_date);

	$access_token = "758369317596728|RUD-AXCah_UsxDoJyVXk62_sRtY";

	$fields="message";

	$json_link = "https://graph.facebook.com/{$fb_page_id}/feed?fields={$fields}&access_token={$access_token}&since={$since_unix_timestamp}";
	 
	$json = file_get_contents($json_link);

	$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

	// count the number of events
	$event_count = count($obj['data']);

	$search_phrase = "This week at Dance the Blues!";
	
	$found_classes = 0;

    for($x=0; $x<$event_count; $x++){
		$message = isset($obj['data'][$x]['message']) ? $obj['data'][$x]['message'] : "";
		$search_pos = stripos($message, $search_phrase);
		if(stripos($message, $search_phrase) !== false){
			$search_pos = $search_pos + strlen($search_phrase);
			$at_pos = stripos($message, " at ", $search_pos);
			$message_date = strtotime(trim(str_replace("st ", "", str_replace("nd ", "", str_replace("rd ", "", str_replace("th ", "", str_replace("of", "", substr($message, $search_pos, $at_pos - $search_pos))))))));
			if($message_date > (time() - 24 * 60 * 60)){
				$message = str_ireplace(array("\r\n", "\n", "\r"), '<br>', $message);
				$message = str_ireplace("{$search_phrase}<br><br>", '', $message);
				
					echo "<div class='shaded-100 row'>
				<div class='gold-cont-100'>
					<div class='standard-content'>
						<p>";
						echo str_replace(array("\r\n", "\n", "\r"), '<br>', $message);
						echo "</p>
					</div>
				</div>
			</div>
		";
				$found_classes++;
				break;
			}
		}
	}
	
	if($found_classes == 0){
		$nextThursday = strtotime("next Thursday");
		echo "<div class='shaded-100 row'>
				<div class='gold-cont-100'>
					<div class='standard-content'>
						<p>This week at Dance the Blues!<br>
						<br>
						Thursday " . date("j", $nextThursday) . "th " . date("F", $nextThursday) . " at Jagera Arts Centre:<br>
						7:00pm - 8:00pm - Fundamental Blues<br>
						<br>
						8:15pm - 9:15pm - Intermediate Blues<br>
						</p>
					</div>
				</div>
			</div>
		";
	}

?>