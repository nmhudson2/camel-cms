<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



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
    Route::get('/editor', function () {
        return view('editor', ['exists' => 'false', 'page_meta' => null]);
    })->name('editor');
    Route::post('/create-new', [PageController::class, 'store'])->name('create-new');
});
