<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PeopleRelationshipController;
use App\Livewire\Person\Show;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pessoas/{person}', Show::class)->name('person.show');

Route::resource('people', PersonController::class);

Route::prefix('people/{person}')->group(function () {
    Route::resource('contacts', ContactController::class);
    Route::resource('relationships', PeopleRelationshipController::class)->except(['create', 'edit']);
});


Route::resource('addresses', AddressController::class);
Route::resource('contacts', ContactController::class);

