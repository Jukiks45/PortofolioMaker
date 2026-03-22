<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Template;

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

    public function preview($id)
    {
        $portfolio = Auth::user()
            ? Auth::user()->portfolios()->findOrFail($id)
            : \App\Models\Portfolio::findOrFail($id);

        $templateId = request('template_id');

        if ($templateId) {
            $portfolio->update(['template_id' => $templateId]);
        }

        // Cek apakah ada template yang dipilih
        $template = $portfolio->template;

        // Jika template ada, gunakan template engine
        if ($template) {
            $html = Storage::get($template->file_path);
            $data = $portfolio->data;

            // Mapping data sesuai format template
            $data['address'] = $data['location'] ?? '';

            // education
            $data['education'] = [];
            if (isset($data['education_degree'])) {
                foreach ($data['education_degree'] as $i => $degree) {
                    $data['education'][] = [
                        'degree' => $degree,
                        'school' => $data['education_institution'][$i] ?? '',
                        'year' => ($data['education_start_year'][$i] ?? '') . ' - ' . ($data['education_end_year'][$i] ?? '')
                    ];
                }
            }

            // skills
            $data['skills'] = [];
            if (isset($data['skill_name'])) {
                foreach ($data['skill_name'] as $i => $name) {
                    $data['skills'][] = [
                        'name' => $name,
                        'level' => $data['skill_level'][$i] ?? ''
                    ];
                }
            }

            // experience
            $data['experience'] = [];
            if (isset($data['experience_company'])) {
                foreach ($data['experience_company'] as $i => $company) {
                    $data['experience'][] = [
                        'company' => $company,
                        'position' => $data['experience_position'][$i] ?? '',
                        'date' => ($data['experience_start_date'][$i] ?? '') . ' - ' . ($data['experience_end_date'][$i] ?? ''),
                        'description' => $data['experience_description'][$i] ?? ''
                    ];
                }
            }

            // references
            $data['references'] = [];
            if (isset($data['reference_name'])) {
                foreach ($data['reference_name'] as $i => $name) {
                    $data['references'][] = [
                        'name' => $name,
                        'position' => $data['reference_position'][$i] ?? '',
                        'company' => $data['reference_company'][$i] ?? '',
                        'phone' => $data['reference_phone'][$i] ?? ''
                    ];
                }
            }

            // Render template
            $rendered = app(\App\Http\Controllers\TemplateController::class)
                ->renderTemplate($html, $data);

            return response($rendered)->header('Content-Type', 'text/html');
        }

        // Fallback ke view biasa jika belum pilih template
        return view('portfolio.preview', [
            'portfolio' => $portfolio,
            'data' => $portfolio->data
        ]);
    }

    public function download($id)
    {
        $portfolio = \App\Models\Portfolio::findOrFail($id);
        // Logika download...
        return view('dashboard.portfolio.download', compact('portfolio'));
    }

    public function edit($id)
    {
        $portfolio = \App\Models\Portfolio::findOrFail($id);
        return view('dashboard.portfolio.edit', compact('portfolio'));
    }
}
