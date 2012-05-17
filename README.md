# Caller ID Validator
[Twilio](http://www.twilio.com/) allows customers to use the caller IDs of phones which they have control over to place outbound calls. This PHP script is intended to simplify the process of verifying caller IDs, which is a necessary first step.

## How can I use this?
A customer of yours wants to be able to use their current phone number as a caller ID when they use your Twilio application. You've tried validating their phone using [Twilio's built in "Verify a Number" button](https://www.twilio.com/user/account/phone-numbers/incoming), but this approach doesn't work so well if you are not sitting right next to the phone you are trying to validate.

This script will generate a webpage in HTML which can be emailed to clients. It works the same way as the "Verify a Number" button, but since it is not inside the Twilio account administration section it can be accessed by customers.

## Prerequisites
You will need:
* A web server capable of running PHP
* A text editor
* A means to get files from your computer to your server. Usually this will be either FTP or Git, but some servers allow you to upload files in the browser via cPanel.

## Installing the PHP script
1. [Click here](https://github.com/TMcManus/Caller-ID-Validator/zipball/master) to download the zipped version of all the files you see listed above.
2. Unzip the file you just downloaded.
3. Rename the folder from `TMcManus-Caller-ID-Validator-xxxxxx` to `caller-id`.
4. Open the newly renamed `caller-id` folder and open `validation.php` with your text editor.
5. In `validation.php`, replace `ACXXXXXX` with your Account SID and `YYYYYYYY` with your Auth Token. Both your Account SID and your Auth Token can be found on your [Twilio account's dashboard page](https://www.twilio.com/user/account). Save your changes.
6. Download and unzip the latest version of [twilio-php](http://www.twilio.com/docs/libraries), the official PHP helper library for Twilio.
7. Open the folder which you just unzipped.
8. Copy the folder labeled `Services` into the `caller-id` folder. There should now be two folders in `caller-id`
9. Upload the `caller-id` folder to your web server.
10. Visit the public URL for `caller-id/validation.php` at the web address you just uploaded the `caller-id` folder to.

## Using the script
If you have visited the URL for `caller-id/validation.php` and a web page with a form came up, congratulations! You can copy the URL for that page and email it to anyone whose caller ID you want validated for your Twilio account.

## Branding the page
Feel free to edit the HTML of the `validation.php` file. The code has been left simple so that it's easy edit to match the rest of your website. For easy rebranding, try replacing Twilio's logo with your own.

## Learn about how this script works
This script uses:
* The [OutgoingCallerIds](http://www.twilio.com/docs/api/rest/outgoing-caller-ids) resource from the [Twilio REST API](http://www.twilio.com/docs/api/rest)
* [twilio-php](http://www.twilio.com/docs/libraries) The official Twilio PHP Helper Library
* The magical [Twitter Bootstrap](http://twitter.github.com/bootstrap/)