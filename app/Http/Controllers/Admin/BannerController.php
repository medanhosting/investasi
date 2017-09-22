<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 12/09/2017
 * Time: 13:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }

    public function index(){
        $banners = Banner::where('type', 1)->get();

        return View('admin.show-slider-banners', compact('banners'));
    }

    public function create(){
        $products = Product::all();

        return View('admin.create-slider-banner', compact('products'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'image'         => 'required|image|mimes:jpeg,jpg,png',
            'caption'       => 'max:100',
            'subcaption'    => 'max:100',
            'url'           => 'max:50'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if(Input::get('options') == 'yes'){
            if(Input::get('product') == '-1'){
                return redirect()->route('slider-banner-create')->withErrors('Please select a product');
            }
        }

        $banner = new Banner;
        $banner->type = 1;
        $banner->status_id = 1;
        $banner->created_at = Carbon::now('Asia/Jakarta');
        $banner->created_by = Auth::guard('user_admins')->id();

        if(!empty(Input::get('caption'))) $banner->caption = Input::get('caption');
        if(!empty(Input::get('subcaption'))) $banner->sub_caption = Input::get('subcaption');

        if(!empty($request->file('image'))){
            $img = Image::make($request->file('image'));

            // Get image extension
            $extStr = $img->mime();
            $ext = explode('/', $extStr, 2);

            $filename = 'banner1_'. Carbon::now('Asia/Jakarta')->format('Ymdhms'). '_0.'. $ext[1];

            $img->save(public_path('storage\banner' . '\\'. $filename));

            $banner->image_path = $filename;
        }

        if(Input::get('options') == 'yes'){
            $banner->product_id = Input::get('product');
        }else{
            if(!empty(Input::get('url'))) $banner->url = Input::get('url');
        }

        $banner->save();

        return redirect::route('slider-banner-list');
    }

    public function edit($id){
        $banner = Banner::find($id);
        $products = Product::all();

        $data = [
            'banner'    => $banner,
            'products'  => $products
        ];

        return View('admin.edit-slider-banner')->with($data);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'image'         => 'mimes:jpeg,jpg,png',
            'caption'       => 'max:100',
            'subcaption'    => 'max:100',
            'url'           => 'max:50'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if(Input::get('options') == 'yes'){
            if(Input::get('product') == '-1'){
                return redirect()->route('slider-banner-create')->withErrors('Please select a product');
            }
        }

        $banner = Banner::find($id);

        if(Input::get('status') == '0'){
            $banner->status_id = 2;
        }else{
            $banner->status_id = 1;
        }

        $banner->updated_at = Carbon::now('Asia/Jakarta');
        $banner->updated_by = Auth::guard('user_admins')->id();

        if(!empty(Input::get('caption'))){
            $banner->caption = Input::get('caption');
        }
        else{
            $banner->caption = null;
        }

        if(!empty(Input::get('subcaption'))){
            $banner->sub_caption = Input::get('subcaption');
        }else{
            $banner->sub_caption = null;
        }

        if(!empty($request->file('image'))){
            $img = Image::make($request->file('image'));

            // Get image extension
            $extStr = $img->mime();
            $ext = explode('/', $extStr, 2);

            $filename = 'banner1_'. Carbon::now('Asia/Jakarta')->format('Ymdhms'). '_0.'. $ext[1];

            $img->save(public_path('storage\banner' . '\\'. $filename));

            // Save old banner image
            $oldImgPath = $banner->image_path;

            // Set new banner image
            $banner->image_path = $filename;

            // Delete old banner image
            $deletedPath = storage_path('app/public/banner/'. $oldImgPath);
            if(file_exists($deletedPath)) unlink($deletedPath);
        }

        if(Input::get('options') == 'yes'){
            $banner->product_id = Input::get('product');
            $banner->url = null;
        }else{
            if(!empty(Input::get('url'))){
                $banner->url = Input::get('url');
                $banner->product_id = null;
            }
        }

        $banner->save();

        return redirect::route('slider-banner-list');
    }

    public function delete($id){
        $banner = Banner::find($id);

        // Delete banner image
        $deletedPath = storage_path('app/public/banner/'. $banner->image_path);
        if(file_exists($deletedPath)) unlink($deletedPath);

        $banner->delete();

        return redirect::route('slider-banner-list');
    }

    public function sideBannerIndex(){
        $banner1st = Banner::where('type',2)->get()->first();
        $banner2nd = Banner::where('type',3)->get()->first();
        $banner3rd = Banner::where('type',4)->get()->first();

        $data = [
            'banner1st'    => $banner1st,
            'banner2nd'    => $banner2nd,
            'banner3rd'    => $banner3rd
        ];

        return View('admin.show-side-banners')->with($data);
    }

    public function sideBannerEdit($id){
        $banner = Banner::find($id);
        $products = Product::all();

        $data = [
            'banner'    => $banner,
            'products'  => $products
        ];

        return View('admin.edit-side-banner')->with($data);
    }

    public function sideBannerUpdate(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'image'         => 'mimes:jpeg,jpg,png',
            'url'           => 'max:50'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if(Input::get('options') == 'yes'){
            if(Input::get('product') == '-1'){
                return redirect()->route('slider-banner-create')->withErrors('Please select a product');
            }
        }

        $banner = Banner::find($id);

        $banner->updated_at = Carbon::now('Asia/Jakarta');
        $banner->updated_by = Auth::guard('user_admins')->id();

        if(!empty($request->file('image'))){
            $img = Image::make($request->file('image'));

            // Get image extension
            $extStr = $img->mime();
            $ext = explode('/', $extStr, 2);

            $filename = 'banner2_'. Carbon::now('Asia/Jakarta')->format('Ymdhms'). '_0.'. $ext[1];

            $img->save(public_path('storage\banner' . '\\'. $filename));

            // Save old banner image
            $oldImgPath = $banner->image_path;

            // Set new banner image
            $banner->image_path = $filename;

            // Delete old banner image
            $deletedPath = storage_path('app/public/banner/'. $oldImgPath);
            if(file_exists($deletedPath)) unlink($deletedPath);
        }

        if(Input::get('options') == 'yes'){
            $banner->product_id = Input::get('product');
            $banner->url = null;
        }else{
            if(!empty(Input::get('url'))){
                $banner->url = Input::get('url');
                $banner->product_id = null;
            }
        }

        $banner->save();

        return redirect::route('side-banner-list');
    }
}