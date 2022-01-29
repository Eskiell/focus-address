<?php

use Illuminate\Support\Facades\Route;
use \Eskiell\FocusAddress\Http\Controllers\AddressController;

Route::prefix('api/address')->middleware([])->group(function () {
    Route::get('/zipcode', [AddressController::class, 'zipcode'])->name('address.get.zipcode');
    Route::get('/states', [AddressController::class, 'states'])->name('address.get.states');
    Route::get('/cities', [AddressController::class, 'cities'])->name('address.get.cities');
    Route::get('/zipcode/{cod}', [AddressController::class, 'zipcodeByCod'])->name('address.get.zipcode.by.id')->where('cod', '[0-9]+');
    Route::get('/state/{id}', [AddressController::class, 'stateById'])->name('address.get.states.by.id')->where('id', '[0-9]+');
    Route::get('/city/{id}', [AddressController::class, 'cityById'])->name('address.get.cities.by.id')->where('id', '[0-9]+');
    Route::get('/state/{id}/cities', [AddressController::class, 'search'])->name('address.search.cities.by.term')->where('id', '[0-9]+');
});