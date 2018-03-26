<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 28/08/2017
 * Time: 14:11
 */

namespace App\Http\Controllers\Admin;

use App\Excel\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Dompdf\Exception;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }

    public function index()
    {
        $users = User::all();

        return View('admin.show-customers', compact('users'));
        //return view('admin.show_users')->with('users', $users);
    }

    public function subscribe()
    {
        $subscribes = Subscribe::all();

        return View('admin.show-subscribes', compact('subscribes'));
        //return view('admin.show_users')->with('users', $users);
    }


    public function downloadExcel(){
        try {
            $newFileName = "List Subscribe_".Carbon::now('Asia/Jakarta')->format('Ymdhms');

            return Facades\Excel::download(new ExcelExport('subs'), $newFileName.'.xlsx');
        }
        catch (Exception $ex){
            //Utilities::ExceptionLog($ex);
            return response($ex, 500)
                ->header('Content-Type', 'text/plain');
        }
    }

    public function downloadMCMData(){
        try {
            $users = User::all();
            $newFileName = "88795";
            $filePath = '/88795.xls';

            $path = public_path('document/');
            Facades\Excel::load($path . $filePath, function($reader) use($users)
            {
                $reader->sheet('44_tagihan_2_periode_20171', function($sheet) use($users)
                {
                    $idx = 2;
                    foreach ($users as $user) {
                        //Set Name
                        $name = strtoupper($user->first_name . " " . $user->last_name);
                        $date = Carbon::parse($user->created_at)->format('j F Y');

                        //Set The field Data
                        $sheet->getCell('A'.$idx)->setValueExplicit($user->va_acc);
                        $sheet->getCell('D'.$idx)->setValueExplicit("IDR");
                        $sheet->getCell('E'.$idx)->setValueExplicit($name);
                        $sheet->getCell('AD'.$idx)->setValueExplicit($date);
                        $sheet->getCell('AE'.$idx)->setValueExplicit("20220831");
                        $sheet->getCell('AF'.$idx)->setValueExplicit("01\TOTAL\TOTAL\\10");
                        $sheet->getCell('AG'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AH'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AI'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AJ'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AK'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AL'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AM'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AN'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AO'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AP'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AQ'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AR'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AS'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AT'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AU'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AV'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AW'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AX'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AY'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('AZ'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('BA'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('BB'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('BC'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('BD'.$idx)->setValueExplicit("\\\\");
                        $sheet->getCell('BE'.$idx)->setValueExplicit("~");

                        $idx++;
                    }
                });
            })
            ->setFilename($newFileName)
            ->export('xlsx');
        }
        catch (Exception $ex){

        }
    }
}