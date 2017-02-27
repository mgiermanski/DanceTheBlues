<?php

	// Get Facebook graph api link
	$fb_page_id = "938522976223668";
	
	$page_access_token="EAAKxu53IrjgBACLX4YwPZAmZAoPW9Qh3yPGZAbMEio5ZCdjZAUYlBbo0DuZAFAnRaN5ZA3kVNyYEu9HWo8jdhZAmDber3tfqrZC2reR5AIo2ZCKD4D319nPNPJIX4uZAz0eLwi49Ezx3vioPW39PmLB4gY7N24elLiD3PDdvwVeqnQqIAZDZD";
	
	$fields="reviewer,review_text,rating";
	
	$json_link = "https://graph.facebook.com/{$fb_page_id}/ratings?fields={$fields}&access_token={$page_access_token}";

	$json = file_get_contents($json_link);
	
	// The information on reviews is stored in this
	$obj_in = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
	
	// count the number of ratings
	$rate_count = count($obj_in['data']);
	
	// remove ratings without a review (reviews look much better)
	$obj = array();
	
	foreach(range(0, $rate_count-1) as $key){
		if(isset($obj_in['data'][$key]['review_text'])){
			array_push($obj, $obj_in['data'][$key]);
		}	
	}
	$rate_count = count($obj);
	
	$rate_key_gen = range(0, $rate_count-1);
	
	$ratings_keys = array_rand($rate_key_gen, 3);
	foreach($ratings_keys as $key){
		$stars = isset($obj[$key]['rating']) ? $obj[$key]['rating'] : "";
		$review_text = isset($obj[$key]['review_text']) ? $obj[$key]['review_text'] : "";
		$reviewer = isset($obj[$key]['reviewer']['name']) ? $obj[$key]['reviewer']['name'] : "";
		echo '	<div class="gold-cont-33">
					<!--<div itemscope itemtype="http://schema.org/Review">
						<span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing" style="display: none;">
							<span itemprop="name">Dance the Blues</span>
						</span>-->
						<div class="large-screen-content">
							<img src="images/';
		echo $stars;
		echo '-stars.png" alt="';
		echo $stars;
		echo '-Stars" width="100%">
						</div>
						<div class="small-screen-content">
							<img src="images/';
		echo $stars;
		echo '-stars-small.png" alt="';
		echo $stars;
		echo '-Stars" width="100%">
						</div>
						<!--<div class="review-body">
						<p><b><span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
							<span itemprop="ratingValue">';
		echo $stars;
		echo '</span> / <span itemprop="bestRating">5</span>
						</span></p></b>
						</div>-->
						';
		if(empty($review_text)==FALSE){
			echo '				<div class="review-body">
								<p><i>"<!--<span itemprop="reviewBody">-->';
			echo $review_text;
			echo'<!--</span>-->"</i></p>
						</div>
						';
		}
		echo '<div class="review-author">
							<p><b>-
							<!--<span itemprop="author" itemscope itemtype="http://schema.org/Person">
								<span itemprop="name">-->';
		echo $reviewer;
		echo '<!--</span>
							</span>-->
							</b></p>
						</div>
					<!--</div>-->
				</div>
			';
	}
?>
