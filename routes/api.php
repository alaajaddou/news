<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PlansController;
use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\NewsController;
use App\Services\PostFetcher;
use Illuminate\Support\Facades\Route;

// Legacy routes
Route::prefix('v1')->group(function () {
    Route::get('/news', [NewsController::class, 'index']);

    Route::get('/sync', function () {
        $fetcher = new PostFetcher();
        $fetcher->fetchAllSources();
    });
});

// Authentication routes
Route::group(['prefix' => 'api', 'middleware' => ['app.token']], function () {
    // Public authentication endpoints
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Social authentication
    Route::get('/social-login/{provider}', [AuthController::class, 'socialRedirect']);
    Route::get('/social-callback/{provider}', [AuthController::class, 'socialCallback']);

    // Protected authentication endpoints
    Route::middleware('auth:api')->group(function () {
        Route::post('/token/refresh', [AuthController::class, 'refreshToken']);
        Route::get('/verify', [AuthController::class, 'verify']);
        Route::post('/logout', [AuthController::class, 'logout']);

        // Settings and preferences
        Route::get('/settings', [SettingsController::class, 'index']);
        Route::get('/settings/category/{category}', [SettingsController::class, 'getByCategory']);
        Route::post('/settings/update', [SettingsController::class, 'updatePreferences']);
        Route::post('/settings/reset', [SettingsController::class, 'resetPreferences']);

        // Plans management - Admin only routes
        Route::middleware('can:manage-plans')->group(function () {
            Route::post('/plans', [PlansController::class, 'store']);
            Route::put('/plans/{id}', [PlansController::class, 'update']);
            Route::delete('/plans/{id}', [PlansController::class, 'destroy']);
        });
    });

    // Public plans routes (still require app token)
    Route::get('/plans', [PlansController::class, 'index']);
    Route::get('/plans/search', [PlansController::class, 'search']);
    Route::get('/plans/{slug}', [PlansController::class, 'show']);
});
