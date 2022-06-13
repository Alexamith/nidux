<?php

use App\Http\Controllers\Api\CountriesApiController;
use App\Http\Controllers\Api\CustomApiCountryController;
use App\Http\Controllers\Api\UserApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('register', [UserApiController::class, 'register']);
Route::post('login', [UserApiController::class, 'login']);

// coutries public routes
Route::get('countries', [CountriesApiController::class, 'index']);
Route::get('countries/{name}', [CountriesApiController::class, 'show']);

Route::group(['middleware' => ["auth:sanctum"]], function () {
    # user routes
    Route::get('users', [UserApiController::class, 'index']);
    Route::get('user/{id}', [UserApiController::class, 'getById']);
    Route::put('user', [UserApiController::class, 'responseApiEdit']);
    Route::get('profile', [UserApiController::class, 'profile']);
    Route::get('logout', [UserApiController::class, 'logout']);

    // custom coutries private routes
    Route::post('custom-countries', [CustomApiCountryController::class, 'store']);
    Route::get('custom-countries', [CustomApiCountryController::class, 'index']);
    Route::get('custom-countries/{id}', [CustomApiCountryController::class, 'edit']);
    Route::delete('custom-countries/{id}', [CustomApiCountryController::class, 'destroy']);
    Route::put('custom-countries/{id}', [CustomApiCountryController::class, 'update']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
