<?php

use App\Http\Controllers\SensorController;
use App\Http\Controllers\GpsController;
use App\Http\Controllers\RelayController;
use Illuminate\Support\Facades\Route;

Route::get('/sensor', [SensorController::class, 'latest']);
Route::post('/sensor', [SensorController::class, 'store']);

Route::post('/gps', [GpsController::class, 'store']);

Route::get('/relay', [RelayController::class, 'status']);
