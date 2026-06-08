<?php
// app/Http/Middleware/CheckApiKey.php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use Closure;
use Illuminate\Http\Request;

class CheckApiKey
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil key dari header X-API-Key atau query param ?api_key=
        $key = $request->header('X-API-Key') ?? $request->query('api_key');

        if (!$key) {
            return response()->json([
                'success' => false,
                'message' => 'API key tidak ditemukan. Sertakan header X-API-Key.',
            ], 401);
        }

        $apiKey = ApiKey::where('key', $key)
                        ->where('is_active', true)
                        ->first();

        if (!$apiKey) {
            return response()->json([
                'success' => false,
                'message' => 'API key tidak valid atau sudah dinonaktifkan.',
            ], 403);
        }

        // Update waktu terakhir dipakai
        $apiKey->update(['last_used_at' => now()]);

        // Inject user ke request
        $request->merge(['api_user' => $apiKey->user]);

        return $next($request);
    }
}