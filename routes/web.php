<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home.index');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Admin login
Route::post('/admin/login', [AdminController::class, 'AdminLogin'])
    ->name('admin.login');

// Verification page
Route::get('/verify', [AdminController::class, 'ShowVerification'])
    ->name('custom.verification.form');

// Verify code
Route::post('/verify', [AdminController::class, 'VerificationVerify'])
    ->name('custom.verification.verify');

// Admin logout
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])
    ->name('admin.logout');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Admin Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Show admin profile
    Route::get('/profile', [AdminController::class, 'AdminProfile'])
        ->name('profile.admin');

    // Update profile information
    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])
        ->name('profile.store');

    // Change password
    Route::post('/profile/password', [AdminController::class, 'ChangePassword'])
        ->name('profile.password');

});

Route::middleware(['auth'])->group(function () {
    Route::controller(ReviewController::class)->group(function () {
        Route::get('/review', 'Index')->name('review.index');
        Route::get('/review/create', 'create')->name('review.create');
        Route::post('/review/store', 'store')->name('review.store');
    });
});


/*
|--------------------------------------------------------------------------
| Laravel Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
