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
}