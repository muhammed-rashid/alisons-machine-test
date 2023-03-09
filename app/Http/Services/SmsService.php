<?php
namespace App\Http\Services;

class SmsService{

    public function sendSms($mobile,$message){

        $key = config('app.neximo_key');
        $password = config('app.neximo_password');
        $neximo_to = config('app.neximo_to');

      
        try{
            $basic  = new \Nexmo\Client\Credentials\Basic($key,$password);
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => $neximo_to,
                'from' => $message['from'],
                'text' => $message['text']
            ]);
     
            return true;

        }catch(\Exception $e){
            return false;
        }
        


    }
}

?>