<?php

use App\Http\Controllers\Backend\AmenitiesController;
use App\Http\Controllers\Backend\RoomTypeController;
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

    });
