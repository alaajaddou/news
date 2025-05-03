<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/news', [NewsController::class, 'index']);
});


Route::post('/login', function () {
    $credentials = request()->only('email', 'password');

    if (auth()::attempt($credentials)) {
        $user = auth()::user();
        $token = $user->createToken('Access Token')->accessToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
});
