<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 27-Sep-17
 * Time: 2:14 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function Profile()
    {
        return View ('frontend.show-profile');
    }

    public function Portfolio()
    {
        return View ('frontend.show-portfolio');
    }

    public function Wallet()
    {
        return View ('frontend.show-wallet');
    }
}