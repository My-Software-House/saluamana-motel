<?php

use App\Http\Controllers\Backend\AmenitiesController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\Backend\ScheduleController;
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
Auth::routes();
Route::middleware('auth')
->group(function(){
Route::get('/dashboard', function () {
    return view('backend.dashboards.index');
})->name('dashboard');
    Route::as('amenities.')
        ->prefix('amenities')
        ->controller(AmenitiesController::class)
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
        });

    Route::as('rooms-types.')
        ->prefix('rooms-types')
        ->controller(RoomTypeController::class)
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::get('/{id}/detail', 'detail')->name('detail');
            Route::get('/{id}/amenity', 'createAmenity')->name('create-amenity');
            Route::put('/{id}/amenity', 'storeAmenity')->name('store-amenity');
            Route::get('/images/{id}', 'images')->name('images');
            Route::post('/images', 'imagespost')->name('images.post');
            Route::delete('/images', 'imagesdelete')->name('images.delete');
        });

    Route::as('bookings.')
        ->prefix('bookings')
        ->controller(BookingController::class)
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'detail')->name('detail');
            Route::get('/{id}/generate-invoice', 'generateInvoice')->name('generate-invoice');
            Route::get('/{id}/checkin', 'checkin')->name('checkin');
            Route::get('/{id}/cancel', 'cancel')->name('cancel');
            Route::get('/{id}/done', 'done')->name('done');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'delete')->name('delete');
            Route::get('/{id}/paid', 'paid')->name('paid');
        });

    Route::as('customers.')
        ->prefix('customers')
        ->controller(CustomerController::class)
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
        });

    Route::as('rooms.')
        ->prefix('rooms')
        ->controller(RoomController::class)
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/calendar', 'calendar')->name('calendar');

        });

    Route::as('schedules.')
        ->prefix('schedules')
        ->controller(ScheduleController::class)
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/get-events', 'getEvents')->name('getEvents');
        });
});
