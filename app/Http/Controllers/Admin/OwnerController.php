<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\In;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }

    //
    public function GetListedOwner()
    {
        $allOwners = Vendor::orderBy('created_at', 'DESC')->get();

        return View('admin.show-owners', compact('allOwners'));
    }

    public function GetDetailOwner($id)
    {
        $owner = Vendor::find($id);
        $user = User::find($owner->user_id);
        $product = Product::where('vendor_id', $owner->id)->first();

        return View('admin.detail-owner', compact('owner', 'user', 'product'));
    }

    public function AcceptOwner($id)
    {
        $product = Product::find($id);
        $product->status_id = 1;
        $product->save();

        $vendor = Vendor::find($product->vendor_id);
        $vendor->status_id = 1;
        $vendor->save();

        Session::flash('message', 'Vendor dan Project Accepted!');

        return redirect::route('owner-list');
    }

    public function RejectOwner($id)
    {
        $product = Product::find($id);
        $product->status_id = 7;
        $product->save();

        $vendor = Vendor::find($product->vendor_id);
        $vendor->status_id = 7;
        $vendor->save();

        Session::flash('message', 'Vendor dan Project Rejected!');

        return redirect::route('owner-list');
    }
}
