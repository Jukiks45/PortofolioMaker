<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function store(Request $request)
    {
        // ambil semua data form
        $data = $request->except('_token');

        // handle upload foto
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profiles', 'public');
            $data['profile_photo'] = $path;
        }

        $user = Auth::user();

        // simpan ke database
        $portfolio = \App\Models\Portfolio::create([
            'user_id' => $user?->id, // null jika guest
            'title' => $request->name ?? 'Portfolio',
            'data' => $data
        ]);

        // USER FLOW
        if ($user) {
            return redirect()->route('portfolio.template', $portfolio->id)
                ->with('success', 'Portfolio berhasil dibuat!');
        }

        // GUEST FLOW
        return redirect()->route('guest.portfolio.template', $portfolio->id);
    }

    public function preview($id)
    {
        $portfolio = Auth::user()
            ? Auth::user()->portfolios()->findOrFail($id)
            : \App\Models\Portfolio::findOrFail($id);

        $templateId = request('template_id');

        if ($templateId) {
            $portfolio->update(['template_id' => $templateId]);
        }

        return view('portfolio.preview', [
            'portfolio' => $portfolio,
            'data' => $portfolio->data
        ]);
    }
}
