<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\LivreursController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\SalesController;


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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories',CategoryController::class);
Route::resource('stock',StockController::class);
Route::resource('livreurs',LivreursController::class);
Route::resource('tarifs', TarifController::class);
Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'index'])->name("payments.index");
Route::resource('sales', SalesController::class);


