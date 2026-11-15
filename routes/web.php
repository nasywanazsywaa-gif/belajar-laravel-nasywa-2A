<?php

use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MahasiswaController::class, 'daftar'])->name('home');

Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');

Route::match(['GET', 'POST'], '/kalkulator/segitiga', [KalkulatorController::class, 'segitiga'])->name('kalkulator.segitiga');
