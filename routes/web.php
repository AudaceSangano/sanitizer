<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('auth.login');
})->name('login');

//backend route

Route::post('/login/operation', [AuthController::class, 'authenticate'])->name('auth.login.op');

Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    Route::get('/main', function () {
        return view('layout.index');
    })->name('dashboard');

    Route::get('/register/user', function () {
        return view('layout.registerUser');
    });

    Route::get('/list/user', function () {
        return view('layout.user');
    });

    Route::get('/live', function () {
        return view('layout.live');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', function () {
        return view('layout.profile');
    })->name('profile');

    Route::post('/profile/information', [AuthController::class, 'personal'])->name('personal.change');
    Route::post('/profile/password', [AuthController::class, 'updatePassword'])->name('security.change');
    Route::post('/collector/registration', [AdminController::class, 'collectorRegister'])->name('collector.create');
    Route::get('/collector/{id}/remove', [AdminController::class, 'collectorRemove'])->name('user.delete');
    Route::get('/getDbStatusDry', [AdminController::class, 'getTank']);
    Route::get('/getDbStatusWet', [AdminController::class, 'getTankOne']);

});
