<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiodataController;

Route::get('/', [HomeController::class, 'utama']);
Route::get('/daftar', [BiodataController::class, 'formdaftar']);
Route::get('/kirim', [BiodataController::class, 'home']);