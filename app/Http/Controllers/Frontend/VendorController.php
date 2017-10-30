<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 30/10/2017
 * Time: 10:05
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function show(Vendor $vendorObj){
        $vendor = $vendorObj;

        return View('frontend.show-vendor-profile', compact('vendor'));
    }
}