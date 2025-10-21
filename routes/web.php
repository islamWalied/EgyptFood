<?php

use App\Http\Controllers\LayoutFront\FrontLayoutController;
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
    return redirect()->route('front.home');
});

Route::get('/home' , [FrontLayoutController::class, 'forntHome'])->name('front.home');
Route::get('/department-contact' , [FrontLayoutController::class, 'departmentContact'])->name('department.contact');

Route::get('/categories/{category}', [FrontLayoutController::class, 'forntProducts'])
     ->name('categories.show'); // هنوصل له من زر "المزيد"


require __DIR__.'/admin.php';
