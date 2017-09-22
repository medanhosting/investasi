<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 30/08/2017
 * Time: 12:01
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return View('admin.show-payment-methods', compact('paymentMethods'));
    }

    public function create()
    {
        return View('admin.create-payment-method');
    }

    public function store()
    {
        $this->validate(request(), [
            'description' => 'required'
        ]);

        PaymentMethod::create([
            'description'       => Input::get('description'),
            'type'              => Input::get('type'),
            'status_id'         => 1
        ]);

        Session::flash('message', 'Create Success!');

        return redirect('/admin/paymentmethods');
    }

    public function edit($id)
    {
        $payment = PaymentMethod::find($id);
        return View('admin.edit-payment-method', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'description' => 'required'
        ]);

        $payment = PaymentMethod::find($id);

        $payment->description = Input::get('description');
        $payment->type = Input::get('type');

        if(!empty(Input::get('fee'))){
            $payment->fee = str_replace('.','', Input::get('fee'));
        }

        $payment->status_id = Input::get('status');
        $payment->save();

        Session::flash('message', 'Update Success!');

        return redirect('admin/paymentmethods');
    }

    public function destroy($id)
    {
        PaymentMethod::destroy($id);

        Session::flash('message', 'Success Deleting Payment Method!!!');

        return redirect('admin/paymentmethods');
    }
}