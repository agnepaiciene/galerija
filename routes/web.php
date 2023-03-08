<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);

Route::middleware(['auth'])->group(function () {
Route::resource('/products', ProductController::class)->except(['index'])->middleware('vartotojas');
Route::get('/categories', [CategoryController::class, 'categories'])->name("categories.index");
Route::resource('categories', CategoryController::class);
Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::post('/products/forget',[ProductController::class, 'forget'])->name("products.forget");
Route::post('/categories/search', [CategoryController::class, 'search'])->name('categories.search');
Route::resource('categories', CategoryController::class)->except(['index'])->middleware('vartotojas');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories/forget',[CategoryController::class, 'forget'])->name("categories.forget");
});
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
