<?php
	function append_event_to_string($in_string, $object, $x, $current_date){
		// Load data from JSON String
		$start_date = date( 'l, F d, Y', strtotime($object['data'][$x]['start_time']));
		$start_time = date('g:i a', strtotime($object['data'][$x]['start_time']));
		$end_time = date( 'l, F d, Y', strtotime($object['data'][$x]['end_time']));
		
		$pic_big = isset($object['data'][$x]['cover']['source']) ? $object['data'][$x]['cover']['source'] : "https://graph.facebook.com/{$fb_page_id}/picture?type=large";
		
		$pic_big_offset = isset($object['data'][$x]['cover']['source']) ? $object['data'][$x]['cover']['offset_y'] : "";
			 
		$eid = $object['data'][$x]['id'];
		$host = $object['data'][$x]['owner'];
		$host = $host['name'];
		$name = $object['data'][$x]['name'];
		$description = isset($object['data'][$x]['description']) ? $object['data'][$x]['description'] : "";
		 
		// place
		$place_name = isset($object['data'][$x]['place']['name']) ? $object['data'][$x]['place']['name'] : "";
		$city = isset($object['data'][$x]['place']['location']['city']) ? $object['data'][$x]['place']['location']['city'] : "";
		$country = isset($object['data'][$x]['place']['location']['country']) ? $object['data'][$x]['place']['location']['country'] : "";
		$zip = isset($object['data'][$x]['place']['location']['zip']) ? $object['data'][$x]['place']['location']['zip'] : "";
		 
		$location="";
		 
		if($place_name && $city && $country && $zip){
			$location="{$place_name}, {$city}, {$country}, {$zip}";
		}else{
			$location="Location not set or event data is too old.";
		}
		
		$change_date = false;
		if(strlen($in_string) == 0){
			$current_date = $start_date;
			$change_date = true;
		} else {
			if(!(strcasecmp($current_date, $start_date) == 0)){
				$change_date = true;
			}
		}
		
		if($change_date){
			//New date
			$start_date_day_name = date( 'l', strtotime($object['data'][$x]['start_time']));
			$start_date_day = date( 'd', strtotime($object['data'][$x]['start_time']));
			$start_date_month = date( 'F', strtotime($object['data'][$x]['start_time']));
			$start_date_year = date( 'Y', strtotime($object['data'][$x]['start_time']));
			if(strlen($in_string)>0){
				//Finish off previous date
				$in_string .= '</div>
				</div>
			</div>
		</div>
		';
			}
			//Just the date
			$in_string .= '<div class="clear-container row">
			<div class="shaded-80-right">
				<div class="gold-cont-19">
					<div class = "clear-emphasis">
						<div class="date">
							<div class="date-small-text">
								';
							$in_string .= $start_date_day_name;
							$in_string .= '
							</div>
							<div class="date-big-day">
								';
							$in_string .= $start_date_day;
							$in_string .= '
							</div>
							<div class="date-small-text">
								';
							$in_string .= $start_date_month;
							$in_string .= '
							</div>
							<div class="date-small-day">
								';
							$in_string .= $start_date_year;
							$in_string .= '
							</div>
						</div>
					</div>
				</div>
				<div class="gold-cont-80">
					<div class ="standard-content" style="overflow: hidden">
						';
		}
		//New event on same date
		$in_string .= "<div class='expandable-closed'>
							";
							$in_string .= "<div class='expandable-trigger fb-cover' style='background-image: url($pic_big); background-position: 0% $pic_big_offset%;'>
								<h3>$name</h3>
							</div>
							<div class='expandable-content'>
								<div class='gold-cont-100'>
									<h3>";
									$in_string .= $name;
									$in_string .= '</h3>
								</div>
								<div class="gold-cont-38">
									<h4>Host</h4>
									<p>';
									$in_string .= $host;
									$in_string .= '</p>
									<h4>Time</h4>
									<p>';
									$in_string .= $start_time;
									$in_string .= '</p>
									<h4>Place</h4>
									<p>';
									$in_string .= $location;
									$in_string .= '<br><br>
									</p>
								</div>
								<div class="gold-cont-61" style="float:right; margin-bottom: 5px;">
									<h4>Details</h4>
									<p>
									';
									$in_string .= str_replace(array("\r\n", "\n", "\r"), '<br>', $description);
									$in_string .= '
									</p>
								</div>
								<div class="gold-cont-38">
									<p>
										<a href="https://www.facebook.com/events/';
										$in_string .= $eid;
										$in_string .= '/" target="_blank">View on facebook</a>
									</p>
								</div>
							</div>
						</div>
						';
		
		
		$returner = array($in_string, $current_date);
		return $returner;
	}
?>