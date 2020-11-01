<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GraduateController;
use Illuminate\Support\Facades\Route;

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



Route::middleware("auth")->group(function () {
    Route::get('/', [GraduateController::class, "index"])->name('home');
    Route::get('/table', [GraduateController::class, "table"])->name('table');
    Route::get('/profile/{user}', [GraduateController::class, "show"])->name('profile');
    Route::get('/profile/{user}/edit', [GraduateController::class, "edit"])->middleware("can:update,user")->name('edit');
    Route::get('admin', [AdminController::class, "index"])->middleware("role:admin")->name("admin");
    Route::get('admin/{user}/edit', [AdminController::class, "edit"])->middleware("role:admin")->name("complete-modal-edit");
    Route::patch('/profile/{user}', [GraduateController::class, "update"])->name('profile-update');
    Route::patch('/admin/{user}', [AdminController::class, "update"])->name('admin-update');
});

Auth::routes();
