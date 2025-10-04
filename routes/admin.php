<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('admin.login');
});


Route::prefix('admin')->name('admin.')->group(function () {
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

});
