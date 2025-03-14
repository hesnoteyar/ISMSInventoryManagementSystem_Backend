<?php

use App\Http\Controllers\Api\ApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EquipmentController;
use App\Http\Controllers\Api\BureauController;
use App\Http\Controllers\Api\BrandController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


});
Route::post('/login',[AuthController::class,'login']);
Route::post('/signup',[AuthController::class,'signup']);
Route::apiResource('/equipments', EquipmentController::class);
Route::apiResource('/bureaus', BureauController::class);
Route::apiResource('/brands', BrandController::class);
Route::apiResource('/application', ApplicationController::class);