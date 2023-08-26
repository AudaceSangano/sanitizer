<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/dry/{status}/update', [AdminController::class, 'dryUpdate']);
Route::get('/wet/{status}/update', [AdminController::class, 'wetUpdate']);
