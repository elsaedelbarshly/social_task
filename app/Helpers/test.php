<?php

use GuzzleHttp\Client;
use Infobip\Api\SendSmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
function send_sms($user){
    // $user=User::first();
    // return response($user,'200');
    // sum_number(1,2);
$BASE_URL = "https://zje682.api.infobip.com";
$API_KEY = "ff87a17933294af80bc15b9260699208-f4d2542d-ef4b-496f-8a8c-4a7e8f4c2179";

$SENDER = "ahmed";
$RECIPIENT = "201025258235";
$MESSAGE_TEXT = "hello ahmed success ".$user->name.$user->email;

$configuration = (new Configuration())
->setHost($BASE_URL)
->setApiKeyPrefix('Authorization', 'App')
->setApiKey('Authorization', $API_KEY);

$client = new Client();

$sendSmsApi = new SendSmsApi($client, $configuration);
$destination = (new SmsDestination())->setTo($RECIPIENT);
$message = (new SmsTextualMessage())
->setFrom($SENDER)
->setText($MESSAGE_TEXT)
->setDestinations([$destination]);

$request = (new SmsAdvancedTextualRequest())->setMessages([$message]);

try {
$smsResponse = $sendSmsApi->sendSmsMessage($request);
return ("Response body: " . $smsResponse);
} catch (Throwable $apiException) {
return("HTTP Code: " . $apiException->getCode() . "\n");
return ("Response body: " . $apiException->getResponseBody() . "\n");
}
}
    ?>
