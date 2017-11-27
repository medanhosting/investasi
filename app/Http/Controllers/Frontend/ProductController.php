<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 27-Sep-17
 * Time: 2:14 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Libs\UrgentNews;
use App\Models\Blog;
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
    public function ProductList($tab)
    {
//        $user = Auth::user();
//        $userId = $user->id;

        if(auth()->check()){
            $user = Auth::user();
            $userId = $user->id;
            $blogs = UrgentNews::GetBlogList($userId);

            if(count($blogs) > 0){
                return View('frontend.show-blog-urgents', compact('blogs'));
            }
        }
        $products = Product::where('is_secondary', 0)->get();

        $product_debts =Product::where('category_id','=', 1)->where('is_secondary','=', 0)->get();
        $product_equities =Product::where('category_id','=', 2)->where('is_secondary','=', 0)->get();
        $product_sharings =Product::where('category_id','=', 3)->where('is_secondary','=', 0)->get();


        $isActiveDebt = ""; $isActiveEquity = "";$isActiveSharing = "";
        $isActiveTabDebt = "";$isActiveTabEquity = "";$isActiveTabSharing = "";
        if($tab == "debt") {
            $isActiveDebt = "in active";
            $isActiveTabDebt = "class=active";
        }
        else if($tab == "equity") {
            $isActiveEquity = "in active";
            $isActiveTabEquity = "class=active";
        }
        else if($tab == "sharing") {
            $isActiveSharing = "in active";
            $isActiveTabSharing = "class=active";
        }

//        return View ('frontend.show-products', compact('product_debts', 'product_equities', 'product_sharings'));

        $data = [
            'product_debts'=>$product_debts,
            'product_equities'=>$product_equities,
            'product_sharings'=>$product_sharings,
            'isActiveDebt'=>$isActiveDebt,
            'isActiveEquity'=>$isActiveEquity,
            'isActiveSharing'=>$isActiveSharing,
            'isActiveTabDebt'=>$isActiveTabDebt,
            'isActiveTabEquity'=>$isActiveTabEquity,
            'isActiveTabSharing'=>$isActiveTabSharing
        ];
        return View ('frontend.show-products')->with($data);
    }

    public function ProductDetail($id)
    {
        $product = Product::find($id);
        $vendor = null;
        $vendorDesc = null;
        $projectCount = 1;
        if(!empty($product->vendor_id)){
            $vendor = Vendor::find($product->vendor_id);
            $projectCount = Product::where('vendor_id', $product->vendor_id)->count();

            //get description vendor
            $vendorDesc = Utilities::TruncateString($vendor->description);
        }

        $userId = null;
        if(auth()->check()){
            $user = Auth::user();
            $userId = $user->id;
        }
        $projectNews = Blog::where('product_id', $id)->orderByDesc('created_at')->get();


        return View ('frontend.show-product', compact('product', 'vendor', 'vendorDesc', 'projectNews', 'projectCount', 'userId'));
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