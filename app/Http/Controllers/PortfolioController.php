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

        // simpan ke database
        $portfolio = Auth::user()->portfolios()->create([
            'title' => $request->name ?? 'Portfolio',
            'data' => $data
        ]);

        return redirect()->route('portfolio.preview', $portfolio->id)
            ->with('success', 'Portfolio berhasil dibuat!');
    }

    public function preview($id)
    {
        $portfolio = Auth::user()->portfolios()->findOrFail($id);
        $data = $portfolio->data;

        return view('templates.template1', compact('portfolio', 'data'));
    }
}
