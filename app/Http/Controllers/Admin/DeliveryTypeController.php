<?php

namespace App\Http\Controllers\Admin;

use App\Models\Courier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeliveryType;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DeliveryTypeController extends Controller
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
        //
        $deliveryTypes = DeliveryType::all();

        //dd($deliveryTypes);
        return View('admin.show-delivery-types', compact('deliveryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $couriers = Courier::all();

        return View('admin.create-delivery-type', compact('couriers'));
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
        $validator = Validator::make($request->all(), [
            'code'          => 'required|max:20',
            'courier'       => 'required|option_not_default',
            'description'   => 'required|max:100',
        ],[
            'option_not_default'    => 'Select a courier'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        DeliveryType::create([
            'code'          => Input::get('code'),
            'description'   => Input::get('description'),
            'courier_id'    => Input::get('courier'),
            'status_id'     => 1
        ]);

        Session::flash('message', 'Create Success!');

        return redirect('/admin/delivery-type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery = DeliveryType::find($id);
        $couriers = Courier::all();

        $data = [
            'delivery'  => $delivery,
            'couriers'  => $couriers
        ];

        return View('admin.edit-delivery-type')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code'          => 'required|max:20',
            'courier_id'    => 'required|option_not_default',
            'description'   => 'required|max:100',
        ],[
            'option_not_default'    => 'Select a delivery type'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $delivery = DeliveryType::find($id);
        $delivery->code = Input::get('code');
        $delivery->description = Input::get('description');
        $delivery->courier_id = Input::get('courier');
        $delivery->status_id = Input::get('status');

        $delivery->save();

        return redirect('/admin/delivery-type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
