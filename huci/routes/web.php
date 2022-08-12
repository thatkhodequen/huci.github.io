<?php

use App\Http\Controllers\KhohangController;
use App\Http\Controllers\NguondonController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SanphamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return view('layout');
});

Auth::routes();

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/user', UserController::class);
Route::resource('/order', OrderController::class);
Route::resource('/sanpham', SanphamController::class );
Route::resource('/khohang', KhohangController::class );
Route::resource('/nguondon', NguondonController::class );
Route::post('/chon-diachi',[OrderController::class, 'chondiachi']);
Route::post('/lien-he/{id}',[OrderController::class, 'check']);
