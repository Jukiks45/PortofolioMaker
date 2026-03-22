<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() { return view('dashboard.index'); }

    public function portfolioIndex() { return view('dashboard.portfolio.index'); }

    public function profile() { return view('dashboard.profile.index'); }

    public function settings() { return view('dashboard.settings.index'); }

    public function adminIndex() { return view('dashboard.admin.index'); }

    public function adminTemplates() { return view('dashboard.admin.templates'); }

    public function templatesIndex() { return view('dashboard.templates.index'); }

    public function adminUsers() { return view('dashboard.admin.users'); }

    public function adminPortfolios() { return view('dashboard.admin.portfolios'); }
}
