<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('auth.login');
});
Route::group(['prefix' => 'products', 'middleware' => ['auth']], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products_index');
    Route::get('/create', [ProductController::class, 'create'])->name('product_create');
    Route::post('/store', [ProductController::class, 'store'])->name('product_store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('product_show');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product_edit');
        Route::patch('/{id}', [ProductController::class, 'update'])->name('product_update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product_delete');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
