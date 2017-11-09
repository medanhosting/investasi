<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 30/10/2017
 * Time: 10:05
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;


class VendorController extends Controller
{
    public function show(Vendor $vendorObj){
        $vendor = $vendorObj;

        return View('frontend.show-vendor-profile', compact('vendor'));
    }
    public function RequestUpdate(){
        $categories = Category::all();

        return View('frontend.create-update-product', compact('categories'));
    }
    public function RequestOwner(){
        $categories = Category::all();

        return View('frontend.create-owner-register', compact('categories'));
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
                'first_name'            => 'required|max:100',
                'last_name'             => 'required|max:100',
                'phone'                 => 'required|max:20|unique:users',
                'password'              => 'required|min:6|max:20|same:password',
                'password_confirmation' => 'required|same:password',
                'username'              => 'required|unique:users',

                'vendor_image'          => 'required',
                'name_vendor'           => 'required',
                'description_vendor'    => 'required',
                'bank'                  => 'required',
                'no_rek'                => 'required',
                'acc_bank'              => 'required'
            ],
            [
                'email.email'   => 'Format Email Anda salah',
                'email.required'   => 'Email harus diisi',
                'email.unique'   => 'Email sudah pernah terdaftar',
                'first_name.required'   => 'First Name harus diisi',
                'last_name.required'   => 'Last Name harus diisi',
                'phone.required'   => 'Nomor handphone harus diisi',
                'phone.unique'   => 'Nomor handphone sudah pernah terdaftar',
                'password.required'   => 'Password harus diisi',
                'password_confirmation.required'   => 'Konfirmasi Password harus diisi',
                'password_confirmation.same'   => 'Konfirmasi Password harus sama dengan Password',
                'username.required'   => 'Username harus diisi',
                'username.unique'   => 'Username sudah pernah terdaftar',

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
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
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
        // Get image extension
        $img = Image::make($request->file('project_image'));
        $extStr = $img->mime();
        $ext = explode('/', $extStr, 2);

        $filename = $request['project_name'].'_'.Carbon::now('Asia/Jakarta')->format('Ymdhms'). '.'. $ext[1];

        $img->save(public_path('storage/project/'. $filename), 75);
        $newProduct->image_path = $filename;
        $newProduct->save();

        return View('frontend.show-owner-register-submited');
    }
}