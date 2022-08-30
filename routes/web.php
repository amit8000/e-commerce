<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\CheckoutController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontController::class,'index']);
Route::get('category',[FrontController::class,'category']);

Route::get('view_category/{slug}',[FrontController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_name}',[FrontController::class,'productview']);


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/add-to-cart',[CartController::class,'addProduct']);
Route::post('delete_cart/',[CartController::class,'remove_cart']);
Route::post('update_cart/',[CartController::class,'updateCart']);
Route::get('/load_cart_data',[CartController::class,'cart_count']);
Route::middleware(['auth'])->group(function(){
  Route::get('cart',[CartController::class, 'viewCart']);
  Route::get('checkout', [CheckoutController::class,'index']);
  Route::post('place-orders',[CheckoutController::class,'place_order']);
  Route::get('my-orders',[UserController::class,'index']);
  Route::post('product_to_pay',[CheckoutController::class,'razorpaycheck']);


});



Route::middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard','App\Http\Controllers\Admin\FrontendController@index');
    Route::get('/categories','App\Http\Controllers\Admin\CategoryController@index');
    Route::get('add_category','App\Http\Controllers\Admin\CategoryController@addCategory');
    Route::post('insert-category','App\Http\Controllers\Admin\CategoryController@insert');
    Route::get('edit-cate/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}',[CategoryController::class,'updateCategory']);
    Route::get('delete-category/{id}',[CategoryController::class,'destroyCategory']);

    // products sroutes
    Route::get('products',[ProductController::class,'index']);
    Route::get('add_products',[ProductController::class,'addProduct']);
    route::post('insert-product',[ProductController::class,'insert']);
    route::get('edit-prod/{id}',[ProductController::class,'edit']);
    route::put('update-product/{id}',[ProductController::class,'updateProduct']);
    route::get('delete-prod/{id}',[ProductController::class,'deleteProduct']);
   



 



       

    
});

