<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\UserAdmin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();

        return View('admin.show-coupon', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.create-coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'amount'    => 'required'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $adminId = Auth::guard('user_admins')->user()->id;
        $admin = UserAdmin::find($adminId);

        //dd($admin);

        Coupon::create([
            'name'          => Input::get('name'),
            'amount'        => Input::get('amount'),
            'status_id'     => 1,
            'created_by'    => $admin->id,
            'created_at'    => Carbon::now('Asia/Jakarta')
        ]);

        Session::flash('message', 'Create Coupon Success!');
        return redirect::route('coupon-index');
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return View('admin.edit-coupon', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name'      => 'required',
            'amount'    => 'required'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $coupon = Coupon::find($id);
        $coupon->name = Input::get('name');
        $coupon->amount = Input::get('amount');
        $coupon->save();

        Session::flash('message', 'Update Coupon Success!');

        return redirect::route('coupon-index');
    }

    public function Activate($id)
    {
        $coupon = Coupon::find($id);
        $coupon->status_id = 1;

        $coupon->save();

        Session::flash('message', 'Coupon Activation Success!');
        return redirect::route('coupon-index');
    }

    public function Deactivate($id)
    {
        $coupon = Coupon::find($id);
        $coupon->status_id = 2;

        $coupon->save();

        Session::flash('message', 'Coupon Deactivation Success!');
        return redirect::route('coupon-index');
    }
}
