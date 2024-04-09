<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PageRouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Base route calls the PageRouteController class, which will redirect based on the incomming request.
Route::get('/{slug?}', function (?string $slug = 'homepage') {
    $controller = new PageRouteController($slug);

    return $controller->handle();
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
        Route::get('/editor/{page_slug?}', function ($page_slug = null) {
            $controller = new PageController();
            return view('editor', ['exists' => 'false', 'page_meta' => null, 'page_data' => $controller->index($page_slug)]);
        })->name('editor.page_slug');
        Route::get('/settings', function () {
            return view('settings');
        })->name('settings.index');
    });
    Route::post('/create-new', [PageController::class, 'store'])->name('create-new');
    Route::delete('/remove/{slug?}', function (string $slug = null) {
        $controller = new PageController();
        $controller->deletePage($slug);
    });
});
