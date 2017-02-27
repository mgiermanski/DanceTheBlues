  <!DOCTYPE html>
 <?php session_start();
	$name = $email = $subject = $message = "";
	$nameErr = $emailErr = "";
	$submitted = false;
	if(isset($_POST['Submit'])){
		$name_class = $email_class = $subject_class = $message_class = $valid_class = 'class="incorrect-input"'; 
		$name = test_input($_POST["name"]);
		if(!(empty($name))){
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "<br>Only letters and white space allowed<br>";
			} else {
				$name_class = '';
			}
		}
		$email = test_input($_POST["email"]);
		if(!(empty($email))){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "<br>Invalid email format<br>";
			} else {
				$email_class = '';
			}
		}
		$subject = test_input($_POST["subject"]);
		if(!(empty($subject))){$subject_class = '';}
		$message = test_input($_POST["message"]);
		if(!(empty($message))){$message_class = '';}
		
		// code for check server side validation
		if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
		if(!$captcha){
			$captchaErr = "<br>Invalid captcha<br>";
		} else {
			$secretKey = "6LerphAUAAAAAPSHTzjbD64jbIcONDc9K66Hh70w";
			$ip = $_SERVER['REMOTE_ADDR'];
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
			$responseKeys = json_decode($response,true);
			
			if(intval($responseKeys["success"]) !== 1){  
				$captchaErr = "<br>Invalid captcha<br>";
			}else{// Captcha verification is Correct. Final Code Execute here!		
				$valid_class = '';
				if(!(empty($name) || empty($email) || empty($subject) || empty($message))){
					if(empty($nameErr) && empty($emailErr)){
						// Actually do stuff
						$email_from = 'info@dancetheblues.com.au';
						$email_subject = '';
						switch($subject){
							case 'general':
								$email_subject = 'Contact Form - General Enquiry';
								break;
							case 'feedback':
								$email_subject = 'Contact Form - Feedback';
								break;
							case 'classes':
								$email_subject = 'Contact Form - Classes';
								break;
							case 'events':
								$email_subject = 'Contact Form - Events';
								break;
							case 'website':
								$email_subject = 'Contact Form - Website Issues';
								break;
							default:
								$email_subject = 'Contact Form - Other';
								break;
						}
						$email_body = "You have received a new message from $name.\nEmail address: $email\nMessage:\n $message";
						$to = 'info@dancetheblues.com.au';
						$headers = "From: $email_from \r\n";
						
						mail($to, $email_subject, $email_body, $headers);
						$submitted = true;
					}
				}
			}
		}
	}	

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
 

<html>
<head>
	<title>Dance the Blues | Contact Us</title>
	<meta name="description" content="Get in contact with the team at Dance the Blues.">
	<?php
	include 'meta.php';?>
	<script type='text/javascript' src='https://www.google.com/recaptcha/api.js'></script>
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
	<?php $page_id=6;
	include 'header.php';?>
	<!-- Start of Content -->
	<div class="page-title row" style="padding-top: 60px;">
		<div class="page-title-text double-line-title">
			<h1>Contact<br>Us</h1>
		</div>
	</div>
	<div id = "content-wrapper">
		<div class="clear-container">
			<div class="shaded-61-left">
				<div class="gold-cont-38" style="float: right;">
					<div class=" clear-emphasis" style="text-align: left;">
					<h4>Phone</h4>
					<p>04 0194 4079</p>
					<h4>Email</h4>
					<p>info@dancetheblues.com.au</p>
					<h4>Address</h4>
					<p>Jagera Arts Centre<br>
					121 Cordelia St,<br>South Brisbane QLD 4101<br>
					Thursday 6:30 - 10:00PM</p>
					</div>
				</div>
				<div class="gold-cont-61">
					<div class ="standard-content">
						<?php if($submitted){
							echo '<div style="text-align: center;">
								<p>Thank you for your question, we will get in touch soon.</p>
							</div>
							<div style="display: none;">
							';
						}?>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="contact_form" id="contact_form">
							<p>
							<?php echo $nameErr;?>
							<input type="text" name="name" placeholder="Name" <?php echo 'value="'; echo $name; echo '"';?> <?php echo $name_class;?> style="width: 60%;">
							<?php echo $emailErr;?>
							<input type="text" name="email" placeholder="Contact Email"<?php echo 'value="'; echo $email; echo '"';?> <?php echo $email_class;?> style="width: 60%;">
							<select name="subject" <?php echo $subject_class;?> style="width: 100%;">
								<option value="">Subject</option>
								<option value="general" <?php if(strcasecmp("general", $subject)==0){echo 'selected';} ?>>General enquiry</option>
								<option value="feedback" <?php if(strcasecmp("feedback", $subject)==0){echo 'selected';} ?>>Feedback on our classes and/or social events</option>
								<option value="classes" <?php if(strcasecmp("classes", $subject)==0){echo 'selected';} ?>>Classes</option>
								<option value="events" <?php if(strcasecmp("events", $subject)==0){echo 'selected';} ?>>Events</option>
								<option value="website" <?php if(strcasecmp("website", $subject)==0){echo 'selected';} ?>>Issues with the website</option>
								<option value="other" <?php if(strcasecmp("other", $subject)==0){echo 'selected';} ?>>Other</option>
							</select> 
							<textarea name="message" placeholder="Your message to Dance the Blues..." rows="16" cols="30" <?php echo $message_class;?> style="width: 100%; resize: none;"><?php echo $message;?></textarea>
							<?php echo $captchaErr;?>
							<span class="g-recaptcha" data-sitekey="6LerphAUAAAAAK_GDzbG8SrdM1Lww_5V0qBUa2Ug"></span>
							<input name="Submit" type="submit" onclick="return validate();" value="Submit">
							</p>
						</form>
						<?php  if($submitted){ echo '</div>
						';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Content -->
	<?php $page_id=0;
	include 'footer.php';?>
</div>
</body>