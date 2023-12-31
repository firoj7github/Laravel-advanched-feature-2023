<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('product');
// });

Route::get('/',[ProductController::class,'products'])->name('products');
Route::post('/add-product',[ProductController::class,'addProduct'])->name('add.product');
Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update.product');
Route::post('/delete-product',[ProductController::class,'deleteProduct'])->name('delete.product');

// lead add route

Route::post('/add-lead',[LeadController::class,'addlead'])->name('lead.add');

// login 
Route::get('/login',[AuthController::class,'support'])->name('login.form');

// invoice
Route::get('/invoice',[InvoiceController::class,'index'])->name('invoice.view');
Route::post('/invoice/show',[InvoiceController::class,'invioce'])->name('show.invoice');
Route::get('/banner',[InvoiceController::class,'show'])->name('banner.view');
Route::post('/invoice/add',[InvoiceController::class,'invoiceStore'])->name('invoice.store');
Route::post('/banner/add',[InvoiceController::class,'bannerStore'])->name('banner.store');


// favorite
Route::get('/favorite',[FavoriteController::class,'index'])->name('favorite.page');

// cart item
Route::get('/cart/items',[InvoiceController::class,'getCartItem'])->name('get.item');

// Favorite add
Route::post('/favorite/add',[FavoriteController::class,'favorite'])->name('update.wishlist');



Route::post('/dealer/login',[AuthController::class,'logincheck'])->name('dealer.login');

Route::middleware(['role:1'])->group(function(){
    Route::get('/dealer/dashboard',[AuthController::class,'dashboard'])->name('dealer.dashboard');
});
Route::middleware(['role:2'])->group(function(){
    Route::get('/admin/dashboard',[AuthController::class,'admindashboard'])->name('admin.dashboard');
});

