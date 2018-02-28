<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 22-Sep-17
 * Time: 4:03 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }


    public function index(){
        $vendors = Vendor::orderBy('created_at', 'ASC')->get();

        return View('admin.show-vendors', compact('vendors'));
    }

    public function GetDetailVendor($id)
    {
        $vendor = Vendor::find($id);
        $user = User::find($vendor->user_id);
        $product = Product::where('vendor_id', $vendor->id)->first();

        return View('admin.show-vendor-detail', compact('vendor', 'user', 'product'));
    }

    public function RequestList(){
        $vendors = Vendor::Where('status_id', 3)->get();

        return View('admin.show-vendor-requests', compact('vendors'));
    }


    public function AcceptRequest($id){

        $vendor = Vendor::find($id);
        $vendor->status_id = 1;
        $vendor->save();


        $product = Product::where('vendor_id', $id)->first();
        $product->status_id = 1;
        $product->save();

        Session::flash('message', 'Vendor and Project Accepted!');
        return Redirect::route('vendor-request');
    }

    public function RejectRequest($id){
        $vendor = Vendor::find($id);
        $vendor->status_id = 7;
        $vendor->save();


        $product = Product::where('vendor_id', $id)->first();
        $product->status_id = 7;
        $product->save();

        Session::flash('message', 'Vendor and Project Rejected!');
        return Redirect::route('vendor-request');
    }

    public function RequestUpdate(){
        $categories = Category::all();

        return View('admin.create-update-product', compact('categories'));
    }
    public function RequestOwner(){
        $categories = Category::all();

        return View('admin.create-vendor-register', compact('categories'));
    }
    public function RequestOwnerSubmit(Request $request){

        $validator = Validator::make($request->all(),[
            'project_image'         => 'required',
            'project_name'          => 'required',
            'project_tagline'       => 'required',
            'category'              => 'required',
            'raising'               => 'required',
            'days_left'             => 'required',
            'description'           => 'required',

            'email'                 => 'required|email|max:100|unique:users',
            'phone'                 => 'required|max:20|unique:users',
            'name'            => 'required|max:100',
            'dob'            => 'required|max:100',
            'address_ktp'            => 'required|max:100',
            'marital_status'            => 'required|max:100',
            'education'            => 'required|max:100',
            'password'              => 'required|min:6|max:20|same:password',
            'password_confirmation' => 'required|same:password',
            'username'              => 'required|unique:users',
            'fb_acc'              => 'required',
            'ig_acc'              => 'required',
            'twitter_acc'              => 'required',

            'vendor_image'          => 'required',
            'name_vendor'           => 'required',
            'brand'           => 'required',
            'establish_since'           => 'required',
            'ownership'           => 'required',
            'description_vendor'    => 'required',
            'address'    => 'required',
            'postal_code'    => 'required',
            'city'    => 'required',
            'province'    => 'required',
            'phone_office'    => 'required',
            'monthly_income'    => 'required',
            'monthly_profit'    => 'required',

            'bank'                  => 'required',
            'no_rek'                => 'required',
            'acc_bank'              => 'required'
        ],
            [
                'email.email'   => 'Format Email Anda salah',
                'email.required'   => 'Email harus diisi',
                'email.unique'   => 'Email sudah pernah terdaftar',
                'name.required'   => 'Nama harus diisi',
                'phone.required'   => 'Nomor handphone harus diisi',
                'phone.unique'   => 'Nomor handphone sudah pernah terdaftar',
                'password.required'   => 'Password harus diisi',
                'password_confirmation.required'   => 'Konfirmasi Password harus diisi',
                'password_confirmation.same'   => 'Konfirmasi Password harus sama dengan Password',
                'username.required'   => 'Username harus diisi',
                'username.unique'   => 'Username sudah pernah terdaftar',
                'dob.required'   => 'Tanggal Lahir harus diisi',
                'address_ktp.required'   => 'Alamat Rumah harus diisi',
                'marital_status.required'   => 'Status Pernikahan harus diisi',
                'education.required'   => 'Pendidikan Terakhir harus diisi',
                'fb_acc.required'   => 'Akun Facebook harus diisi',
                'ig_acc.required'   => 'Akun Instagram harus diisi',
                'twitter_acc.required'   => 'Akun Twitter harus diisi',

                'project_image.required'   => 'Gambar Proyek harus diisi',
                'project_name.required'   => 'Nama Proyek harus diisi',
                'project_tagline.required'   => 'Tagline Proyek harus diisi',
                'category.required'   => 'Ketegori harus diisi',
                'raising.required'   => 'Total Pendanaan harus diisi',
                'days_left.required'   => 'Durasi Pendanaan harus diisi',
                'description.required'   => 'Deskripsi Proyek harus diisi',

                'vendor_image.required'   => 'Gambar Perusahaan harus diisi',
                'name_vendor.required'   => 'Nama Perusahaan harus diisi',
                'description_vendor.required'   => 'Deskripsi Perusahaan harus diisi',
                'brand.required'   => 'Merek/Nama Dagang harus diisi',
                'establish_since.required'   => 'Lama Usaha Berdiri harus diisi',
                'ownership.required'   => 'Kepemilikan Saham harus diisi',
                'address.required'    => 'Alamat Perusahaan harus diisi',
                'postal_code.required'    => 'Kode Pos Perusahaan harus diisi',
                'city.required'    => 'Kota Perusahaan harus diisi',
                'province.required'    => 'Provinsi Perusahaan harus diisi',
                'phone_office.required'    => 'Nomor Telepon Perusahaan harus diisi',
                'monthly_income.required'    => 'Penjualan per Bulan Perusahaan harus diisi',
                'monthly_profit.required'    => 'Keuntungan  per Bulan Perusahaan harus diisi',

                'bank.required'   => 'Bank harus diisi',
                'no_rek.required'   => 'Nomor Rekening harus diisi',
                'acc_bank.required'   => 'Akun Bank harus diisi',

            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $userID = Uuid::generate();
        $vendorID = Uuid::generate();
        $dateTimeNow = Carbon::now('Asia/Jakarta');

//        create new user
        $newUser = User::create([
            'id' =>$userID,
            'first_name' => $request['name'],
            'last_name' => "",
            'email' => $request['email'],
            'phone' => $request['phone'],
            'fb_acc' => $request['fb_acc'],
            'ig_acc' => $request['ig_acc'],
            'twitter_acc' => $request['twitter_acc'],
            'username' => $request['username'],
            'email_token' => base64_encode($request['email']),
            'status_id' => 3,
            'password' => bcrypt($request['password']),
            'created_at'        => $dateTimeNow->toDateTimeString()
        ]);

//        create new vendor
        $newVendor = Vendor::create([
            'id' =>$vendorID,
            'user_id' => $userID,
            'name' => $request['name_vendor'],
            'description' => $request['description_vendor'],
            'bank_name' => $request['bank'],
            'bank_acc_name' => $request['acc_bank'],
            'bank_acc_number' => $request['no_rek'],
            'brand'   => $request['brand'],
            'vendor_type'   => $request['vendor_type'],
            'business_type'   => $request['business_type'],
            'establish_since'   => $request['establish_since'],
            'ownership'   => $request['ownership'],
            'address'    => $request['address'],
            'postal_code'    => $request['postal_code'],
            'city'    => $request['city'],
            'province'    => $request['province'],
            'phone_office'    => $request['phone_office'],
            'monthly_income'    => $request['monthly_income'],
            'monthly_profit'    => $request['monthly_profit'],
            'fb_acc'    => $request['vendor_fb'],
            'ig_acc'    => $request['vendor_ig'],
            'twitter_acc'    => $request['vendor_tw'],
            'youtube_acc'    => $request['vendor_yt'],
            'status_id' => 3,
            'created_at'        => $dateTimeNow->toDateTimeString()
        ]);

        // Get image extension
        $img = Image::make($request->file('vendor_image'));
        $extStr = $img->mime();
        $ext = explode('/', $extStr, 2);

        $filename = $request['name_vendor'].'_'.Carbon::now('Asia/Jakarta')->format('Ymdhms'). '_0.'. $ext[1];

        $img->save(public_path('storage/owner_picture/'. $filename), 45);
        $newVendor->profile_picture = $filename;
        $newVendor->save();

//        create new product
        $newProduct = Product::create([
            'id' =>Uuid::generate(),
            'category_id' => $request['category'],
            'name' => $request['project_name'],
            'user_id' => $userID,
            'vendor_id' => $vendorID,
            'tagline' => $request['project_tagline'],
            'raising' => $request['raising'],
            'days_left' => $request['days_left'],
            'description' => $request['description'],
            'is_secondary' => 0,
            'status_id' => 3,
            'created_on'        => $dateTimeNow->toDateTimeString()
        ]);
        //get youtube code
        $url = $request['youtube'];
        if($url.contains('www.youtube.com')){
            if($url.contains('embed')){
                $splitedUrl = explode("www.youtube.com/embed/",$url);
                $newProduct->youtube_link = $splitedUrl[0];

            }
            else if($url.contains('watch?')){
                $splitedUrl = explode("www.youtube.com/watch?v=",$url);
                $newProduct->youtube_link = $splitedUrl[0];
            }
        }
        if($url.contains('youtu.be')){
            $splitedUrl = explode("youtu.be/",$url);
            $newProduct->youtube_link = $splitedUrl[0];
        }

        // Get image extension
        $img = Image::make($request->file('project_image'));
        $extStr = $img->mime();
        $ext = explode('/', $extStr, 2);

        $filename = $request['project_name'].'_'.Carbon::now('Asia/Jakarta')->format('Ymdhms'). '.'. $ext[1];

        $img->save(public_path('storage/project/'. $filename), 75);
        $newProduct->image_path = $filename;
        $newProduct->save();

        return Redirect::route('vendor-list');
    }
}