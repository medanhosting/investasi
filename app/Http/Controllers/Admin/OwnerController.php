<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Support\Facades\Input;
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
        $allOwners = Vendor::where('status_id', 3)->get();

        return View('admin.show-owners', compact('allOwners'));
    }

    public function GetDetailOwner($id)
    {
        $owner = Vendor::find($id);

        return View('', compact('owner'));
    }
}
