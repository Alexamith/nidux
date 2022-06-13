<?php

use Illuminate\Support\Facades\Route;


// Auth routes
Route::get('login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', [App\Http\Controllers\AuthWebController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthWebController::class, 'logout']);


// Main routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index']);
// User routes
Route::get('register', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth');
Route::post('register', [App\Http\Controllers\UserController::class, 'store'])->middleware('auth');
Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'getById'])->middleware('auth');
Route::post('user-edit', [App\Http\Controllers\UserController::class, 'edit'])->middleware('auth');
Route::post('delete-user/{id}', [App\Http\Controllers\UserController::class, 'delete'])->middleware('auth');
Route::get('new-user', [App\Http\Controllers\UserController::class, 'newUserView'])->middleware('auth');

// Countries routes
Route::get('/getCountryByName', [App\Http\Controllers\HomeController::class, 'getCountry'])->name('getCountryByName');
Route::get('/create-country-description/{name}', [App\Http\Controllers\HomeController::class, 'createCountryDescription'])->middleware('auth');
Route::post('/register-custom-country', [App\Http\Controllers\HomeController::class, 'registerCustomCountry'])->middleware('auth');
Route::get('/get-custom-countries', [App\Http\Controllers\HomeController::class, 'getAllCustomCountries'])->middleware('auth');
Route::get('/custom-country/{id}', [App\Http\Controllers\HomeController::class, 'getCustomCountriesId'])->middleware('auth');
Route::post('/edit-custom-country/{id}', [App\Http\Controllers\HomeController::class, 'editCustomCountry'])->middleware('auth');
Route::post('/delete-custom-country/{id}', [App\Http\Controllers\HomeController::class, 'deleteCustomCountry'])->middleware('auth');

