<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();

        $tokenResult = $user->createToken('Access Token');
        $accessToken = $tokenResult->accessToken;
        $token = $tokenResult->token;

        return response()->json([
            'access_token' => $accessToken,
            'token_type' => 'Bearer',
            'expires_at' => $token->expires_at,
            'user' => $user,
        ]);
    }
}
