<?php
	// Load facebook events string
	// Fields = name, description, place, start_time
	$fb_page_id = "938522976223668";
	
	$access_token = "758369317596728|RUD-AXCah_UsxDoJyVXk62_sRtY";
		
	$fields="id,name,description,place,timezone,start_time, cover";
	
	$json_link = "https://graph.facebook.com/{$fb_page_id}/events/attending/?fields={$fields}&access_token={$access_token}";
	 
	$json = file_get_contents($json_link);
	
	$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
	
	// count the number of events
	$event_count = count($obj['data']);
	
	// today
	$today = strtotime(date('Y-m-d'));
	
	// Iterate through each loaded event
	for($x=0; $x<$event_count; $x++){
		// If name not equal "Juke Joint" skip the event
		$name = isset($obj['data'][$x]['name']) ? $obj['data'][$x]['name'] : "";
		
		if(stripos($name, "Juke Joint") !== FALSE){
			// store this events place id into place_id string
			$place_id = isset($obj['data'][$x]['place']['id']) ? $obj['data'][$x]['place']['id'] : "";
			$place_name = isset($obj['data'][$x]['place']['name']) ? $obj['data'][$x]['place']['name'] : "";
			break;
		}
	} // end iteration
	
	if(stripos($place_name, "Jagera") !== FALSE){
		$venue_name = "Jagera Arts Centre";
		$venue_address = "121 Cordelia Rd<br>South Brisbane, QLD, 4101";
		$venue_address_long = "-27.4796249";
		$venue_address_lat = "153.0177284";
		$venue_website = "";
		$venue_phone = "";
		$venue_about = "";
		$venue_image = "images/Image-Classes-Jagera_Arts_Hall_FB.jpg";
		$venue_image_offset = "0";
	} else {
		// Load location info from facebook via the place_id
		if(isset($place_id)){
			// Fields = name, about, location, website, phone, emails
			$fields="id,name,about,location,phone,website,emails";
			
			$json_link = "https://graph.facebook.com/{$place_id}/?fields={$fields}&access_token={$access_token}";
			
			$json = file_get_contents($json_link);
		
			$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
			
			$venue_name = isset($obj['name']) ? $obj['name'] : "";
			
			$venue_address_street = isset($obj['location']['street']) ? $obj['location']['street'] : "";
			$venue_address_city = isset($obj['location']['city']) ? $obj['location']['city'] : "";
			$venue_address_state = isset($obj['location']['state']) ? $obj['location']['state'] : "";
			$venue_address_zip = isset($obj['location']['zip']) ? $obj['location']['zip'] : "";
			$venue_address_lat = isset($obj['location']['latitude']) ? $obj['location']['latitude'] : "";
			$venue_address_long = isset($obj['location']['longitude']) ? $obj['location']['longitude'] : "";
			
			$venue_address = $venue_address_street . "<br>" . $venue_address_city . ", " . $venue_address_state . ", " . $venue_address_zip;
			
			$venue_website = isset($obj['website']) ? $obj['website'] : "";
			$venue_phone = isset($obj['phone']) ? $obj['phone'] : "";
			$venue_about = isset($obj['about']) ? $obj['about'] : "";
			
			$venue_image = isset($obj['cover']['source']) ? $obj['cover']['source'] : "";
			$venue_image_offset = isset($obj['cover']['offset_y']) ? $obj['cover']['offset_y'] : "";
			echo "<!-- name = $venue_name
						address = $venue_address
						web = $venue_website
						phone = $venue_phone
						about = $venue_about
						im = $venue_image
						offset = $venue_image_offset-->
			";
		} else {
			// Default Venue - HooHa information
			$venue_name = "HooHa Bar";
			$venue_address = "41 Tribune St<br>South Brisbane, QLD, 4101";
			$venue_address_long = "-27.481606";
			$venue_address_lat = "153.022162";
			$venue_website = "http://www.hoohabar.com";
			$venue_phone = "(07) 3846 6457";
			$venue_about = "Local food, independent coffee, crafty drinks";
			$venue_image = "images/Image-HooHa.jpg";
			$venue_image_offset = "39";
		}
	}
	
	$output_String = '<div class="gold-cont-100" style="float: left; overflow: hidden;">
					<div class = "standard-content" style="text-align: center; overflow: hidden;">
						<p>
						<div class="fb-cover" style="background-image: url(' . $venue_image . '); background-position: 0% ' . $venue_image_offset . '%;">
							<span style="visibility: hidden;">Blues Juke Joint Blues Juke Joint Blues Juke Joint Blues Juke Joint Blues Juke Joint Blues Juke Joint Blues Juke Joint Blues Juke Joint Blues Juke Joint Blues Juke Joint Blues Juke Joint Blues Juke Joint  </span>
						</div>
						</p>
					</div>
				</div>
				<div class="gold-cont-38" style="float:left;">
					<div class ="standard-content">
						<h3>' . $venue_name . '</h3>
						';
	if(isset($venue_about)){
		$output_String .= '<p>' . $venue_about . '</p>
		';
	}
	if(isset($venue_address)){
		$output_String .= '<h4>Location</h4>
						<p>' . $venue_address . '</p>
						';
	}
	if(isset($venue_phone)){
		$output_String .= '<h4>Phone</h4>
						<p>' . $venue_phone . '</p>
						';
	}
	if(isset($venue_website)){
		$output_String .= '<h4>Website</h4>
						<p><a href="' . $venue_website . '">' . $venue_website . '</a></p>
						';
	}
	$map_link = "https://www.google.com.au/maps/place/27%C2%B028'53.8%22S+153%C2%B001'19.8%22E/@$venue_address_long,$venue_address_lat,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x0!8m2!3d$venue_address_long!4d$venue_address_lat";
	$output_String .= '</div>
				</div>
				<div class="gold-cont-61" style="float: left; overflow: hidden;">
					<div class ="standard-content">
						<a href="' . $map_link . '"><img src="https://maps.googleapis.com/maps/api/staticmap?center=' . $venue_address_long . ',' . $venue_address_lat . '&zoom=17&size=600x400&scale=2&key= AIzaSyC7Bg-bsR7LHgmXetqEHtneBOMLkmXAVag&markers=color:red|label:' . $venue_name . '|' . $venue_address_long . ',' . $venue_address_lat . '" width="100%"></a>
					</div>
				</div>
			';
	// Build up the upcoming_location_details from loaded fields
	// if any of the information is missing, ignore iteration
	// Caveat => Might hardcode a minimum of cover image
	echo $output_String;
?>