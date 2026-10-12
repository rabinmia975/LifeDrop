<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyPostsController;
use App\Http\Controllers\PhoneVerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — LifeDrop (রক্তদান বাংলাদেশ)
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Find donors (search / filter)
Route::get('/find-donor', [DonorController::class, 'index'])->name('find-donor');

// Become a donor
Route::get('/become-donor', [DonorController::class, 'create'])->name('become-donor');
Route::post('/become-donor', [DonorController::class, 'store'])->name('donor.store');

// Post a blood request
Route::get('/post-request', [BloodRequestController::class, 'create'])->name('post-request');
Route::post('/post-request', [BloodRequestController::class, 'store'])->name('request.store');

// My posts (requires login via phone OTP)
Route::get('/my-posts', [MyPostsController::class, 'index'])->middleware('auth')->name('my-posts');
Route::post('/my-posts/{bloodRequest}/status', [BloodRequestController::class, 'updateStatus'])
    ->middleware('auth')->name('request.status');
Route::delete('/my-posts/{bloodRequest}', [BloodRequestController::class, 'destroy'])
    ->middleware('auth')->name('request.destroy');

// Phone OTP authentication (no passwords on the public site)
Route::post('/send-otp', [PhoneVerificationController::class, 'sendOtp'])->name('otp.send');
Route::post('/verify-otp', [PhoneVerificationController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/logout', [PhoneVerificationController::class, 'logout'])->name('logout');

// Legacy single-request URL keeps working: /request/{id} → find donors of that group
Route::get('/request/{id}', [BloodRequestController::class, 'create'])->name('request.show');

/*
|--------------------------------------------------------------------------
| Admin panel (Tabler UI, English)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [Admin\AuthController::class, 'login'])->name('login.attempt');
    Route::post('logout', [Admin\AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::get('donors', [Admin\DonorController::class, 'index'])->name('donors.index');
        Route::get('donors/{donor}', [Admin\DonorController::class, 'show'])->name('donors.show');
        Route::post('donors/{donor}/status', [Admin\DonorController::class, 'updateStatus'])->name('donors.status');
        Route::post('donors/{donor}/availability', [Admin\DonorController::class, 'updateAvailability'])->name('donors.availability');
        Route::post('donors/{donor}/donations', [Admin\DonorController::class, 'recordDonation'])->name('donors.donations');
        Route::delete('donors/{donor}', [Admin\DonorController::class, 'destroy'])->name('donors.destroy');

        Route::get('requests', [Admin\RequestController::class, 'index'])->name('requests.index');
        Route::post('requests/{bloodRequest}/status', [Admin\RequestController::class, 'updateStatus'])->name('requests.status');
        Route::delete('requests/{bloodRequest}', [Admin\RequestController::class, 'destroy'])->name('requests.destroy');

        Route::get('users', [Admin\UserController::class, 'index'])->name('users.index');
        Route::post('users/{user}/toggle-active', [Admin\UserController::class, 'toggleActive'])->name('users.toggle-active');
        Route::delete('users/{user}', [Admin\UserController::class, 'destroy'])->name('users.destroy');

        Route::get('blood-banks', [Admin\BloodBankController::class, 'index'])->name('blood-banks.index');
        Route::get('blood-banks/create', [Admin\BloodBankController::class, 'create'])->name('blood-banks.create');
        Route::post('blood-banks', [Admin\BloodBankController::class, 'store'])->name('blood-banks.store');
        Route::get('blood-banks/{bloodBank}/edit', [Admin\BloodBankController::class, 'edit'])->name('blood-banks.edit');
        Route::post('blood-banks/{bloodBank}', [Admin\BloodBankController::class, 'update'])->name('blood-banks.update');
        Route::delete('blood-banks/{bloodBank}', [Admin\BloodBankController::class, 'destroy'])->name('blood-banks.destroy');

        Route::get('settings', [Admin\SettingController::class, 'edit'])->name('settings.edit');
        Route::post('settings', [Admin\SettingController::class, 'update'])->name('settings.update');
        Route::post('settings/test-sms', [Admin\SettingController::class, 'testSms'])->name('settings.test-sms');
    });
});
