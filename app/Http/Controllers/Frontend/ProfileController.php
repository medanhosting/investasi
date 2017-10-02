<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 27-Sep-17
 * Time: 2:14 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\WalletStatement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Profile()
    {
        return View ('frontend.show-profile');
    }

    public function Portfolio()
    {
        $user = Auth::user();
        $userId = $user->id;

        $transactions = Transaction::Where('user_id', $userId);
        return View ('frontend.show-portfolio', compact('transactions'));
    }

    public function Wallet()
    {
        $user = Auth::user();
        $userId = $user->id;

        $statments = WalletStatement::Where('user_id', $userId);
        return View ('frontend.show-wallet', compact('statments'));
    }
    public function WithdrawShow()
    {
        $user = Auth::user();
        $userId = $user->id;

        return View ('frontend.wallet-withdraw');
    }
    public function DepositShow()
    {
        $user = Auth::user();
        $userId = $user->id;

        $statments = WalletStatement::Where('user_id', $userId);
        return View ('frontend.wallet-deposit', compact('statments'));
    }
}