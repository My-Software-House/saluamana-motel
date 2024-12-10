<?php

use App\Http\Controllers\AdminApi\RoomTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('room-types')
    ->controller(RoomTypeController::class)
    ->group(function() {
        Route::get('/','search');
        Route::get('/{id}', 'detail');
    });
