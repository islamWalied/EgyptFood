<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use Illuminate\Support\Facades\Route;




Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('/home', [AdminController::class, 'home'])->name('home');

//    Route::middleware()->group(function () {
    Route::get('/login', function () {
        return view('admin.login');
    });
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');
//    });

//    Route::middleware('auth:admin', 'prevent.back.history')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::resource('/', AdminController::class);
//    });
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('product-images', ProductImageController::class);
});
