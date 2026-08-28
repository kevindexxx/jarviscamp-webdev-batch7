<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomikController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('kategori', KategoriController::class);
    Route::apiResource('komik', KomikController::class);
    Route::apiResource('anggota', AnggotaController::class);
    Route::apiResource('peminjaman', PeminjamanController::class);

    Route::put('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali']);
});
