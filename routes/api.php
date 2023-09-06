<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/status/{status}/update/{id}', [AdminController::class, 'dryUpdate']);
