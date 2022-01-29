<?php
Route::prefix('address')->middleware([])->group(function () {
    Route::get('/zipcode', [\App\Http\Controllers\Api\AddressController::class, 'zipcode'])->name('address.get.zipcode');
    Route::get('/states', [\App\Http\Controllers\Api\AddressController::class, 'states'])->name('address.get.states');
    Route::get('/cities', [\App\Http\Controllers\Api\AddressController::class, 'cities'])->name('address.get.cities');
    Route::get('/zipcode/{cod}', [\App\Http\Controllers\Api\AddressController::class, 'zipcodeByCod'])->name('address.get.zipcode.by.id')->where('cod', '[0-9]+');
    Route::get('/state/{id}', [\App\Http\Controllers\Api\AddressController::class, 'stateById'])->name('address.get.states.by.id')->where('id', '[0-9]+');
    Route::get('/city/{id}', [\App\Http\Controllers\Api\AddressController::class, 'cityById'])->name('address.get.cities.by.id')->where('id', '[0-9]+');
    Route::get('/state/{id}/cities', [\App\Http\Controllers\Api\AddressController::class, 'search'])->name('address.search.cities.by.term')->where('id', '[0-9]+');
});