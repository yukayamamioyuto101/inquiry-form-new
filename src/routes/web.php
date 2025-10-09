<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

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

Route::middleware('auth')->group(function(){
Route::get('/admin',[AdminController::class,'index'])->name('admin');
});
Route::get('/admin/search',[AdminController::class,'search'])->name('admin.search');
Route::prefix('admin')->group(function () {
Route::get('/', [AdminController::class, 'index'])->name('admin');           
Route::delete('/{contact}', [AdminController::class, 'destroy'])->name('admin.destroy');
});


Route::get('/',[ContactController::class,'index'])->name('index');
Route::post('/confirm',[ContactController::class,'confirm'])->name('confirm');
Route::post('/thanks',[ContactController::class,'store'])->name('thanks');



