<?php

use GuzzleHttp\Client;
use Infobip\Api\SendSmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;


function send_sms($user){

$BASE_URL = "https://k3zvge.api.infobip.com";
$API_KEY = "426695b9fb5e9810265b6325d9fca2e6-66df0905-7d06-4c40-969c-b518784b65fa";

$SENDER = "InfoSMS";
$RECIPIENT = "201120129019";
$MESSAGE_TEXT = "we have a new registeration, his name is " . $user->name .
" and his email is " . $user->email;

$configuration = (new Configuration())
    ->setHost($BASE_URL)
    ->setApiKeyPrefix('Authorization', 'App')
    ->setApiKey('Authorization', $API_KEY);

$client = new Client();

$sendSmsApi = new SendSMSApi($client, $configuration);
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
