<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductListController;
use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::prefix('checkout')->controller(CheckoutController::class)->group(function(){
        Route::post('order', 'store')->name('checkout.store');
        Route::get('success','success')->name('checkout.success');
        Route::get('cancel','cancel')->name('checkout.cancel');
    });
});

Route::group(['prefix'=> 'cart','as' => 'cart.'], function(){
    Route::get('/view',[ CartController::class, 'view'])->name('view');
    Route::post('/store/{product}', [CartController::class, 'store'])->name('store');
    Route::patch('/update/{product}', [CartController::class, 'update'])->name('update');
    Route::delete('/delete/{product}', [CartController::class, 'delete'])->name('delete');
});

//routes for products list and filter
Route::prefix('products')->controller(ProductListController::class)->group(function ()  {
    Route::get('/','index')->name('products.index');

});







Route::group(['prefix'=> 'admin','middleware' => 'redirectAdmin'], function(){
    Route::get('login',[AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('login',[AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('logout',[AdminAuthController::class, 'logout'])->name('admin.logout');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=> ['auth', 'admin']],function(){
    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
    Route::delete('/products/image/{id}',[ProductController::class, 'deleteImage'])->name('products.image.delete');
    Route::resource('products', ProductController::class);
});
require __DIR__.'/auth.php';
