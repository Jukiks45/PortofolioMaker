<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');


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
})->name('guest.portfolio.create');

Route::get('/portfolio-template', function () {
    return view('portfolio.template');
})->name('guest.portfolio.template');

Route::get('/portfolio-preview', function () {
    return view('portfolio.preview');
})->name('guest.portfolio.preview');

Route::get('/portfolio-download', function () {
    return view('portfolio.download');
})->name('guest.portfolio.download');


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
| Dashboard Portfolio
|--------------------------------------------------------------------------
*/

Route::get('/portfolio', function () {
    return view('dashboard.portfolio.index');
})->name('portfolio.index');

Route::get('/portfolio/create', function () {
    return view('dashboard.portfolio.create');
})->name('portfolio.create');

Route::get('/portfolio/edit', function () {
    return view('dashboard.portfolio.edit');
})->name('portfolio.edit');

Route::get('/portfolio/template', function () {
    return view('dashboard.portfolio.template');
})->name('portfolio.template');

Route::get('/portfolio/preview', function () {
    return view('dashboard.portfolio.preview');
})->name('portfolio.preview');

Route::get('/portfolio/download', function () {
    return view('dashboard.portfolio.download');
})->name('portfolio.download');


/*
|--------------------------------------------------------------------------
| Templates
|--------------------------------------------------------------------------
*/

Route::get('/portfolio-templates', function () {
    return view('dashboard.templates.index');
})->name('portfolio.templates');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::get('/profile', function () {
    return view('dashboard.profile.index');
})->name('profile');


/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/

Route::get('/settings', function () {
    return view('dashboard.settings.index');
})->name('settings');


/*
|--------------------------------------------------------------------------
| Logout (Dummy UI)
|--------------------------------------------------------------------------
*/

Route::get('/logout', function () {
    return view('dashboard.logout');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {
    return view('dashboard.admin.index');
});

Route::get('/admin/templates', function () {
    return view('dashboard.admin.templates');
});

Route::get('/admin/users', function () {
    return view('dashboard.admin.users');
});

Route::get('/admin/portfolios', function () {
    return view('dashboard.admin.portfolios');
});
