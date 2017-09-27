<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 27-Sep-17
 * Time: 2:14 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function ProductList()
    {
        return View ('frontend.show-products');
    }

    public function ProductDetail()
    {
        return View ('frontend.show-product');
    }
}