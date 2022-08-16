<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AdminController};
use App\Http\Controllers\Admin\{UserController};

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


Route::prefix('admin')->group(function(){

    Route::get('/users/create', [UserController::class,'create'])->name('admin.create');
    Route::post('/users', [UserController::class,'store'])->name('admin.store');

    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::get('/', [AdminController::class,'index'])->name('admin.home');

});
Route::get('/', function () {
    return view('welcome');
});
