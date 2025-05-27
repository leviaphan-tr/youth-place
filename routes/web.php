<?php

use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

    Route::middleware('auth')->group(function () {
    Route::get('/create', [MainAdminController::class, 'create'])->name('event.create');
    Route::post('/store', [MainAdminController::class, 'store'])->name('event.store');
    Route::post('/delete', [MainAdminController::class, 'delete'])->name('event.delete');
    });
Route::get('/api/events-info', [MainAdminController::class, 'api_info_data']);
