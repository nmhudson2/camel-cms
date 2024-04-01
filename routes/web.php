<?php

use Illuminate\Support\Facades\Route;


// Base route calls the PageRouteController class, which will redirect based on the incomming request. 
Route::get('/', function () {
    return view('desktop');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
