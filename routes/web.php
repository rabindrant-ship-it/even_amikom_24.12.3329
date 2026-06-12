<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;

// Import AuthController yang baru dibuat untuk Modul 8
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

// ==========================================
// RUTE SISI USER / PUBLIK (Tanpa Login)
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


// ==========================================
// RUTE AUTENTIKASI (Modul 8)
// ==========================================
// Menampilkan halaman login & memproses form login
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
// Memproses logout
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// RUTE ADMIN AREA (Dilindungi Middleware Modul 8)
// ==========================================
// Ditambahkan middleware 'auth' dan AdminMiddleware agar tidak bisa diakses sembarangan
Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->as('admin.')->group(function () {

    // Aktifkan kembali rute dashboard untuk admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Rute Resource Data Manajemen Admin
    Route::resource('events', AdminEventController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('partners', PartnerController::class);
});
