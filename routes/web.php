<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.home');
});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


/*
|--------------------------------------------------------------------------
| Portfolio Builder (Guest Flow)
|--------------------------------------------------------------------------
*/

Route::get('/create-portfolio', function () {
    return view('portfolio.create');
})->name('portfolio.create');

Route::get('/portfolio-template', function () {
    return view('portfolio.template');
})->name('portfolio.template');

Route::get('/portfolio-preview', function () {
    return view('portfolio.preview');
})->name('portfolio.preview');

Route::get('/portfolio-download', function () {
    return view('portfolio.download');
})->name('portfolio.download');


/*
|--------------------------------------------------------------------------
| User Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Dashboard Pages (Dummy for UI)
|--------------------------------------------------------------------------
*/

Route::get('/profile', function () {
    return view('dashboard.profile');
})->name('profile');

Route::get('/settings', function () {
    return view('dashboard.settings');
})->name('settings');

Route::get('/logout', function () {
    return view('dashboard.logout');
})->name('logout');
