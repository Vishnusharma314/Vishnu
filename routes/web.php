<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;


Route::get('/', [FlightController::class, 'welcome']);

// Admin Login
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/flights/create', [FlightController::class, 'create']);
    Route::post('/admin/flights', [FlightController::class, 'store']);
});

// Flight Search
Route::get('/flights/search', [FlightController::class, 'search']);

require __DIR__.'/auth.php';