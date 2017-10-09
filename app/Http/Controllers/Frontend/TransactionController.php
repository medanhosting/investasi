<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 09-Oct-17
 * Time: 10:57 AM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function Portfolio()
    {
        $user = Auth::user();
        $userId = $user->id;

        $transactions = Transaction::Where('user_id', $userId);
        return View ('frontend.show-portfolio', compact('transactions'));
    }

    public function PortfolioDetail($id)
    {
        return View ('frontend.show-portfolio-detail');
    }


    public function SecondaryMarkets()
    {
        $products = Product::where('is_secondary', 1)->get();
        return View ('frontend.show-secondary-markets', compact('products'));
    }
}