<?php

use App\Http\Controllers\ImageGenerationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('image-generations', ImageGenerationController::class)
            ->only(['index','store']);
    });
// });