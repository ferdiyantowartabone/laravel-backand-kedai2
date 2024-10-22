<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

// Route::get('/dashboard', function () {
//     return view('pages.dashboard', ['type_menu' => 'dashboard']);

// });

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');


});
