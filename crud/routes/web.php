<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',function (){
    return view('admin.admin');

});
Route::get('/category',function (){
    return view('admin.category');

});
Route::get('/product',function (){
    return view('admin.product');

});
Route::get('/users',function (){
    return view('admin.users');

});
Route::get('/admin',function (){
    return view('admin.admin');

});
//// Product
///

Route::get('/product',[ProductController::class,'index']);
Route::get('/product-create',[ProductController::class,'create'])->name('product.create');
Route::post('/product-store',[ProductController::class,'store'])->name('product.store');
Route::post('/product-edit',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product-update',[ProductController::class,'update'])->name('product.update');
Route::delete('/product-delete',[ProductController::class,'destory'])->name('product.delete');
