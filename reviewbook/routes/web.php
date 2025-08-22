<?php

use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiodataController;

Route::get('/', [HomeController::class, 'utama']);
Route::get('/daftar', [BiodataController::class, 'formdaftar']);
Route::get('/kirim', [BiodataController::class, 'home']);



Route::get('/genre/create', [GenreController::class, 'create']);
Route::post('/genre', [GenreController::class, 'library']);

Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
Route::put('/genre/{id}', [GenreController::class, 'update']);


Route::delete('/genre/{id}', [GenreController::class, 'destroy']);