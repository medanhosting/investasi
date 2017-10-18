<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 18-Oct-17
 * Time: 2:23 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GuestProspectus;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\SendProspectus;
use App\Libs\Utilities;


class InvestorController extends Controller
{
    public function RequestInvestor()
    {
        return View ('frontend.show-investor-request');
    }
}