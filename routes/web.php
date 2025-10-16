<?php

use App\Http\Controllers\LayoutFront\FtontLayoutController;
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
    return "this is the domain";
});

Route::get('/home' , [FtontLayoutController::class, 'forntHome'])->name('front.home');
use App\Http\Controllers\CategoryController;

Route::get('/categories/{category}', [FtontLayoutController::class, 'forntProducts'])
     ->name('categories.show'); // هنوصل له من زر "المزيد"


require __DIR__.'/admin.php';
