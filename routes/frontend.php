<?php

use App\Http\Controllers\Frontend\RoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::as('room-types.')
    ->prefix('room-types')
    ->controller(RoomController::class)
    ->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/{name}','detail')->name('detail');
    });



Route::get('/bookings', function () {
    return view('frontend.bookings.index');
})->name('bookings');
