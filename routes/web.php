<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DashboardController;

/* --- Landing Page --- */
Route::view('/', 'pages.home')->name('home');

/* --- Authentication --- */
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* --- Portfolio Flow (Public/Guest) --- */
Route::get('/create-portfolio', [PortfolioController::class, 'create'])->name('guest.portfolio.create');
Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
Route::get('/portfolio-template/{id}', [PortfolioController::class, 'showTemplate'])->name('guest.portfolio.template'); // RECOVERED
Route::get('/portfolio-preview/{id}', [PortfolioController::class, 'preview'])->name('guest.portfolio.preview');
Route::get('/portfolio-download/{id}', [PortfolioController::class, 'download'])->name('guest.portfolio.download'); // RECOVERED

/* --- Protected Routes (Auth Required) --- */
Route::middleware('auth')->group(function () {

    // Dashboard Core
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::get('/portfolio-templates', [DashboardController::class, 'templatesIndex'])->name('portfolio.templates'); // RECOVERED

    // Portfolio Management
    Route::prefix('portfolio')->group(function () {
        Route::get('/', [DashboardController::class, 'portfolioIndex'])->name('portfolio.index');
        Route::get('/create', [PortfolioController::class, 'create'])->name('portfolio.create');
        Route::get('/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit'); // RECOVERED
        Route::get('/{id}/template', [PortfolioController::class, 'showTemplate'])->name('portfolio.template');
        Route::get('/{id}/preview', [PortfolioController::class, 'preview'])->name('portfolio.preview');
        Route::get('/{id}/download', [PortfolioController::class, 'download'])->name('portfolio.download');
    });
});

/* --- Admin Routes --- */
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'adminIndex'])->name('admin.index');
    Route::get('/templates', [DashboardController::class, 'adminTemplates'])->name('admin.templates');
    Route::post('/templates', [TemplateController::class, 'store'])->name('admin.templates.store');
    Route::get('/users', [DashboardController::class, 'adminUsers'])->name('admin.users'); // RECOVERED
    Route::get('/portfolios', [DashboardController::class, 'adminPortfolios'])->name('admin.portfolios'); // RECOVERED
});

// Test Route
Route::get('/test-template/{id}', [TemplateController::class, 'previewTemplate']);
