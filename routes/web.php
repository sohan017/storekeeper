<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->name('dashboard');


//Route::resource('/product', ProductController::class);
Route::resource('/product', ProductController::class);

Route::get('/product/sell/{id}/{quantity}', [ProductController::class, 'sell'])->name('product.sell');
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/dashboard', [SaleController::class, 'dashboard'])->name('dashboard');

