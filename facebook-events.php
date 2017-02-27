<?php

	include 'append_event_to_string.php';
	// Import filters
	include 'social_filter.php';
	$social_filter = $filter;
	include 'exchanges_filter.php';
	$exchange_filter = $filter;
	include 'workshop_filter.php';
	$workshop_filter = $filter;
	
	$social_string = "";
	$exchange_string = "";
	$workshop_string = "";
	$live_string = "";
	$social_current_date = "";
	$exchange_current_date = "";
	$workshop_current_date = "";
	$live_current_date = "";
	
	// Set date limit
	$since_date = date('Y-m-d', strtotime('-5 days', time()));
	// unix timestamp years
	$since_unix_timestamp = strtotime($since_date);

	//Load JSON link from facebook
	$fb_page_id = "938522976223668";
	
	$access_token = "758369317596728|RUD-AXCah_UsxDoJyVXk62_sRtY";
		
	$fields="id,name,description,place,timezone,end_time,start_time,cover,owner";
 
	$json_link = "https://graph.facebook.com/{$fb_page_id}/events/attending/?fields={$fields}&access_token={$access_token}";
	 
	$json = file_get_contents($json_link);
	
	$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
	
	// count the number of events
	$event_count = count($obj['data']);
	
	//Iterate through each item in the JSON string
	for($x=0; $x<$event_count; $x++){
		// Access correctly ordered current entry via [$event_count-1-$x]
		// Check date first (save processing time)
		
		// set timezone
		date_default_timezone_set($obj['data'][$event_count-1-$x]['timezone']);
		$start_date = strtotime($obj['data'][$event_count-1-$x]['start_time']);
		
		// Check if the event is ended
		if (isset($obj['data'][$event_count-1-$x]['end_time'])){
			$end_time = strtotime($obj['data'][$event_count-1-$x]['end_time']);
			if($end_time < time()) continue;
		}
		
		// If date outside limit (<today - 5 days) ignore entry
		If($start_date >= $since_unix_timestamp){
			// Get event details from JSON
			$name = $obj['data'][$event_count-1-$x]['name'];

			// Identify event type (social, workshop or exchange, otherwise assume it is a live music event)
			$event_type = "unknown";
			foreach ($social_filter as $keyword) {
				if(stripos($name, $keyword) !== false){
					$event_type = "social";
				} 
			}
			foreach ($exchange_filter as $keyword) {
				if(stripos($name, $keyword) !== false){
					$event_type = "exchange";
				} 
			}
			foreach ($workshop_filter as $keyword) {
				if(stripos($name, $keyword) !== false){
					$event_type = "workshop";
				} 
			}
			switch ($event_type){
				case "social":
					$output = append_event_to_string($social_string, $obj, $event_count-1-$x, $social_current_date);
					$social_string = $output[0];
					$social_current_date = $output[1];
					break;
				case "exchange":
					$output = append_event_to_string($exchange_string, $obj, $event_count-1-$x, $exchange_current_date);
					$exchange_string = $output[0];
					$exchange_current_date = $output[1];
					break;
				case "workshop":
					$output = append_event_to_string($workshop_string, $obj, $event_count-1-$x, $workshop_current_date);
					$workshop_string = $output[0];
					$workshop_current_date = $output[1];
					break;
				default:
					$output = append_event_to_string($live_string, $obj, $event_count-1-$x, $live_current_date);
					$live_string = $output[0];
					$live_current_date = $output[1];
			}
			// Create output string
			// Check event name against Social Filter - if match, concat output string to Social_events variable
			// Check event name against Workshop Filter - if match, concat output string to workshop_events variable
			// Check event name against Exchange Filter - if match, concat output string to exchange_events variable
			// If event not matched anything concat output string to live_events variable
		}
		
	}
	if(strlen($social_string) > 0){
	//Finish off last date
		$social_string .= '		</div>
			</div>
		</div>
	</div>
	';
	} else {
		$social_string .=  '<div class="gold-cont-100 row shaded-100 standard-content" style="text-align: center;">
		<p>There is currently no information available for ';
		$social_string .=  "social";
		$social_string .=  's.</p>
	</div>
		';
	}
	if(strlen($workshop_string) > 0){
	//Finish off last date
		$workshop_string .= '		</div>
			</div>
		</div>
	</div>
	';
	} else {
		$workshop_string .=  '<div class="gold-cont-100 row shaded-100 standard-content" style="text-align: center;">
		<p>There is currently no information available for ';
		$workshop_string .=  "workshop";
		$workshop_string .=  's.</p>
	</div>
		';
	}
	if(strlen($exchange_string) > 0){
	//Finish off last date
		$exchange_string .= '		</div>
			</div>
		</div>
	</div>
	';
	} else {
		$exchange_string .=  '<div class="gold-cont-100 row shaded-100 standard-content" style="text-align: center;">
		<p>There is currently no information available for ';
		$exchange_string .=  "exchange";
		$exchange_string .=  's.</p>
	</div>
		';
	}
	if(strlen($live_string) > 0){
	//Finish off last date
		$live_string .= '		</div>
			</div>
		</div>
	</div>
	';
	} else {
		$live_string .=  '<div class="gold-cont-100 row shaded-100 standard-content" style="text-align: center;">
		<p>There is currently no information available for ';
		$live_string .=  "live event";
		$live_string .=  's.</p>
	</div>
		';
	}

?>