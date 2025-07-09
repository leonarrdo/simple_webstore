<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/manage', [ProductController::class, 'manage'])->name('manage');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::patch('/{product}/toggle', [ProductController::class, 'toggle'])->name('toggle');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});