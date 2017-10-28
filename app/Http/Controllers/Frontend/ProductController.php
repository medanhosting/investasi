<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 27-Sep-17
 * Time: 2:14 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GuestProspectus;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\SendProspectus;
use App\Libs\Utilities;

class ProductController extends Controller
{
    public function ProductList()
    {
//        $user = Auth::user();
//        $userId = $user->id;

        $products = Product::where('is_secondary', 0)->get();

        $product_debts =Product::where('category_id','=', 1)->where('is_secondary','=', 0)->get();
        $product_equities =Product::where('category_id','=', 2)->where('is_secondary','=', 0)->get();
        $product_sharings =Product::where('category_id','=', 3)->where('is_secondary','=', 0)->get();

        return View ('frontend.show-products', compact('product_debts', 'product_equities', 'product_sharings'));
    }

    public function ProductDetail($id)
    {
        $product = Product::find($id);
        $vendor = null;
        if(!empty($product->vendor_id)){
            $vendor = Vendor::find($product->vendor_id);
        }
        return View ('frontend.show-product', compact('product', 'vendor'));
    }

    public function DownloadFile($filename)
    {
        $file_path = public_path('files/'.$filename);
        return response()->download($file_path);
    }
    public function GetProspectus(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'    => 'required|max:100',
            'email'      => 'required|email|max:100'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        else {
            $dateTimeNow = Carbon::now('Asia/Jakarta');
            $name = Input::get('name');
            $email = Input::get('email');
            $id = Input::get('id');
            try
            {
                $newGuestProspectus = GuestProspectus::create([
                    'name'       => $name,
                    'email'       => $email,
                    'date'         => $dateTimeNow->toDateTimeString(),
                ]);
                $newGuestProspectus->save();

                //change valid file name
                $file_path = public_path('files/test.pdf');

                $emailVerify = new SendProspectus($file_path);
                Mail::to($email)->send($emailVerify);

                return redirect()->route('project-detail', ['id' => $id]);
            }
            catch (\Exception $ex)
            {
                Utilities::ExceptionLog('GetProspectus EX = '. $ex);
                return redirect()->route('project-detail', ['id' => $id]);
            }
        }

//        $file_path = public_path('files/'.$filename);
//        return response()->download($file_path);
    }
}