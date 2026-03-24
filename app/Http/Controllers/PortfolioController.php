<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Template;
use App\Services\TemplateService;
use Barryvdh\DomPDF\Facade\Pdf;

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

        return view('dashboard.portfolio.template', compact('portfolio', 'templates'));
    }

    public function preview($id, TemplateService $templateService)
    {
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

        return view('dashboard.portfolio.preview', [
            'portfolio' => $portfolio,
            'data' => $data
        ]);
    }

    public function download($id, TemplateService $templateService)
    {
        $portfolio = \App\Models\Portfolio::findOrFail($id);

        $data = $templateService->transform($portfolio->data);

        return view('dashboard.portfolio.download', compact('portfolio', 'data'));
    }

    public function downloadFile($id, TemplateService $templateService)
    {
        $portfolio = Auth::check()
            ? Auth::user()->portfolios()->findOrFail($id)
            : \App\Models\Portfolio::findOrFail($id);

        // ❗ pastikan ada template
        if (!$portfolio->template) {
            abort(404, 'Template belum dipilih');
        }

        // ambil HTML template
        $html = Storage::get($portfolio->template->file_path);

        // transform data (mode PDF)
        $data = $templateService->transform($portfolio->data, 'pdf');

        // render placeholder
        $rendered = app(\App\Http\Controllers\TemplateController::class)
            ->renderTemplate($html, $data);

        // generate PDF
        $pdf = Pdf::loadHTML($rendered)
            ->setPaper('a4', 'portrait');

        return $pdf->download('portfolio.pdf');
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
