<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/testing', "Frontend\TestingController@TestingSendEmail")->name('testing');
//Home, contact us, term, etc
Route::get('/', 'Frontend\HomeController@Home')->name('index');
Route::get('/contact-us', 'Frontend\HomeController@ContactUs')->name('contact');
Route::get('/about-us', 'Frontend\HomeController@AboutUs')->name('about');
Route::get('/term-condition', 'Frontend\HomeController@TermCondition')->name('term-condition');
Route::get('/privacy-policy', 'Frontend\HomeController@PrivacyPolicy')->name('privacy-policy');
Route::get('/tutorial', 'Frontend\HomeController@Tutorial')->name('tutorial');
Route::get('/pengajuan', 'Frontend\HomeController@Pengajuan')->name('pengajuan');
Route::post('/contact-us-submit', 'Frontend\HomeController@ContactUsSumbit')->name('contact-submit');
Route::post('/subscribe-email', [
    'uses' => 'Frontend\HomeController@Subscribe',
    'as' => 'subscribeEmail'
]);

//blog
Route::get('/blog-list', 'Frontend\BlogController@BlogList')->name('blog-list');
//Route::get('/blog', 'Frontend\BlogController@SingleBlog')->name('blog');
Route::get('/blog/{id}', 'Frontend\BlogController@SingleBlog')->name('blog');

//profile
Route::get('/my-profile/{tab}', 'Frontend\ProfileController@Profile')->name('my-profile');
Route::get('/pendapatan', 'Frontend\ProfileController@Pendapatan')->name('pendapatan');

//Google Authenticator
Route::post('/google2fa', 'Frontend\ProfileController@VerifyGoogleAuthenticator')->name('verify-google-authenticator');
Route::post('/google2fa-login', 'Auth\LoginController@GoogleAuthenticatorLogin')->name('login-google-authenticator');
Route::post('/google2fa-deactivate', 'Frontend\ProfileController@DeactivateGoogleAuthenticator')->name('deactivate-google-authenticator');

//portfolio
Route::get('/portfolio-list/{tab}', 'Frontend\TransactionController@Portfolio')->name('portfolio');
Route::get('/portfolio/{id}', 'Frontend\TransactionController@PortfolioDetail')->name('portfolio-detail');

//secondary market
Route::get('/secondary-market', 'Frontend\TransactionController@SecondaryMarkets')->name('secondary-market');


//wallet
Route::get('/my-wallet', 'Frontend\WalletController@Wallet')->name('my-wallet');
Route::get('/deposit', 'Frontend\WalletController@DepositShow')->name('deposit');
Route::post('/deposit/topup/confirm', 'Frontend\WalletController@DepositConfirm');
Route::post('/deposit/topup', 'Frontend\WalletController@DepositSubmit');
Route::get('/deposit/topup/success/{method}/{userId}', 'Frontend\WalletController@DepositSuccess');
Route::get('/deposit/topup/failed', 'Frontend\WalletController@DepositFailed');
Route::get('/withdraw', 'Frontend\WalletController@WithdrawShow')->name('withdraw');
Route::post('/withdraw-submit', [
    'uses' => 'Frontend\WalletController@WithdrawSubmit',
    'as' => 'withdrawSubmit'
]);
Route::get('/withdraw/cancel/{id}', 'Frontend\WalletController@cancelWithdrawRequest')->name('withdraw-cancel');

//product
Route::get('/project-list/{tab}', 'Frontend\ProductController@ProductList')->name('project-list');
Route::get('/project/{id}', 'Frontend\ProductController@ProductDetail')->name('project-detail');
Route::get('/wishlist/{id}', 'Frontend\ProductController@wishlist')->name('wishlist');
Route::get('/download/{filename}', 'Frontend\ProductController@DownloadFile')->name('download');
Route::post('/register-prospectus', [
    'uses' => 'Frontend\ProductController@GetProspectus',
    'as' => 'get-prospectus'
]);

//investor
Route::get('/project-request', 'Frontend\ProductController@ProductList')->name('investor-request');

//payment
Route::prefix('/payment')->group(function (){
    Route::get('/checkout/{id}', 'Frontend\PaymentController@checkout')->name('checkout');
    Route::post('/confirm/{investId}', 'Frontend\PaymentController@pay');
    Route::get('/success/cc/{userId}', 'Frontend\PaymentController@successCC');
    Route::get('/success/va', 'Frontend\PaymentController@successVA');
    Route::get('/failed/{investId}', 'Frontend\PaymentController@failed');
    Route::get('/test', 'Frontend\PaymentController@test');
});

