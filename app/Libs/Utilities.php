<?php
/**
 * Created by PhpStorm.
 * User: GMG-Executive
 * Date: 04/10/2017
 * Time: 10:22
 */

namespace App\Libs;

use GuzzleHttp\Client;

class Utilities
{
    public static function SendSms($number, $message){
        $client = new Client([
            'base_uri' => env('URL_SMS_SERVER'),
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);

        //Set Json Object
        $myObj = [];
        $myObj = array_add($myObj, 'apikey', env('SMS_API_KEY'));
        $myObj = array_add($myObj, 'callbackurl', 'www.something.com');

        $alldata = [];
        $datapacket = [];
        $datapacket = array_add($datapacket, 'number', $number);
        $datapacket = array_add($datapacket, 'message', $message);
        $datapacket = array_add($datapacket, 'sendingdatetime', '');
        array_push($alldata, $datapacket);

        $datapacket1 = [];
        $datapacket1 = array_add($datapacket1, 'number', '111111');
        $datapacket1 = array_add($datapacket1, 'message', $message);
        $datapacket1 = array_add($datapacket1, 'sendingdatetime', '');
        array_push($alldata, $datapacket1);

        $myObj = array_add($myObj, 'datapacket', $alldata);

        $request = $client->request('POST', 'http://45.32.107.195/sms/api_sms_reguler_send_json.php', [
            'json' => $myObj
        ]);

        if($request->getStatusCode() == 200){
            $collect = json_decode($request->getBody());

            return $collect;
        }
    }
}