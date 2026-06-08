<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    /**
     * @OA\Get(
     *     path="/destinations",
     *     tags={"Destination"},
     *     summary="Lihat semua destinasi",
     *     @OA\Response(response=200, description="List destinasi berhasil diambil")
     * )
     */
    public function index()
    {
        $destinations = Destination::all();
        return response()->json([
            'success' => true,
            'data'    => $destinations,
        ], 200);
    }

    /**
     * @OA\Post(
     *     path="/destinations",
     *     tags={"Destination"},
     *     summary="Tambah destinasi baru",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(required=true,
     *         @OA\JsonContent(required={"name","kabupaten","provinsi","description"},
     *             @OA\Property(property="name", type="string", example="Pantai Watu Karung"),
     *             @OA\Property(property="kabupaten", type="string", example="Pacitan"),
     *             @OA\Property(property="provinsi", type="string", example="Jawa Timur"),
     *             @OA\Property(property="description", type="string", example="Pantai tersembunyi dengan ombak kelas dunia"),
     *             @OA\Property(property="image", type="string", example="images/destinations/watu-karung.jpg")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Destinasi berhasil ditambahkan"),
     *     @OA\Response(response=422, description="Validasi gagal")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'kabupaten'   => 'required|string',
            'provinsi'    => 'required|string',
            'description' => 'required',
            'image'       => 'nullable|string',
        ]);

        $input         = $request->all();
        $input['slug'] = Str::slug($request->name);

        $destination = Destination::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Destinasi berhasil ditambahkan',
            'data'    => $destination,
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/destinations/{id}",
     *     tags={"Destination"},
     *     summary="Lihat detail destinasi",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer"), example=1),
     *     @OA\Response(response=200, description="Detail destinasi"),
     *     @OA\Response(response=404, description="Destinasi tidak ditemukan")
     * )
     */
    public function show($id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $destination,
        ], 200);
    }

    /**
     * @OA\Put(
     *     path="/destinations/{id}",
     *     tags={"Destination"},
     *     summary="Update destinasi",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer"), example=1),
     *     @OA\RequestBody(required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Pantai Watu Karung Updated"),
     *             @OA\Property(property="kabupaten", type="string", example="Pacitan"),
     *             @OA\Property(property="provinsi", type="string", example="Jawa Timur"),
     *             @OA\Property(property="description", type="string", example="Deskripsi baru")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Destinasi berhasil diperbarui"),
     *     @OA\Response(response=404, description="Destinasi tidak ditemukan")
     * )
     */
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $input = $request->all();
        if ($request->has('name')) {
            $input['slug'] = Str::slug($request->name);
        }

        $destination->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Destinasi berhasil diperbarui',
            'data'    => $destination,
        ], 200);
    }

    /**
     * @OA\Delete(
     *     path="/destinations/{id}",
     *     tags={"Destination"},
     *     summary="Hapus destinasi",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer"), example=1),
     *     @OA\Response(response=200, description="Destinasi berhasil dihapus"),
     *     @OA\Response(response=404, description="Destinasi tidak ditemukan")
     * )
     */
    public function destroy($id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $destination->delete();

        return response()->json([
            'success' => true,
            'message' => 'Destinasi berhasil dihapus',
        ], 200);
    }
}