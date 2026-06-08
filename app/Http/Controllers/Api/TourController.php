<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;

class TourController extends Controller
{
    /**
     * @OA\Get(
     *     path="/tours",
     *     tags={"Tour"},
     *     summary="Lihat semua tour/destinasi",
     *     @OA\Response(response=200, description="List tour berhasil diambil")
     * )
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data'    => Destination::all(),
        ]);
    }

    /**
     * @OA\Get(
     *     path="/tours/{id}",
     *     tags={"Tour"},
     *     summary="Lihat detail tour",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer"), example=1),
     *     @OA\Response(response=200, description="Detail tour"),
     *     @OA\Response(response=404, description="Tour tidak ditemukan")
     * )
     */
    public function show($id)
    {
        return response()->json([
            'success' => true,
            'data'    => Destination::findOrFail($id),
        ]);
    }
}