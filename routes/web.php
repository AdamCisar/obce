<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::controller(CityController::class)
    ->name('cities.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('city/{city}', 'show')->name('show');
        Route::get('autocomplete', 'autocomplete')->name('search.autocomplete');
});
