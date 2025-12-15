<?php

use App\Http\Controllers\GpsController;
use App\Http\Controllers\RelayController;
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sensor', [SensorController::class, 'pageSensor']);
Route::delete('/sensor/{id}', [SensorController::class, 'destroy']);

Route::get('/relay/status', [RelayController::class, 'status']);
Route::post('/relay/update', [RelayController::class, 'update']);

Route::get('/gps', [GpsController::class, 'pageGps']);
