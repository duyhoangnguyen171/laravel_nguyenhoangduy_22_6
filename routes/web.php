<?php

use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index']);   // Trang Chu
Route::get('product',[ProductController::class,'index']); // san pham all
Route::get('product-detail/[slug]',[ProductController::class,'product_detail']); // chi tiet
Route::get('contact',[ContactController::class,'index']); // lien he