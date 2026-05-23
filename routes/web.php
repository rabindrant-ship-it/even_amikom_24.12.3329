<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
// use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event/{id}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/checkout', [EventController::class, 'checkout'])
    ->name('checkout');

Route::get('/my-ticket', [EventController::class, 'ticket'])
    ->name('ticket');

Route::prefix('admin')->name('admin.')->group(function () {

    // Route::get('/', [DashboardController::class, 'index'])
    //     ->name('dashboard');

    Route::resource('events', AdminEventController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('partners', PartnerController::class);



    // Route::get('/categories', [CategoryController::class, 'index'])
    //     ->name('categories.index');
});
