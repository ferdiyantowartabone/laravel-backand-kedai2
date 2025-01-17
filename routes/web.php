<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ProfilController;

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

    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);
    Route::resource('profil', ProfilController::class);

    // Route::group(['middleware' => ['permission:edit articles']], function () {
    //     Route::get('/articles/edit', 'ArticleController@edit')->name('articles.edit');
    // });


});
