<?php

use App\Http\Controllers\Admin\AdminController;
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
