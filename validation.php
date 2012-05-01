<?php

/**
 * Include the offical Twilio PHP Helper Library, which can be found at
 * http://www.twilio.com/docs/libraries
 */ 
include 'Services/Twilio.php';

// Your Twilio Credentials 
$accountSid = 'AC3120f19ed4a34467aadd3fbea6c0006e';
$authToken  = 'a0a6b8d057ab09bfc8ef66aaceb43a93';

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
</head>
<body>

<?php
if(isset($message)){
	echo($message);
}
?>
<ol>
	<li>Please enter the phone number you would like to verify.</li>
	<li>If you are at an extension, please enter that extension. Don't worry, the entire number will be verified, not just your extension.</li>
	<li>When you press "Verify Phone" you will be given a PIN, and then receive a phone call that will ask for this PIN.</li>
</ol>
<form action="validation.php" method="post">
Phone Number: <input type="text" name="phone_number" />
Extension: <input type="text" name="extension" />
<input type="submit" value="Call Phone" />

</form>

</body>

</html>