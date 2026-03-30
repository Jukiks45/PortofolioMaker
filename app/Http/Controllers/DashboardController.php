<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() { return view('dashboard.index'); }

    public function portfolioIndex()
    {
        $portfolios = Portfolio::with('template')
            ->where('user_id',Auth::id())
            ->latest()
            ->get();

        return view('dashboard.portfolio.index', compact('portfolios'));
    }

    public function profile() { return view('dashboard.profile.index'); }

    public function settings() { return view('dashboard.settings.index'); }

    public function adminIndex() { return view('dashboard.admin.index'); }

    public function adminTemplates()
    {
        $templates = \App\Models\Template::latest()->get();
        return view('dashboard.admin.templates', compact('templates'));
    }

    public function templatesIndex() { return view('dashboard.templates.index'); }

    public function adminUsers()
    {
        $users = \App\Models\User::with('portfolios')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.admin.users', compact('users'));
    }

    public function getUserData($id)
    {
        $user = \App\Models\User::with('portfolios')
            ->findOrFail($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? '-',
            'role' => $user->role ?? 'Member',
            'avatar' => strtoupper(substr($user->name, 0, 1)),
            'total_portfolios' => $user->portfolios->count(),
            'created_at' => $user->created_at->format('d M Y')
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully'
        ]);
    }

    public function deleteUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted'
        ]);
    }

    public function adminPortfolios() { return view('dashboard.admin.portfolios'); }
}
