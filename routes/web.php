<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\PenawaranController;
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
        Route::get('/', [LabController::class, 'daftar_lab'])->name('daftar-lab');
        Route::post('/hapus/{id}', [LabController::class, 'hapus_lab'])->name('hapus-lab');
    });

    Route::group(["prefix" => "barang"], function () {
        Route::get('/', [BarangController::class, 'daftar_barang'])->name('daftar-barang');
        Route::post('/hapus/{id}', [BarangController::class, 'hapus_barang'])->name('hapus-barang');
    });

    Route::group(["prefix" => "penawaran"], function () {
        Route::get('/', [PenawaranController::class, 'daftar_penawaran'])->name('daftar-penawaran');
        Route::get('/buat-penawaran', [PenawaranController::class, 'buat_penawaran'])->name('buat-penawaran');
        Route::post('/proses-penawaran', [PenawaranController::class, 'proses_penawaran'])->name('proses-penawaran');
        Route::post('/hapus/{id}', [PenawaranController::class, 'hapus_penawaran'])->name('hapus-penawaran');
    });

    Route::group(["prefix" => "invoice"], function () {
        Route::get('/', [InvoiceController::class, 'daftar_invoice'])->name('daftar-invoice');
        Route::post('/pembuatan-invoice', [InvoiceController::class, 'pembuatan_invoice'])->name('pembuatan-invoice');
        Route::post('/cetak-invoice', [InvoiceController::class, 'cetak_invoice'])->name('cetak-invoice');
    });

});

Route::group(["prefix" => "generate"], function () {
    Route::get('/pengguna', [GenerateController::class, 'generate_pengguna'])->name('generate-pengguna');
    Route::get('/default-pengguna', [GenerateController::class, 'generate_default_pengguna'])->name('generate-default-pengguna');
    Route::get('/lab', [GenerateController::class, 'generate_lab'])->name('generate-lab');
    Route::get('/barang', [GenerateController::class, 'generate_barang'])->name('generate-barang');
});
