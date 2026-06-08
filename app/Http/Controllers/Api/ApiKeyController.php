<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiKey;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api-keys",
     *     tags={"API Key"},
     *     summary="Lihat semua API key milik user",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response=200, description="List API key berhasil diambil"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function index()
    {
        $keys = auth('api')->user()->apiKeys()->latest()->get();

        return response()->json([
            'success' => true,
            'data'    => $keys,
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api-keys",
     *     tags={"API Key"},
     *     summary="Buat API key baru",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(required=true,
     *         @OA\JsonContent(required={"name"},
     *             @OA\Property(property="name", type="string", example="Key untuk Postman")
     *         )
     *     ),
     *     @OA\Response(response=201, description="API key berhasil dibuat"),
     *     @OA\Response(response=422, description="Validasi gagal"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $apiKey = ApiKey::create([
            'user_id' => auth('api')->id(),
            'name'    => $request->name,
            'key'     => ApiKey::generate(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'API key berhasil dibuat. Simpan key ini, tidak akan ditampilkan lagi!',
            'data'    => $apiKey,
        ], 201);
    }

    /**
     * @OA\Delete(
     *     path="/api-keys/{id}",
     *     tags={"API Key"},
     *     summary="Nonaktifkan API key",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer"), example=1),
     *     @OA\Response(response=200, description="API key berhasil dinonaktifkan"),
     *     @OA\Response(response=404, description="API key tidak ditemukan"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function destroy($id)
    {
        $apiKey = auth('api')->user()->apiKeys()->findOrFail($id);
        $apiKey->update(['is_active' => false]);

        return response()->json([
            'success' => true,
            'message' => 'API key dinonaktifkan',
        ]);
    }
}