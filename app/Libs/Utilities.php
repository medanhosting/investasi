<?php
/**
 * Created by PhpStorm.
 * User: GMG-Executive
 * Date: 04/10/2017
 * Time: 10:22
 */

namespace App\Libs;

use App\Models\Transaction;
use GuzzleHttp\Client;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Carbon\Carbon;

class Utilities
{
    //generate invoice number
    public static function GenerateInvoice() {
        $start = Carbon::yesterday('Asia/Jakarta');
        $end = Carbon::tomorrow('Asia/Jakarta');
        $date = date_format($start, 'dmy');

        $transactionCount = Transaction::whereBetween('created_on', [$start->toDateString(),$end->toDateString()])->count();
        $number = str_pad($transactionCount+1, 3, '0', STR_PAD_LEFT);

        return "INV".$date.$number;
    }

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
        $myObj = array_add($myObj, 'callbackurl', 'www.investasi.me');

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


    public static function ExceptionLog($ex){
        $logContent = ['id' => 1,
            'description' => $ex];

        $log = new Logger('exception');
        $log->pushHandler(new StreamHandler(storage_path('logs/error.log')), Logger::ALERT);
        $log->info('exception', $logContent);
    }

    public static function TruncateString($oldString){
        $string = strip_tags($oldString);
        if (strlen($string) > 150) {

            // truncate string
            $stringCut = substr($string, 0, 150);

            // make sure it ends in a word so assassinate doesn't become ass...
            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
        }
        return $string;
    }
}