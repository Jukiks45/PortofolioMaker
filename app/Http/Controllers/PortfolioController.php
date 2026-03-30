<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Template;
use App\Services\TemplateService;

class PortfolioController extends Controller
{
    public function create()
    {
        // Cek apakah user login atau guest untuk menentukan view
        $view = Auth::check() ? 'dashboard.portfolio.create' : 'portfolio.create';
        return view($view);
    }

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

    public function showTemplate($id)
    {
        $portfolio = \App\Models\Portfolio::findOrFail($id);
        $templates = \App\Models\Template::where('status', 1)->get();

        $view = Auth::check()
            ? 'dashboard.portfolio.template'
            : 'portfolio.template';

        return view($view, compact('portfolio', 'templates'));
    }

    public function preview($id, TemplateService $templateService)
    {
        // Proteksi: guest tidak boleh akses route user
        if (!Auth::check() && request()->routeIs('portfolio.*')) {
            abort(403);
        }

        $portfolio = Auth::user()
            ? Auth::user()->portfolios()->findOrFail($id)
            : \App\Models\Portfolio::findOrFail($id);

        // simpan template_id jika ada
        if (request('template_id')) {
            $portfolio->update([
                'template_id' => request('template_id')
            ]);
        }

        $data = $templateService->transform($portfolio->data);

        $view = Auth::check()
            ? 'dashboard.portfolio.preview'
            : 'portfolio.preview';

        return view($view, [
            'portfolio' => $portfolio,
            'data' => $data
        ]);
    }

    public function download($id, TemplateService $templateService)
    {
        $portfolio = \App\Models\Portfolio::findOrFail($id);

        $data = $templateService->transform($portfolio->data);

        $view = Auth::check()
            ? 'dashboard.portfolio.download'
            : 'portfolio.download';

        return view($view, compact('portfolio', 'data'));
    }

    public function print($id, TemplateService $templateService)
    {
        $portfolio = \App\Models\Portfolio::with('template')->findOrFail($id);

        if (!$portfolio->template_id) {
            abort(404);
        }

        $template = $portfolio->template;
        $html = Storage::get($template->file_path);
        $data = $templateService->transform($portfolio->data, 'html');
        $rendered = app(\App\Http\Controllers\TemplateController::class)
            ->renderTemplate($html, $data);

        return response($rendered)->header('Content-Type', 'text/html');
    }

    public function render($id, TemplateService $templateService)
    {
        $portfolio = \App\Models\Portfolio::findOrFail($id);

        if (!$portfolio->template_id) {
            abort(404);
        }

        $template = $portfolio->template;
        $html = \Storage::get($template->file_path);
        $data = $templateService->transform($portfolio->data);

        // gunakan mapping yang sudah Anda punya
        $data = app(\App\Http\Controllers\TemplateController::class)
            ->renderTemplate($html, $data);

        return response($data)->header('Content-Type', 'text/html');
    }

    public function edit($id)
    {
        $portfolio = \App\Models\Portfolio::findOrFail($id);
        return view('dashboard.portfolio.edit', compact('portfolio'));
    }

}
