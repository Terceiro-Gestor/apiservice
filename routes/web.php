<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('people')->group(function () {
    Route::get('/', App\Livewire\Person\PersonIndex::class)->name('people.index');
    Route::get('/{personId}', App\Livewire\Person\PersonShow::class)->name('person.show');

});


Route::resource('addresses', AddressController::class);
Route::resource('contacts', ContactController::class);

