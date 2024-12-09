<?php

use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\RoomTypeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('booking')
    ->controller(App\Http\Controllers\Api\BookingController::class)
    ->group(function() {
        Route::get('/{id}/generate-invoice', 'generateInvoice');
        Route::post('/', 'booking');
        Route::get('/unavailable-dates', 'getUnavailableDates');
        Route::get('/{idBooking}', 'detail');
    });

Route::prefix('room-types')
    ->controller(RoomTypeController::class)
    ->group(function() {
        Route::get('/','search');
        Route::get('/{id}', 'detail');
    });

// midtrans callback
Route::post('/midtrans/callback', [PaymentController::class, 'callback']);

// Route::post('/booking', [App\Http\Controllers\Api\BookingController::class, 'booking']);
