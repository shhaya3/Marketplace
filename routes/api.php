<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\TemplateApiController;

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/categories', [CategoryApiController::class, 'index']);
    Route::get('/templates', [TemplateApiController::class, 'index']);
    Route::get('/templates/{slug}', [TemplateApiController::class, 'show']);
});