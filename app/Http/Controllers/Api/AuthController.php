<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
/**
 * @OA\Info(
 *     title="GoJatim Travel API",
 *     version="1.0.0",
 *     description="Dokumentasi API GoJatim Travel"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 * @OA\Server(url="http://127.0.0.1:8000/api/v1")
 */
class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/register",
     *     tags={"Auth"},
     *     summary="Registrasi user baru",
     *     @OA\RequestBody(required=true,
     *         @OA\JsonContent(required={"name","email","password","password_confirmation"},
     *             @OA\Property(property="name", type="string", example="Budi"),
     *             @OA\Property(property="email", type="string", example="budi@email.com"),
     *             @OA\Property(property="password", type="string", example="password123"),
     *             @OA\Property(property="password_confirmation", type="string", example="password123")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Registrasi berhasil"),
     *     @OA\Response(response=422, description="Validasi gagal")
     * )
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        $token = auth('api')->login($user);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil',
            'data'    => [
                'user'  => $user,
                'token' => $token,
                'type'  => 'bearer',
            ],
        ], 201);
    }

    /**
     * @OA\Post(
     *     path="/login",
     *     tags={"Auth"},
     *     summary="Login user",
     *     @OA\RequestBody(required=true,
     *         @OA\JsonContent(required={"email","password"},
     *             @OA\Property(property="email", type="string", example="budi@email.com"),
     *             @OA\Property(property="password", type="string", example="password123")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Login berhasil, token dikembalikan"),
     *     @OA\Response(response=401, description="Email atau password salah")
     * )
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah',
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @OA\Get(
     *     path="/me",
     *     tags={"Auth"},
     *     summary="Lihat profil user yang sedang login",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response=200, description="Data profil user"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function me()
    {
        $user = auth('api')->user()->load('bookings.tour');
        return response()->json([
            'success' => true,
            'data'    => $user,
        ]);
    }

    /**
     * @OA\Post(
     *     path="/logout",
     *     tags={"Auth"},
     *     summary="Logout user",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response=200, description="Berhasil logout")
     * )
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil logout',
        ]);
    }

    /**
     * @OA\Post(
     *     path="/refresh",
     *     tags={"Auth"},
     *     summary="Refresh JWT token",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response=200, description="Token baru dikembalikan")
     * )
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    private function respondWithToken(string $token)
    {
        return response()->json([
            'success' => true,
            'data'    => [
                'user'       => auth('api')->user(),
                'token'      => $token,
                'type'       => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60 . ' detik',
            ],
        ]);
    }
}