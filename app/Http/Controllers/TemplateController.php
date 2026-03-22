<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller
{
    public function store(Request $request)
    {
        // VALIDASI SEDERHANA (ikuti gaya AuthController)
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'slug' => ['required', 'string', 'max:150', 'unique:templates,slug'],
            'category_name' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],

            // FILE
            'html_file' => ['required', 'file', 'mimes:html'],
            'image' => ['nullable', 'image'],
        ]);

        // simpan HTML
        $htmlPath = $request->file('html_file')->store('templates');

        // simpan image (optional)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('templates/images', 'public');
        }

        // SIMPAN (sementara tanpa upload file)
        Template::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'file_path' => $htmlPath,
            'image_path' => $imagePath,
            'category_name' => $validated['category_name'] ?? null,
            'status' => $validated['status'] === 'active' ? 1 : 0,
        ]);

        return back()->with('success', 'Template berhasil ditambahkan');
    }

    public function renderTemplate($html, $data)
    {
        // 1. HANDLE LOOP
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $pattern = "/{{#$key}}(.*?){{\/$key}}/s";

                if (preg_match($pattern, $html, $matches)) {
                    $block = '';

                    foreach ($value as $item) {
                        $temp = $matches[1];

                        foreach ($item as $k => $v) {
                            $temp = str_replace("{{{$k}}}", $v, $temp);
                        }

                        $block .= $temp;
                    }

                    $html = preg_replace($pattern, $block, $html);
                }
            }
        }

        // 2. HANDLE SINGLE VALUE
        foreach ($data as $key => $value) {
            if (!is_array($value)) {
                $html = str_replace("{{{$key}}}", $value, $html);
            }
        }

        return $html;
    }

    public function previewTemplate($id)
    {
        $portfolio = \App\Models\Portfolio::findOrFail($id);
        $template = Template::first(); // sementara ambil 1 dulu

        $html = \Illuminate\Support\Facades\Storage::get($template->file_path);

        $data = $portfolio->data;

        // =========================
        // FIX BASIC FIELD
        // =========================
        $data['address'] = $data['location'] ?? '';

        // =========================
        // FIX EDUCATION
        // =========================
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

        // =========================
        // FIX SKILLS
        // =========================
        $data['skills'] = [];

        if (isset($data['skill_name'])) {
            foreach ($data['skill_name'] as $i => $name) {
                $data['skills'][] = [
                    'name' => $name,
                    'level' => $data['skill_level'][$i] ?? ''
                ];
            }
        }

        // =========================
        // FIX EXPERIENCE
        // =========================
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

        // =========================
        // FIX REFERENCES
        // =========================
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

        $rendered = $this->renderTemplate($html, $data);

        return response($rendered);
    }
}
