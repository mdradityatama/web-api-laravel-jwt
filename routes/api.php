<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('register', [AuthenticationController::class, 'register'])->name('register');

Route::middleware(['jwt.verify'])->group(function ()
{
    Route::post('claims', [AuthenticationController::class, 'claims'])->name('claims');
    Route::get('products', [ProductController::class, 'index'])->name('productsIndex');
    Route::post('products', [ProductController::class, 'store'])->name('productStore');

    Route::get('orders', [OrderController::class, 'index'])->name('ordersIndex');
    Route::get('orders-by-user', [OrderController::class, 'byUser'])->name('ordersByUser');
});
