<?php

use App\Http\Controllers\V1\PromptGenerationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('prompt-generations', PromptGenerationController::class)
            ->only(['index','store']);
    });
// });