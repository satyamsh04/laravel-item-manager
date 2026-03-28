<?php

use Illuminate\Support\Facades\Route;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Http\Controllers\ProductController;



Route::get('/test1', function () {
    return Manufacturer::with('products')->has('products')->first();
});

Route::get('/test2', function () {
    return Product::with('manufacturer')->first();
});
Route::resource('products', \App\Http\Controllers\ProductController::class);
