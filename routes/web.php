<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home');

Route::view('/login', 'auth.login')->name('login');

Route::view('/register', 'auth.register')->name('register');

// Portfolio Routes (Dummy for UI)
Route::view('/create-portfolio', 'portfolio.create')->name('portfolio.create');
Route::view('/portfolio-template', 'portfolio.template')->name('portfolio.template');
Route::view('/portfolio-preview', 'portfolio.preview')->name('portfolio.preview');
Route::view('/portfolio-download', 'portfolio.download')->name('portfolio.download');

// Dashboard Route (Dummy for UI)
Route::view('/dashboard', 'dashboard.index')->name('dashboard');
