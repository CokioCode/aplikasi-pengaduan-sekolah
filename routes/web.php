<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgresPerbaikanController;
use App\Http\Controllers\UmpanBalikController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');

    Route::get('/aspirasi', [AspirasiController::class, 'indexAdmin'])->name('aspirasi.index');
    Route::get('/aspirasi/{id}', [AspirasiController::class, 'show'])->name('aspirasi.show');
    Route::patch('/aspirasi/{id}/status', [AspirasiController::class, 'updateStatus'])->name('aspirasi.updateStatus');

    Route::post('/umpan-balik', [UmpanBalikController::class, 'store'])->name('umpanBalik.store');
    Route::patch('/umpan-balik/{id}', [UmpanBalikController::class, 'update'])->name('umpanBalik.update');
    Route::delete('/umpan-balik/{id}', [UmpanBalikController::class, 'destroy'])->name('umpanBalik.destroy');

    Route::post('/progres', [ProgresPerbaikanController::class, 'store'])->name('progres.store');
    Route::patch('/progres/{id}', [ProgresPerbaikanController::class, 'update'])->name('progres.update');
    Route::delete('/progres/{id}', [ProgresPerbaikanController::class, 'destroy'])->name('progres.destroy');
});

Route::middleware(['auth', 'siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'siswaDashboard'])->name('dashboard');

    Route::get('/aspirasi', [AspirasiController::class, 'indexSiswa'])->name('aspirasi.index');
    Route::get('/aspirasi/create', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('aspirasi.store');
    Route::get('/aspirasi/{id}', [AspirasiController::class, 'show'])->name('aspirasi.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
