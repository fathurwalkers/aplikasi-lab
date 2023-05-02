<?php

use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "dashboard"], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
});

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('dashboard');
});


