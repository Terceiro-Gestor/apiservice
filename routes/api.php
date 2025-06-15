<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\OccurrenceController;
use App\Http\Controllers\Api\AddressController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
    
Route::resource('people', PersonController::class);
Route::resource('occurrence', OccurrenceController::class);
Route::resource('address', AddressController::class);

Route::get('table/people', [PersonController::class, 'datatable']);