//Referral
Route::get('/referral', 'Frontend\ReferralController@ShowReferral');

//Vendor
Route::get('/owner/{vendorObj}', 'Frontend\VendorController@show')->name('vendor-profile-show');
Route::get('/pengajuan-update', 'Frontend\VendorController@RequestUpdate')->name('update-request');


//End Frontend Routing

// Rajaongkir
Route::get('rajaongkir/subdistrict/{cityId}', 'frontend\UserAddressController@getSubdistrict');

// admin Routing
Route::get('/admin', 'Admin\DashboardController@dashboardShow')->name('admin-dashboard');

Route::get('/investasi-saya', function (){
    return view('admin/login');
})->name('login-admin');

Route::get('/investasi-saya/{failed}', function ($failed){
    $msg = "Not Found!";
    return view('admin/login')->with('msg', $msg);
})->name('login-admin-failed');

// User
Route::get('/admin/customer', 'Admin\CustomerController@index')->name('customer-list');
Route::get('/admin/subscribe', 'Admin\CustomerController@subscribe')->name('subscribe-list');
Route::get('/download-subscribe', 'Admin\CustomerController@downloadExcel')->name('download-subscribe');
Route::get('/download-mcm', 'Admin\CustomerController@downloadMCMData')->name('download-mcm');

Route::post('/admin', 'Auth\LoginAdminController@login');
Route::get('/admin', 'Admin\DashboardController@index')->name('admin-dashboard');
Route::get('/admin/logout', 'Auth\LoginAdminController@logout')->name('admin-logout');

// Product
Route::prefix('/admin/product')->group(function (){
    Route::get('/', 'Admin\ProductController@index')->name('product-list');
    Route::get('/request', 'Admin\ProductController@ProductRequest')->name('product-request');
    Route::get('/request-news/{productId}', 'Admin\ProductController@RequestBlogProduct')->name('product-news-request');
    Route::post('/', 'Admin\ProductController@store');
    Route::get('/create', 'Admin\ProductController@create')->name('product-create');
    Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('product-edit');
    Route::post('/{id}', 'Admin\ProductController@update');
});

// Transaction
Route::prefix('admin/transaction')->group(function(){
    Route::get('/', 'Admin\TransactionController@index')->name('transaction-list');
    Route::get('/detail/{id}', 'Admin\TransactionController@detail')->name('transaction-detail');
});
Route::get('/admin/neworder', 'Admin\TransactionController@newOrder')->name('new-order-list');
Route::get('/admin/neworder/accept/{id}', 'Admin\TransactionController@acceptOrder')->name('new-order-accept');
Route::post('/admin/neworder/reject', 'Admin\TransactionController@rejectOrder')->name('new-order-accept');
Route::get('/admin/payment', 'Admin\TransactionController@payment')->name('payment-list');
Route::get('/admin/payment/confirm/{id}', 'Admin\TransactionController@confirmPayment')->name('payment-confirm');
Route::get('/admin/delivery', 'Admin\TransactionController@deliveryRequest')->name('delivery-list');
Route::post('/admin/delivery/confirm', 'Admin\TransactionController@confirmDelivery')->name('delivery-confirm');
Route::get('/track/{id}', 'Admin\TransactionController@track')->name('track');

// Slider Banner
Route::prefix('/admin/banner/slider')->group(function(){
    Route::get('/', 'Admin\BannerController@index')->name('slider-banner-list');
    Route::post('/', 'Admin\BannerController@store');
    Route::get('/create', 'Admin\BannerController@create')->name('slider-banner-create');
    Route::get('/edit/{id}', 'Admin\BannerController@edit')->name('slider-banner-edit');
    Route::post('/{id}', 'Admin\BannerController@update');
    Route::get('/delete/{id}', 'Admin\BannerController@delete');
});

// Side Banner
Route::prefix('/admin/banner/side')->group(function(){
    Route::get('/', 'Admin\BannerController@sideBannerIndex')->name('side-banner-list');
    Route::get('/edit/{id}', 'Admin\BannerController@sideBannerEdit')->name('side-banner-edit');
    Route::post('/{id}', 'Admin\BannerController@sideBannerUpdate');
});

// Content
Route::prefix('admin/content')->group(function(){
    Route::get('/edit', 'Admin\ContentController@edit')->name('content-edit');
    Route::post('/edit/{id}', 'Admin\ContentController@update')->name('content-edit-submit');
});

