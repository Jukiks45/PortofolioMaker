<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Template;
use App\Services\TemplateService;
use Midtrans\Config;
use Midtrans\Snap;

class PortfolioController extends Controller
{
    private function initMidtrans()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

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

    public function getSnapToken($id)
    {
        $this->initMidtrans();

        $portfolio = \App\Models\Portfolio::findOrFail($id);

        $orderId = 'PORTO-' . $portfolio->id . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => 10000, // harga sementara
            ],
            'customer_details' => [
                'first_name' => $portfolio->data['name'] ?? 'Guest',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json([
            'token' => $snapToken
        ]);
    }

    public function midtransCallback(Request $request)
    {
        // Verifikasi signature key dari Midtrans
        $serverKey = config('midtrans.server_key');
        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $grossAmount = $request->gross_amount;
        $signatureKey = $request->signature_key;

        // Generate expected signature
        $input = $orderId . $statusCode . $grossAmount . $serverKey;
        $expectedSignature = hash('sha512', $input);

        if ($signatureKey !== $expectedSignature) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Ekstrak portfolio ID dari order_id (format: PORTO-{id}-{timestamp})
        $parts = explode('-', $orderId);
        if (count($parts) < 2) {
            return response()->json(['message' => 'Invalid order ID'], 400);
        }

        $portfolioId = $parts[1];
        $portfolio = \App\Models\Portfolio::find($portfolioId);

        if (!$portfolio) {
            return response()->json(['message' => 'Portfolio not found'], 404);
        }

        // Update status pembayaran berdasarkan status transaksi
        $transactionStatus = $request->transaction_status;

        if ($transactionStatus == 'capture') {
            // Untuk credit card, status capture berarti pembayaran berhasil
            if ($request->fraud_status == 'accept') {
                $portfolio->update(['is_paid' => true]);
            }
        } elseif ($transactionStatus == 'settlement') {
            // Untuk selain credit card, status settlement berarti pembayaran berhasil
            $portfolio->update(['is_paid' => true]);
        } elseif ($transactionStatus == 'expire' || $transactionStatus == 'cancel' || $transactionStatus == 'deny') {
            // Pembayaran gagal/dibatalkan
            $portfolio->update(['is_paid' => false]);
        }

        return response()->json(['message' => 'Callback processed successfully']);
    }

}
