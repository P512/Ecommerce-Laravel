<?php

use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\HomeController;
use App\Livewire\Admin\Brand\Index;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::controller(FrontendController::class)->group(function ()
    {
        Route::get('/','index');
        Route::get('/aboutus','about');
        Route::get('/contactus','contact');
        Route::post('/about','message_store');
        Route::get('/collections','categories');
        Route::get('/collections/{category_slug}','products');
        Route::get('/collections/{category_slug}/{product_slug}','productView');
        Route::get('/new-arrivals','newArrival');
        Route::get('/trending-products','trendingProducts');
        Route::get('/featured-products','featuredProducts');
        Route::get('search','searchProducts');
    });

Route::middleware(['auth'])->group(function(){
    Route::get('wishlist',[WishListController::class,'index']);
    Route::get('cart',[CartController::class, 'index']);
    Route::get('checkout',[CheckoutController::class, 'index']);
    Route::get('orders',[OrderController::class,'index']);
    Route::get('orders/{orderId}',[OrderController::class,'show']);
    Route::get('profile',[UserController::class,'index']);
    Route::post('profile',[UserController::class,'updateUserDetails']);
    Route::get('change-password',[UserController::class,'passwordCreate']);
    Route::post('change-password',[UserController::class,'changePassword']);
});

Route::get('thank-you',[FrontendController::class,'thankyou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard', [DashboardController::class,'index']);

    Route::get('attributes', [AttributesController::class,'index']);
    Route::get('attributes/create', [AttributesController::class,'create']);
    Route::post('attributes/create', [AttributesController::class,'store']);
    Route::get('attributes/{attribute}/edit', [AttributesController::class,'edit']);
    Route::put('attributes/{attribute}', [AttributesController::class,'update']);
    Route::get('attributes/{attribute}/delete', [AttributesController::class,'destroy']);

    Route::get('attributes/details', [AttributesController::class,'indexdata']);
    Route::get('attributes/create_details', [AttributesController::class,'create_details']);
    Route::post('attributes/create_details', [AttributesController::class,'store_details']);
    Route::get('attributes/details/{details}/edit', [AttributesController::class,'edit_details']);
    Route::put('attributes/details/{attribute}', [AttributesController::class,'update_details']);
    Route::get('attributes/details/{attribute}/delete', [AttributesController::class,'destroy_details']);



    Route::get('settings', [SettingController::class,'index']);
    Route::post('settings',[SettingController::class, 'store']);


    Route::controller(SliderController::class)->group(function (){
        Route::get('sliders','index');
        Route::get('sliders/create','create');
        Route::post('sliders/create','store');
        Route::get('sliders/{slider}/edit','edit');
        Route::put('sliders/{slider}','update');
        Route::get('sliders/{slider}/delete','destroy');
    });

    Route::controller(CategoryController::class)
    ->group(function (){
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}','update');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}','update');
        Route::get('/products/{product_id}/delete','destory');
        Route::get('product-image/{product_image_id}/delete','destroyImage');

        Route::post('product-color/{prod_color_id}','updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete','deleteProdColor');
    });

    Route::get('/brands',App\Livewire\Admin\Brand\Index::class);

    Route::controller(ColorController::class)->group(function(){
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit','edit');
        Route::put('/colors/{color_id}','update');
        Route::get('/colors/{color_id}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function(){
        Route::get('/orders', 'index');
        Route::get('/orders/{oderId}', 'show');
        Route::put('/orders/{oderId}', 'updateOrderStatus');

        Route::get('/invoice/{oderId}', 'viewInvoice');
        Route::get('/invoice/{oderId}/generate', 'generateInvoice');

        Route::get('/invoice/{orderId}/mail', 'mailInvoice');

    });

    Route::controller(\App\Http\Controllers\Admin\UserController::class)->group(function(){
        Route::get('/users','index');
        Route::get('/users/create','create');
        Route::post('/users','store');
        Route::get('/users/{user_id}/edit','edit');
        Route::put('/users/{user_id}','update');
        Route::get('/users/{user_id}/delete','destory');
    });
});

