<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function () {

    // create post for a website
    Route::post('websites/{website}/post', [\App\Http\Controllers\Api\WebsiteController::class,'store']);

    // making user subscribe to a website
    Route::post('websites/{website}/{user}/subscribe', [\App\Http\Controllers\Api\WebsiteController::class,'subscribe']);

});
