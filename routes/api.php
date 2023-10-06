<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/infraLed/{id}', [AdminController::class, 'infra']);
Route::post('/utrasonic', [AdminController::class, 'dryUpdate']);
