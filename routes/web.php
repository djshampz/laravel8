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
Route::get('/admin/adduser', [App\Http\Controllers\AdminController::class, 'create']);
Route::post('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'addUser'])->name('admin.adduser');
Route::get('/admin/{user}', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.edit');
Route::put('/admin/{user}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
Route::get('/admin/delete/{user}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.delete');
