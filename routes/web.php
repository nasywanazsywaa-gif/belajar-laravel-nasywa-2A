<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

// Laman Login (Publik)
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'cek'])->name('login.cek');

// Route Group yang harus login dahulu (Middleware islogin)
Route::group(['middleware' => 'islogin'], function () {
    // Sistem Templating
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/gallery', [DashboardController::class, 'gallery'])->name('gallery');
    Route::get('/about', [DashboardController::class, 'about'])->name('about');

    // Mahasiswa & Kalkulator (Latihan)
    Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');
    Route::match(['GET', 'POST'], '/kalkulator/segitiga', [KalkulatorController::class, 'segitiga'])->name('kalkulator.segitiga');

    // CRUD Pegawai (Employe)
    Route::get('/employe', [EmployeController::class, 'index'])->name('employe.index');
    Route::get('/employe/create', [EmployeController::class, 'create'])->name('employe.create');
    Route::post('/employe/store', [EmployeController::class, 'store'])->name('employe.store');
    Route::get('/employe/edit/{employe}', [EmployeController::class, 'show'])->name('employe.edit');
    Route::put('/employe/{employe}', [EmployeController::class, 'update'])->name('employe.update');
    Route::delete('/employe/{employe}', [EmployeController::class, 'destroy'])->name('employe.destroy');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
