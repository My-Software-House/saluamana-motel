<?php

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
})->name('frontend.home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('frontend.about');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('frontend.contact');

Route::get('/rooms', function () {
    return view('frontend.rooms.index');
})->name('frontend.rooms');

Route::get('/bookings', function () {
    return view('frontend.bookings.index');
})->name('frontend.bookings');

