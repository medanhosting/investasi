<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 09-Oct-17
 * Time: 10:57 AM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Libs\UrgentNews;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function GetChartData(){
        $user = Auth::user();
        $userId = $user->id;

        $parentArr = [];
        $colsArr = [];
        $rowsArr = [];

    }

    public function Portfolio()
    {
        if(!auth()->check()){
            return redirect()->route('index');
        }

        $user = Auth::user();
        $userId = $user->id;
        $blogs = UrgentNews::GetBlogList($userId);

        if(count($blogs) > 0){
            return View('frontend.show-blog-urgents', compact('blogs'));
        }

        $productSahamHasil = Product::select('id')->wherein('category_id', [1, 3])->where('status_id', 1)->get();
        $productHutang = Product::select('id')->where('category_id', 2)->where('status_id', 1)->get();

        $transactionPending = Transaction::where('user_id', $userId)->where('status_id', 3)->get();
        $transactionSahamHasil = Transaction::where('user_id', $userId)->wherein('product_id', $productSahamHasil)->get();
        $transactionHutang = Transaction::where('user_id', $userId)->wherein('product_id', $productHutang)->get();

        $userDompet = $user->wallet_amount;
        $userPendapatan = $user->income;
        $userInvestasi = Transaction::where('user_id', $userId)->sum('total_price');
        $userInvestasiFormated = number_format($userInvestasi,0, ",", ".");




//        return View ('frontend.show-portfolio',
//            compact('transactionPending','transactionSahamHasil',
//            'transactionHutang'));
        $data = [
            'transactionPending'=>$transactionPending,
            'transactionSahamHasil'=>$transactionSahamHasil,
            'transactionHutang'=>$transactionHutang,
            'userDompet'=>$userDompet,
            'userPendapatan'=>$userPendapatan,
            'userInvestasi'=>$userInvestasiFormated
        ];
        return View ('frontend.show-portfolio')->with($data);
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