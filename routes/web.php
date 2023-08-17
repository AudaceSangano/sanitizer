<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/main', function () {
    return view('layout.index');
});

Route::get('/register/user', function () {
    return view('layout.registerUser');
});

Route::get('/list/user', function () {
    return view('layout.user');
});

Route::get('/live', function () {
    return view('layout.live');
});