// Category
Route::prefix('admin/category')->group(function(){
    Route::get('/', 'Admin\CategoryController@index')->name('category-list');
    Route::post('/', 'Admin\CategoryController@store');
    Route::get('/create', 'Admin\CategoryController@create')->name('category-create');
    Route::get('/edit/{id}', 'Admin\CategoryController@edit');
    Route::post('/{id}', 'Admin\CategoryController@update');
});

// Paymentmethods
Route::prefix('admin/paymentmethods')->group(function(){
    Route::get('/', 'Admin\PaymentMethodController@index')->name('payment-method-show');
    Route::post('/', 'Admin\PaymentMethodController@store');
    Route::get('/create', 'Admin\PaymentMethodController@create')->name('payment-method-create');
    Route::get('/edit/{id}', 'Admin\PaymentMethodController@edit');
    Route::post('/{id}', 'Admin\PaymentMethodController@update');
    Route::get('/delete/{id}', 'Admin\PaymentMethodController@destroy');
});

// Courier
Route::prefix('admin/courier')->group(function(){
    Route::get('/', 'Admin\CourierController@index')->name('courier-list');
    Route::post('/', 'Admin\CourierController@store');
    Route::get('/create', 'Admin\CourierController@create')->name('courier-create');
    Route::get('/edit/{id}', 'Admin\CourierController@edit');
    Route::post('/{id}', 'Admin\CourierController@update');
    Route::get('/delete/{id}', 'Admin\CourierController@destroy');
});

// Delivery Type
Route::prefix('admin/delivery-type')->group(function(){
    Route::get('/', 'Admin\DeliveryTypeController@index')->name('delivery-type-list');
    Route::post('/', 'Admin\DeliveryTypeController@store');
    Route::get('/create', 'Admin\DeliveryTypeController@create')->name('delivery-type-create');
    Route::get('/edit/{id}', 'Admin\DeliveryTypeController@edit');
    Route::post('/{id}', 'Admin\DeliveryTypeController@update');
    Route::get('/delete/{id}', 'Admin\DeliveryTypeController@destroy');
});

// Status
Route::prefix('admin/status')->group(function(){
    Route::get('/', 'Admin\StatusController@index')->name('status-list');
    Route::post('/', 'Admin\StatusController@store');
    Route::get('/create', 'Admin\StatusController@create')->name('status-create');
    Route::get('/edit/{id}', 'Admin\StatusController@edit');
    Route::post('/{id}', 'Admin\StatusController@update');
    Route::get('/delete/{id}', 'Admin\StatusController@destroy');
});

// Admin Options
Route::get('/admin/option/address', 'Admin\OptionController@index')->name('store-address');
Route::post('/admin/option/address/save', 'Admin\OptionController@update');
Route::get('/admin/option/city', 'Admin\OptionController@getCities');
Route::get('/admin/option/subdistrict', 'Admin\OptionController@getSubdistricts');
// report
Route::prefix('admin/report')->group(function(){
    Route::get('/form', 'Admin\ReportController@index')->name('report-form');
    Route::post('/', 'Admin\ReportController@request');
    Route::get('/show', 'Admin\ReportController@show')->name('report-preview');
});

// Admin
Route::prefix('admin/user')->group(function(){
    Route::get('/list', 'Admin\AdminController@index')->name('admin-list');
    Route::get('/tambah', 'Admin\AdminController@create')->name('admin-create');
    Route::post('/', 'Admin\AdminController@store');
    Route::get('/show/{id}', 'Admin\AdminController@show')->name('admin-show');
    Route::get('/edit/{id}', 'Admin\AdminController@edit')->name('admin-edit');
    Route::post('/save/{id}', 'Admin\AdminController@update');
    Route::get('/password/{id}', 'Admin\AdminController@passwordEdit')->name('admin-password-edit');
    Route::post('/password/save/{id}', 'Admin\AdminController@passwordUpdate');
});

// User
Route::get('/admin/customer', 'Admin\CustomerController@index')->name('customer-list');

Route::post('/admin', 'Auth\LoginAdminController@login');
Route::get('/admin', 'Admin\DashboardController@index')->name('admin-dashboard');
Route::get('/admin/logout', 'Auth\LoginAdminController@logout')->name('admin-logout');

