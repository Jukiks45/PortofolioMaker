<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Template;
use App\Services\TemplateService;

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

                        if (is_array($item)) {
                            foreach ($item as $k => $v) {
                                $temp = str_replace("{{{$k}}}", $v, $temp);
                            }
                        } else {
                            // handle array of string → {{.}}
                            $temp = str_replace("{{.}}", $item, $temp);
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

    public function previewTemplate($id, TemplateService $templateService)
    {
        $portfolio = \App\Models\Portfolio::findOrFail($id);

        $template = $portfolio->template;

        if (!$template) {
            abort(404, 'Template belum dipilih');
        }

        $html = Storage::get($template->file_path);
        $data = $templateService->transform($portfolio->data, 'html');

        // debug mode
        if (request('debug')) {
            return response()->json($data);
        }

        $rendered = $this->renderTemplate($html, $data);

        return response($rendered)->header('Content-Type', 'text/html');
    }

    public function update(Request $request, $id)
    {
        $template = Template::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|required|string|max:150',
            'slug' => "sometimes|required|string|max:150|unique:templates,slug,$id",
            'status' => 'sometimes|required|in:active,inactive',
            'category_name' => 'sometimes|nullable|string'
        ]);

        $data = $request->only(['title', 'slug', 'category_name']);

        if ($request->has('status')) {
            $data['status'] = $request->status === 'active' ? 1 : 0;
        }

        $template->update($data);

        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        $template = Template::findOrFail($id);

        // optional: hapus file juga
        if ($template->file_path && Storage::exists($template->file_path)) {
            Storage::delete($template->file_path);
        }

        if ($template->image_path && Storage::exists('public/' . $template->image_path)) {
            Storage::delete('public/' . $template->image_path);
        }

        $template->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
