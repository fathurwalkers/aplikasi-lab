<?php

use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::group(["prefix" => "dashboard", "middleware" => "ceklogin"], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    Route::group(["prefix" => "lab"], function () {
        Route::get('/', [BackController::class, 'daftar_lab'])->name('daftar-lab');
    });

    Route::group(["prefix" => "barang"], function () {
        Route::get('/', [BackController::class, 'daftar_barang'])->name('daftar-barang');
    });

    Route::group(["prefix" => "penawaran"], function () {
        Route::get('/', [BackController::class, 'daftar_penawaran'])->name('daftar-penawaran');
    });

});
