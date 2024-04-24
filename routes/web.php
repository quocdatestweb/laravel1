<?php

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
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::get('/products', [ProductController::class, 'index'])->name('destroy');
Route::get('/products_admin', [ProductController::class, 'index'])->name('product.admin');
Route::get('/products_user', [ProductController::class, 'products_user'])->name('product.user');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');
Route::get('/delete_product/{id}', [ProductController::class, 'destroy'])->name('destroy');
Route::post('/delete_product/{id}', [ProductController::class, 'destroy'])->name('destroy');

Route::get('/edit_product/{id}', [ProductController::class, 'edit'])->name('edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


Route::get('/', [ProductController::class, 'index']);
