<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/', HomeController::class)->name(name: 'home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(callback: function () {
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');
});
