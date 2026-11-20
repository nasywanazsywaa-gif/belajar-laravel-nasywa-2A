<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MahasiswaController::class, 'daftar'])->name('home');

Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');

Route::match(['GET', 'POST'], '/kalkulator/segitiga', [KalkulatorController::class, 'segitiga'])->name('kalkulator.segitiga');

// Sistem Templating
Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
Route::get('/gallery', [DashboardController::class, 'gallery'])->name('gallery');
Route::get('/about', [DashboardController::class, 'about'])->name('about');
