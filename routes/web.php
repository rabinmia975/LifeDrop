<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — LifeDrop (রক্তদান বাংলাদেশ)
|--------------------------------------------------------------------------
*/

// 1. Home Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2. Find Blood Donor Page
Route::get('/find-donor', function () {
    return view('find-donor');
})->name('find-donor');

// 3. Post Blood Request Page
Route::get('/post-request', function () {
    return view('post-request');
})->name('post-request');

// 4. Become a Donor Registration Page
Route::get('/become-donor', function () {
    return view('become-donor');
})->name('become-donor');

// 5. My Posts User Dashboard Page
Route::get('/my-posts', function () {
    return view('my-posts');
})->name('my-posts');

// 6. Request Single View Route
Route::get('/request/{id}', function ($id) {
    return redirect()->route('find-donor');
})->name('request.show');
