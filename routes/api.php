<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CateogoryController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CourierCompanyNameController;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 
   
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'V1',
   // 'namespace' => 'Api\V1'

], function ($router) {
    Route::apiResource('category', CateogoryController::class); 
    Route::apiResource('brand', BrandController::class); 
    Route::apiResource('courier-company-name', CourierCompanyNameController::class);

});


