<?php

namespace App\Http\Middleware;

use App\Models\AppToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ValidateAppToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $appId = $request->header('X-App-ID');
        $appSecret = $request->header('X-App-Secret');

        if (!$appId || !$appSecret) {
            Log::warning('API request missing app credentials', [
                'ip' => $request->ip(),
                'path' => $request->path(),
                'has_app_id' => (bool) $appId,
                'has_app_secret' => (bool) $appSecret,
            ]);
            
            return response()->json([
                'message' => 'App credentials are required',
                'error' => 'missing_app_credentials',
            ], 401);
        }

        if (!AppToken::validate($appId, $appSecret)) {
            Log::warning('Invalid app credentials', [
                'ip' => $request->ip(),
                'path' => $request->path(),
                'app_id' => $appId,
            ]);
            
            return response()->json([
                'message' => 'Invalid app credentials',
                'error' => 'invalid_app_credentials',
            ], 401);
        }

        // Add app ID to the request for potential use in controllers
        $request->attributes->set('app_id', $appId);
        
        return $next($request);
    }
}