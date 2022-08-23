<?php

use App\Http\Controllers\Admin\{

    AdminController,
    UserController,
    DashboardController,
    CourseController,
    ModuleController,
    LessonController,
    SupportController
};

use Illuminate\Support\Facades\Route;
use Mockery\Matcher\Subset;
use Psy\Sudo;

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


    /***
     *
     * Supports
     */
        Route::get('/supports/{id}',[SupportController::class,'show'])->name('supports.show');
        Route::get('/supports',[SupportController::class,'index'])->name('supports.index');

      /***
     *
     * Aulas
     */
    Route::resource('/modules/{moduleId}/lessons',LessonController::class);
    /***
     *
     * Modulos
     */
    Route::resource('/courses/{courseId}/modules',ModuleController::class);

    /**
     *  Routes courses
     */
    Route::resource('/courses',CourseController::class);

    /**
     * Routes Admins
     */
    Route::get('admins/{id}/image', [AdminController::class, 'changeImage'])->name('admins.change.image');
    Route::put('/admins/{id}/update->image', [AdminController::class,'uploadFile'])->name('admins.update.image');
    Route::resource('admins',AdminController::class);

    Route::get('/', [DashboardController::class,'index'])->name('admin.dashboard');



    /**
     * Routes Users
     */
    Route::get('users/{id}/image', [UserController::class, 'changeImage'])->name('users.change.image');
    Route::put('/users/{id}/update->image', [UserController::class,'uploadFile'])->name('users.update.image');
    Route::delete('/users/{id}', [UserController::class,'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class,'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
    Route::post('/users', [UserController::class,'store'])->name('users.store');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::get('/users/{id}', [UserController::class,'show'])->name('users.show');
    Route::get('/users', [UserController::class,'index'])->name('users.index');

});
Route::get('/', function () {
    return view('welcome');
});
