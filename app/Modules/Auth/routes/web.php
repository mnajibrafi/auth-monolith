<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Controllers\AdminDashboardController;

// Tambahkan middleware 'web' agar session login terbaca dengan benar
Route::middleware(['web'])->group(function () {

    // Route untuk Admin
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');
    });

    // Route untuk User Biasa
    Route::middleware(['auth'])->group(function () {
        Route::get('/user/dashboard', function () {
            return "Ini Halaman User Dashboard (Berhasil Akses)";
        })->name('user.dashboard');
    });

});