<?php
/* Send an SMS using Twilio. */

$testing = $_REQUEST["testing"];

if ($testing) {
    echo "Testing<br>";
}


require "Services/Twilio.php";



$AccountSid = "";
$AuthToken = "";


$fromNumber = "";


$client = new Services_Twilio($AccountSid, $AuthToken);


$toNumber = "+1" . $_REQUEST["number"];
$message = $_REQUEST["message"];


if ($testing) {
    $fromNumber = "+16137049803";
    $toNumber = "+16135919990";
    $message = "This is a test by Adesh. Time is " . date('h:i.s');
}


try {
    $sms = $client->account->messages->sendMessage($fromNumber, $toNumber, $message);

    
    echo "An SMS message was sent to $toNumber";
}
catch (Exception $e) {
    echo "The message was not sent!<br><br>";
   
    echo "From Number: " . $fromNumber." (must be your Twilio phone number)<br>";
    echo "To Number: " . $toNumber." (this must be a verified phone number if you are using a trial account)<br>";
    echo "Message: " . $message."<br>";
    echo "<br>";
}

?>
