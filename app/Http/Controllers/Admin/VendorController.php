<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 22-Sep-17
 * Time: 4:03 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }


    public function index(){
        $vendors = Vendor::all();

        return View('admin.show-vendors', compact('vendors'));
    }

    public function RequestList(){
        $vendors = Vendor::Where('status_id', 3)->get();

        return View('admin.show-vendor-requests', compact('vendors'));
    }


    public function AcceptRequest($id){
        $vendor = Vendor::find($id);

        if($vendor == null){
            Session::flash('error', 'Vendor Not Found!');

            return Redirect::route('vendor-request');
        }

        $vendor->id = 1;
        $vendor->save();

        Session::flash('message', 'Success Accepting Vendor!');
        return Redirect::route('vendor-request');
    }

    public function RejectRequest($id){
        $vendor = Vendor::find($id);

        if($vendor == null){
            Session::flash('error', 'Vendor Not Found!');

            return Redirect::route('vendor-request');
        }

        $vendor->id = 7;
        $vendor->save();

        Session::flash('message', 'Success Rejecting Vendor!');
        return Redirect::route('vendor-request');
    }

}