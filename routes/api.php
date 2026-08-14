<?php


use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomikController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function(){
    return response()->json([
        'message' => 'API is working'
    ]);
});

Route::apiResource('kategori', KategoriController::class);
Route::apiResource('komiks', KomikController::class);
Route::apiResource('anggota', AnggotaController::class);
Route::post('/peminjaman', [PeminjamanController::class, 'store']);