// Vendor
Route::prefix('admin/vendor')->group(function(){
    Route::get('/', 'Admin\VendorController@index')->name('vendor-list');
    Route::get('/detail/{id}', 'Admin\VendorController@GetDetailVendor')->name('vendor-detail');
    Route::get('/request', 'Admin\VendorController@RequestList')->name('vendor-request');
    Route::get('/request-accept/{id}', 'Admin\VendorController@AcceptRequest');
    Route::get('/request-reject/{id}', 'Admin\VendorController@RejectRequest');

    Route::get('/pengajuan-owner', 'Admin\VendorController@RequestOwner')->name('vendor-request-form');
    Route::post('/pengajuan-owner', 'Admin\VendorController@RequestOwnerSubmit')->name('vendor-request-submit');
});

// Wallet
Route::prefix('admin/dompet')->group(function(){
    Route::get('/', 'Admin\DompetController@index')->name('dompet-list');
    Route::get('/request', 'Admin\DompetController@newRequest')->name('dompet-request');
    Route::get('/detail/{id}', 'Admin\TransactionController@detail')->name('transaction-detail');
    Route::get('/accept/{id}', 'Admin\DompetController@AcceptOrder');
    Route::get('/reject/{id}', 'Admin\DompetController@RejectOrder');
    Route::get('/download-wallet', 'Admin\DompetController@downloadExcel')->name('download-wallet');
});

// Blog
Route::prefix('admin/blog')->group(function(){
    Route::get('/', 'Admin\BlogController@index')->name('admin-blog-list');
    Route::get('/create', 'Admin\BlogController@create')->name('blog-create');
    Route::post('/create/save', 'Admin\BlogController@store');
    Route::get('/edit/{id}', 'Admin\BlogController@edit')->name('blog-edit');
    Route::post('/edit/update/{id}', 'Admin\BlogController@update');
    Route::get('/update', 'Admin\BlogController@indexUpdate')->name('admin-blog-update-list');
    Route::get('/accept/{id}', 'Admin\BlogController@accept')->name('blog-accept');
    Route::get('/reject/{id}', 'Admin\BlogController@reject')->name('blog-reject');
});

//// Owner
//Route::prefix('admin/owner')->group(function(){
//    Route::get('/list', 'Admin\OwnerController@GetListedOwner')->name('owner-list');
//    Route::get('/detail/{id}', 'Admin\OwnerController@GetDetailOwner')->name('owner-detail');
//    Route::get('/accept/{id}', 'Admin\OwnerController@AcceptOwner')->name('owner-accept');
//    Route::get('/reject/{id}', 'Admin\OwnerController@RejectOwner')->name('owner-reject');
//});

// Coupon
Route::prefix('admin/coupon')->group(function(){
    Route::get('/list', 'Admin\CouponController@index')->name('coupon-index');
    Route::get('/create', 'Admin\CouponController@create')->name('coupon-create');
    Route::post('/store', 'Admin\CouponController@store')->name('coupon-store');
    Route::get('/edit/{id}', 'Admin\CouponController@edit')->name('coupon-edit');
    Route::post('/update/{id}', 'Admin\CouponController@update')->name('coupon-update');
    Route::get('/activate/{id}', 'Admin\CouponController@Activate')->name('coupon-activate');
    Route::get('/deactivate/{id}', 'Admin\CouponController@Deactivate')->name('coupon-deactivate');
});

// End admin Routing

// Sms Routing Start
Route::get('/send-verification-number', 'Frontend\PhoneNumberController@VerifyPhoneNumber')->name('verify-phone-show');
Route::post('/verification-number', 'Frontend\PhoneNumberController@Verify')->name('verify-phone');
// Sms Routing End

// Auth Routing Start
Route::view('/send-email', 'auth.send-email');
// Auth Routing End

Auth::routes();

Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

// Photo Verification
Route::get('/verifyphoto', 'Frontend\VerificationController@VerifyPhoto')->name("verify-photo");
Route::post('/verifyphoto', 'Frontend\VerificationController@UploadPhoto');
Route::get('/verifysignaturephoto', 'Frontend\VerificationController@VerifySignaturePhoto')->name("verify-signature-photo");
Route::post('/verifysignaturephoto', 'Frontend\VerificationController@UploadSignaturePhoto');
// Photo Verification

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', 'Frontend\ProfileController@GoogleMap')->name('map');
Route::post('/map', 'Frontend\ProfileController@GoogleMapSubmit')->name('map-submit');

Route::post('/checkout-notification', [
    'uses' => 'MidtransController@notification',
    'as' => 'checkoutNotification'
]);