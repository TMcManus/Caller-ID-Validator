<?php

/**
 * Include twilio-php, the offical Twilio PHP Helper Library, which can be found at
 * http://www.twilio.com/docs/libraries
 */ 
include 'Services/Twilio.php';

// Your Twilio Credentials 
$accountSid = 'ACXXXXXX'; // Replace this with your own Account SID
$authToken  = 'YYYYYYYY'; // Replace this with your own Auth Token

// Grab the phone number from the POST Request
if(isset($_REQUEST['phone_number'])){
	$phone_number = $_REQUEST['phone_number'];
	
	// See if there is an extension
	$params = array();
	if(isset($_REQUEST['extension'])){
		$params['Extension'] = $_REQUEST['extension'];
	}
	
	
	// Make the API Call to Twilio and return the validation code
	$client = new Services_Twilio($accountSid, $authToken);
	
	try {
		$response = $client->account->outgoing_caller_ids->create($phone_number, $params);
		$message = "<h1>Validation Code: " . $response->validation_code . "</h1>";
	} catch(Exception $e) {
	    $message = "<h1>Error: " . $e->getMessage() . "</h1>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Caller ID Validation</title>
	<link href="assets/bootstrap.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="span6" style="padding-top:20px;">
			<img src="assets/Twilio-logo.png"/>
			<?php echo($message); ?>
			<ol>
				<li>Please enter the phone number you would like to verify.</li>
				<li>If you are at an extension, please enter that extension. Don't worry, the entire number will be verified, not just your extension.</li>
				<li>When you press "Verify Phone" you will be given a PIN, and then receive a phone call that will ask for this PIN.</li>
			</ol>
			<div class="control-group">
				<form action="validation.php" method="post" class="form-horizontal">
					<fieldset>
						<div class="control-group">
							<label for="phone_number" class="control">Phone Number: </label>
							<input type="text" name="phone_number" id="phone_number" />
						</div>
						<div class="control-group">
							<label for="extension" class="control">Extension: </label>
							<input type="text" name="extension" id="extension" class="span1" />
						</div>
						<div class="form-actions">
							<input type="submit" value="Call Phone" class="btn-large btn-primary" />
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>