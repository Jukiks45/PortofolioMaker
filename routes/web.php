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
        Route::get('/{id}/download', [PortfolioController::class, 'download'])->name('portfolio.download.page');
    });
});

/* --- Admin Routes --- */
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'adminIndex'])->name('admin.index');
    Route::get('/templates', [DashboardController::class, 'adminTemplates'])->name('admin.templates');
    Route::post('/templates', [TemplateController::class, 'store'])->name('admin.templates.store');
    Route::get('/users', [DashboardController::class, 'adminUsers'])->name('admin.users'); // RECOVERED
    Route::get('/users/{id}', [DashboardController::class, 'getUserData'])->name('api.admin.user.data');
    Route::put('/users/{id}', [DashboardController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{id}', [DashboardController::class, 'deleteUser'])->name('admin.users.delete');
    Route::put('/templates/{id}', [TemplateController::class, 'update']);
    Route::delete('/templates/{id}', [TemplateController::class, 'destroy'])->name('admin.templates.delete');
    Route::get('/portfolios', [DashboardController::class, 'adminPortfolios'])->name('admin.portfolios'); // RECOVERED
    Route::get('/portfolios/{id}', [DashboardController::class, 'getPortfolio'])->name('api.admin.portfolio.data');
    Route::delete('/portfolios/{id}', [DashboardController::class, 'deletePortfolio'])->name('admin.portfolios.delete');
});

// Test Route
Route::get('/test-template/{id}', [TemplateController::class, 'previewTemplate']);

// Render endpoint
Route::get('/portfolio/{id}/render', [PortfolioController::class, 'render'])
    ->name('portfolio.render');

// Download routes
Route::get('/portfolio/{id}/print', [PortfolioController::class, 'print'])
    ->name('portfolio.print');

// Snap Token endpoint
Route::get('/portfolio/{id}/snap-token', [PortfolioController::class, 'getSnapToken'])
    ->name('portfolio.snap-token');

// Midtrans Callback (for payment notification)
Route::post('/midtrans/callback', [PortfolioController::class, 'midtransCallback'])
    ->name('midtrans.callback');

// Development payment simulation endpoint
Route::post('/portfolio/{id}/mark-paid', function ($id) {
    $portfolio = \App\Models\Portfolio::findOrFail($id);

    // Protection against bypassing - only update if not already paid
    if ($portfolio->is_paid) {
        return response()->json(['message' => 'Already paid']);
    }

    $portfolio->update([
        'is_paid' => true
    ]);

    return response()->json(['success' => true]);
});
