<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainAdminController;

// Приклад API-маршруту
Route::get('/events-info', [MainAdminController::class, 'api_info_data']);
Route::post('/items', [MainAdminController::class, 'store']);
