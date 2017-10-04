<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 27-Sep-17
 * Time: 2:14 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ProductList()
    {
        $user = Auth::user();
        $userId = $user->id;

        $products = Product::all();
        return View ('frontend.show-products', compact('products'));
    }

    public function ProductDetail($id)
    {

        return View ('frontend.show-product');
    }
}