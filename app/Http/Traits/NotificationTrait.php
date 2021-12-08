<?php


namespace App\Http\Traits;
use App\Models\Notification;

trait NotificationTrait{


    public function sendNotification($destination,$msg){
        $notification = Notification::create([
            'destination'=>$destination,
            'text'=>$msg,
            'type'=>'notification',
        ]);
        

    }

    public function sendfreindRequest($destination,$msg){
        $notification = Notification::create([
            'destination'=>$destination,
            'text'=>$msg,
            'type'=>'freind_request',
        ]);
        

    }

}