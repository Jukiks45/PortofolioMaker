<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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
| Authentication (Backend Ready)
|--------------------------------------------------------------------------
*/

// guest only
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
});

// process
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


/*
|--------------------------------------------------------------------------
| Portfolio Builder (Guest Flow)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/create-portfolio', function () {
        return view('portfolio.create');
    })->name('guest.portfolio.create');

Route::get('/portfolio-template/{id}', function ($id) {
    $portfolio = \App\Models\Portfolio::findOrFail($id);

    return view('portfolio.template', compact('portfolio'));
})->name('guest.portfolio.template');

    Route::get('/portfolio-preview', function () {
        return view('portfolio.preview');
    })->name('guest.portfolio.preview');

    Route::get('/portfolio-download', function () {
        return view('portfolio.download');
    })->name('guest.portfolio.download');
});


/*
|--------------------------------------------------------------------------
| Protected Routes (AUTH REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // portfolio dashboard
    Route::get('/portfolio', function () {
        return view('dashboard.portfolio.index');
    })->name('portfolio.index');

    Route::get('/portfolio/create', function () {
        return view('dashboard.portfolio.create');
    })->name('portfolio.create');

    Route::get('/portfolio/edit', function () {
        return view('dashboard.portfolio.edit');
    })->name('portfolio.edit');

    Route::get('/portfolio/{id}/template', function ($id) {
        $portfolio = \App\Models\Portfolio::findOrFail($id);

        return view('dashboard.portfolio.template', compact('portfolio'));
    })->name('portfolio.template');

    Route::get('/portfolio/preview', function () {
        return view('dashboard.portfolio.preview');
    })->name('portfolio.preview');

    Route::get('/portfolio/download', function () {
        return view('dashboard.portfolio.download');
    })->name('portfolio.download');


    // preview portfolio
    Route::get('/portfolio/{id}/preview', [App\Http\Controllers\PortfolioController::class, 'preview'])->name('portfolio.preview');

    // templates
    Route::get('/portfolio-templates', function () {
        return view('dashboard.templates.index');
    })->name('portfolio.templates');

    // profile
    Route::get('/profile', function () {
        return view('dashboard.profile.index');
    })->name('profile');

    // settings
    Route::get('/settings', function () {
        return view('dashboard.settings.index');
    })->name('settings');
});

// simpan portfolio
Route::post('/portfolio', [App\Http\Controllers\PortfolioController::class, 'store'])->name('portfolio.store');

// preview portfolio
Route::get('/portfolio/{id}/preview', [App\Http\Controllers\PortfolioController::class, 'preview'])->name('portfolio.preview');

// guest preview
Route::get('/portfolio-preview/{id}', function ($id) {
    $portfolio = \App\Models\Portfolio::findOrFail($id);

    if ($portfolio->user_id && Auth::check() && $portfolio->user_id !== Auth::id()) {
        abort(403);
    }

    return view('portfolio.preview', [
        'portfolio' => $portfolio,
        'data' => $portfolio->data
    ]);
})->name('guest.portfolio.preview');

/*
|--------------------------------------------------------------------------
| Admin Routes (AUTH + ADMIN ROLE REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
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
});


/*
|--------------------------------------------------------------------------
| Logout (Fixed)
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
