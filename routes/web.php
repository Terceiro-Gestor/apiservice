<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddressController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('people', PersonController::class);
Route::put('/people/{person}/set-address', [PersonController::class, 'setAddress']);
Route::resource('addresses', AddressController::class);
Route::resource('contacts', ContactController::class);
