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

Route::get('/', [ProductController::class, 'products_user'])->name('show');

#Posts
Route::get('/posts/user', [PostController::class, 'index']);
Route::get('/posts/admin', [PostController::class, 'post_admin'])->name('posts.admin');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('showpost');
Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::post('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/edit/{id}', [PostController::class, 'update'])->name('posts.update');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

#Products
Route::get('/products', [ProductController::class, 'index'])->name('products.destroy');
Route::get('/products/admin', [ProductController::class, 'index'])->name('product.admin');
Route::get('/products/user', [ProductController::class, 'products_user'])->name('product.user');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'search'])->name('products.search');

