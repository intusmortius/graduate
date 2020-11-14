<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\SearchController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


Route::middleware(["auth", 'verified'])->group(function () {
    Route::get('/', [GraduateController::class, "index"])->name('home');
    Route::get('/table', [GraduateController::class, "table"])->name('table');
    Route::get('/profile/{user}', [GraduateController::class, "show"])->name('profile');
    Route::get('/profile/{user}/edit', [GraduateController::class, "edit"])->middleware("can:update,user")->name('edit');
    Route::get('admin', [AdminController::class, "index"])->middleware("role:admin")->name("admin");
    Route::get("/search", [SearchController::class, "index"]);
    Route::get("/searchadmin", [SearchController::class, "index_admin"]);
    Route::get('/contact', [ContactController::class, "show"]);
    Route::post('/contact',  [ContactController::class, "mailToAdmin"]);
    Route::post('admin/{user}/edit', [AdminController::class, "edit"])->middleware("role:admin")->name("complete-modal-edit");
    Route::post('/admin/{user}', [AdminController::class, "update"])->name('admin-update');
    Route::post('/admin/{user}/delete', [GraduateController::class, "delete"]);
    Route::post('/admin/{user}/role', [AdminController::class, "role"]);
    Route::patch('/profile/{user}', [GraduateController::class, "update"])->name('profile-update');
});

Auth::routes();
