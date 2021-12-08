<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Infobip\Api\SendSmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit(Block $block)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Block $block)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        //
    }

  

    public function send_sms()
    {

        // $client = new Client(['base_uri' => 'http://localhost']);

        // $response = $client->request('POST', '/task-management/public/api/list-manager');


        // return  $response->getBody();

        // $user =User::first();
        // $statusCode =200;
        // $jsonResponse['statusCode'] = 400;
        // $jsonResponse['response'] = $user;
        // return response($jsonResponse, $statusCode);

        // return response($user, 200);

        // throw new \App\Exceptions\NotFoundException;
        // sum_numbers(1,2);
        // //subtract_numbers(1,2);

        $BASE_URL = "https://k3zvee.api.infobip.com";
        $API_KEY = "59f07fec1ab795940f87754643dad959-5f1c1847-dfe8-4a42-b0a3-4f822cdd4895";

        $SENDER = "InfoSMS";
        $RECIPIENT = "201007767127";
        $MESSAGE_TEXT = "Hi Zaki";

         
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
        echo ("Response body: " . $smsResponse);
        } catch (Throwable $apiException) {
        echo("HTTP Code: " . $apiException->getCode() . "\n");
        echo ("Response body: " . $apiException->getResponseBody() . "\n");
        }
    }

    
}
