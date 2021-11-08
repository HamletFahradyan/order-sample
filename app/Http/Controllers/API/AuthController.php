<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] = $authUser->createToken('OrderApp')->plainTextToken;
            $success['name'] = $authUser->name;

            return response()->json([
                'success' => 'success',
                'data'    => $success,
                'message' => 'User signed in',
            ], 200);
        } else {
            return response()->json([
                'success' => 'failed',
                'message' => 'Unauthorised',
            ], 404);
        }
    }
}
