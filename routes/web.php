<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', function (){
    return view('admin.dashboard');
});


//Admin Routes
Route::get('/admin/adduser', [App\Http\Controllers\AdminController::class, 'create'])->name('addUsers');
Route::post('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'addUser'])->name('admin.adduser');
Route::get('/admin/{user}', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.edit');
Route::put('/admin/{user}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/details/{user}', [App\Http\Controllers\AdminController::class, 'details'])->name('user.details');
Route::get('/admin/delete/{user}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.delete');

//Product Routes
Route::get('/products', [App\Http\Controllers\AdminController::class, 'showProducts'])->name('products');
Route::get('admin/products/create', [App\Http\Controllers\ProductController::class, 'index'])->name('addProduct');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('storeProduct');
Route::get('products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.edit');
Route::put('products/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{product}',  [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/details/{product}', [App\Http\Controllers\ProductController::class, 'details'])->name('product.details');
