<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page', function () {
    return view('apipage');
});

Route::get('/people', fn() => view('people.index'));
Route::get('/chamadaapi', fn() => view('api'));