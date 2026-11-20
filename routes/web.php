<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'home'])->name('home');

Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');

Route::match(['GET', 'POST'], '/kalkulator/segitiga', [KalkulatorController::class, 'segitiga'])->name('kalkulator.segitiga');

// Sistem Templating
Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
Route::get('/gallery', [DashboardController::class, 'gallery'])->name('gallery');
Route::get('/about', [DashboardController::class, 'about'])->name('about');

// CRUD Pegawai (Employe)
Route::get('/employe', [EmployeController::class, 'index'])->name('employe.index');
Route::get('/employe/create', [EmployeController::class, 'create'])->name('employe.create');
Route::post('/employe/store', [EmployeController::class, 'store'])->name('employe.store');
Route::get('/employe/edit/{employe}', [EmployeController::class, 'show'])->name('employe.edit');
Route::put('/employe/{employe}', [EmployeController::class, 'update'])->name('employe.update');
Route::delete('/employe/{employe}', [EmployeController::class, 'destroy'])->name('employe.destroy');
