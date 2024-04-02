<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



// Base route calls the PageRouteController class, which will redirect based on the incomming request. 
Route::get('/{slug?}', function () {
    return view('desktop');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('/site-settings', function () {
            return view('site-settings');
        });
        Route::get('/editor/{page_slug?}', function ($page_slug = null) {
            $controller = new PageController();
            return view('editor', ['exists' => 'false', 'page_meta' => null, 'page_data' => $controller->index($page_slug)]);
        })->name('editor.page_slug');
    });
    Route::post('/create-new', [PageController::class, 'store'])->name('create-new');
});
