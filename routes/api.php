<?php

use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\DosenController;
use App\Http\Controllers\Api\MakulController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* 
|-------------------------------------------------------------------------- 
| API Routes 
|-------------------------------------------------------------------------- 
| 
| Routes untuk API aplikasi Anda. Pastikan route yang butuh autentikasi 
| menggunakan middleware `auth:sanctum`.
|
*/

// Routes untuk Autentikasi
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes dengan Middleware `auth:sanctum`
Route::middleware('auth:sanctum')->group(function () {
    // Mahasiswa Routes
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::get('/mahasiswa/read', [MahasiswaController::class, 'read']);
    Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);

    // Dosen Routes
    Route::post('/dosen/create', [DosenController::class, 'create']);
    Route::get('/dosen/read', [DosenController::class, 'read']);
    Route::put('/dosen/update/{id}', [DosenController::class, 'update']);
    Route::delete('/dosen/delete/{id}', [DosenController::class, 'delete']);

    // Makul Routes
    Route::post('/makul/create', [MakulController::class, 'create']);
    Route::get('/makul/read', [MakulController::class, 'read']);
    Route::put('/makul/update/{id}', [MakulController::class, 'update']);
    Route::delete('/makul/delete/{id}', [MakulController::class, 'delete']);

    // Logout dan User Info
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});