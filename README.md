# Caller ID Validator
This script is intended to simplify the process of verifying a client's caller ID for use in your [Twilio](http://www.twilio.com/) voice application.

## How can I use this?
A customer of yours wants to be able to use their current phone number as a caller ID when they use your Twilio application. You've tried 

## Installing
1. Open `validation.php` and replace `ACXXXXXX` with your Account SID and `YYYYYYYY` with your Auth Token. Both your Account SID and your Auth Token can be found on your Twilio account's dashboard page.
2. Upload `validation.php` and the `assets` folder to a publicly accessible web server.
3. Download and unzip the latest version of [twilio-php](http://www.twilio.com/docs/libraries), the official PHP helper library for Twilio.
4. Go to the directory which you just unzipped.
5. Upload the entire folder labeled `Services` to the same directory on your web server which contains `validation.php`.

## Using this script
After you have installed the script, send the link to `validation.php` to the customer whose caller ID you are trying to verify.

## Branding this script
Feel free to edit the HTML of the `validation.php` file. The code has been left simple so that it's easy to make this match the rest of your website. If you just want to do something easy, you might try replacing Twilio's logo with your own.

## Learn more about how this works
This script uses:
* The [OutgoingCallerIds](http://www.twilio.com/docs/api/rest/outgoing-caller-ids) resource from the [Twilio REST API](http://www.twilio.com/docs/api/rest)
* [twilio-php](http://www.twilio.com/docs/libraries) The official Twilio PHP Helper Library
* The magical [Twitter Bootstrap](http://twitter.github.com/bootstrap/)
