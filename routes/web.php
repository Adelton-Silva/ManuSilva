<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\CarregadorController;
use App\Http\Controllers\Admin\ReparacaoController;
use App\Http\Controllers\Frontend\TecnicoController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{serv_slug}',[FrontendController::class,'serviceview']);

Route::get('service-list', [FrontendController::class, 'servicelistAjax']);
Route::post('searchservices', [FrontendController::class, 'searchServices']);

Auth::routes();

Route::get('/load-cart-data',[CartController::class, 'cartcount']);
Route::get('/load-wishlist-count', [WishlistController::class, 'wishlistcount']);

Route::get('/home', [FrontendController::class,'index'])->name('home');
Route::post('add-to-cart',[CartController::class,'addService']);
Route::post('delete-cart-item',[CartController::class,'deleteservice']);
Route::post('update-cart',[CartController::class,'updatecart']);

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);


Route::middleware(['auth'])->group(function(){
    Route::get('cart',[CartController::class,'viewcart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class, 'placeorder']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);
    Route::get('edit-order/{id}', [UserController::class, 'edit']);
    Route::put('update-orders/{id}',[UserController::class,'updateord']);
    Route::get('delete-order/{id}',[UserController::class,'destroy']);

    
    
    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{service_slug}/userreview', [ReviewController::class, 'add']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::get('edit-review/{service_slug}/userreview', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);
    
    Route::get('wishlist', [WishlistController::class, 'index']);

    Route::post('proceed-to-pay', [CheckoutController::class, 'razorpaycheck']);

    Route::get('tecnico', 'Frontend\TecnicoController@index');
    Route::get('edit-tecnico/{id}',[TecnicoController::class,'edit']);
    Route::put('update-tecnico/{id}',[TecnicoController::class,'update']);
    Route::get('add-tecnico', 'Frontend\TecnicoController@add');
    Route::post('insert-tecnico', 'Frontend\TecnicoController@insert');
    
    Route::get('teccarregadores', 'Frontend\TECCarregadorController@index');
    Route::get('tecadd-carregador', 'Frontend\TECCarregadorController@add');
    Route::post('tecinsert-carregador', 'Frontend\TECCarregadorController@insert');
    Route::get('tecedit-carregador/{id}','Frontend\TECCarregadorController@edit');
    Route::put('tecupdate-carregador/{id}','Frontend\TECCarregadorController@update');

});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');
    

    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

    Route::get('services',[ServiceController::class,'index']);
    Route::get('add-services',[ServiceController::class,'add']);
    Route::post('insert-service',[ServiceController::class,'insert']);

    Route::get('edit-service/{id}',[ServiceController::class,'edit']);
    Route::put('update-service/{id}',[ServiceController::class,'update']);
    Route::get('delete-service/{id}',[ServiceController::class,'destroy']);

    
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);

    Route::get('order-history', [OrderController::class, 'orderhistory']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewuser']);

    Route::get('clientes', 'Admin\ClienteController@index');
    Route::get('add-cliente', 'Admin\ClienteController@add');
    Route::post('insert-cliente', 'Admin\ClienteController@insert');
    Route::get('edit-cliente/{id}',[ClienteController::class,'edit']);
    Route::put('update-cliente/{id}',[ClienteController::class,'update']);
    Route::get('delete-cliente/{id}',[ClienteController::class, 'destroy']);  

    Route::get('carregadores', 'Admin\CarregadorController@index');
    Route::get('add-carregador', 'Admin\CarregadorController@add');
    Route::post('insert-carregador', 'Admin\CarregadorController@insert');
    Route::get('edit-carregador/{id}',[CarregadorController::class,'edit']);
    Route::put('update-carregador/{id}',[CarregadorController::class,'update']);
    Route::get('delete-carregador/{id}',[CarregadorController::class, 'destroy']);

    Route::get('reparacaos', 'Admin\ReparacaoController@index');
    Route::get('add-reparacao', 'Admin\ReparacaoController@add');
    Route::post('insert-reparacao', 'Admin\ReparacaoController@insert');
    Route::get('edit-reparacao/{id}',[ReparacaoController::class,'edit']);
    Route::put('update-reparacao/{id}',[ReparacaoController::class,'update']);
    Route::get('delete-reparacao/{id}',[ReparacaoController::class, 'destroy']);
    Route::get('em-reparacaos', 'Admin\ReparacaoController@emreparacao');
    Route::get('edit_faturar/{id}',[ReparacaoController::class,'edit_faturar']);
    Route::put('faturar-reparacao/{id}',[ReparacaoController::class,'faturar']);

    Route::get('add-user', 'Admin\UserController@add');
    Route::post('insert-user', 'Admin\UserController@insert');
    
});
