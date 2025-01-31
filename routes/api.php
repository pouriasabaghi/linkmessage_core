<?php

use App\Http\Controllers\api\v1\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::post('messages', [MessageController::class, 'store']);
    Route::get('messages/{message:link}', [MessageController::class, 'show']);
});