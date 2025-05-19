<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        Log::info('User registration attempt', ['email' => $request->email]);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            Log::warning('User registration validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Create empty profile and preferences
            UserProfile::create(['user_id' => $user->id]);
            UserPreference::create(['user_id' => $user->id]);

            $token = $user->createToken('auth_token')->accessToken;

            Log::info('User registered successfully', ['user_id' => $user->id]);
            
            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 201);
        } catch (\Exception $e) {
            Log::error('User registration failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'message' => 'Registration failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Login user and create token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        Log::info('User login attempt', ['email' => $request->email]);
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            Log::warning('User login validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            Log::warning('User login failed - invalid credentials', ['email' => $request->email]);
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = $request->user();
        $token = $user->createToken('auth_token')->accessToken;

        Log::info('User logged in successfully', ['user_id' => $user->id]);
        
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * Refresh the user's token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken(Request $request)
    {
        $user = $request->user();
        
        Log::info('Token refresh attempt', ['user_id' => $user->id]);
        
        // Revoke all of the user's tokens
        $user->tokens->each(function ($token) {
            $token->revoke();
        });
        
        $token = $user->createToken('auth_token')->accessToken;
        
        Log::info('Token refreshed successfully', ['user_id' => $user->id]);
        
        return response()->json([
            'message' => 'Token refreshed successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * Verify the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request)
    {
        $user = $request->user();
        
        Log::info('User verification', ['user_id' => $user->id]);
        
        return response()->json([
            'message' => 'User is authenticated',
            'user' => $user,
        ]);
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @param  string  $provider
     * @return \Illuminate\Http\JsonResponse
     */
    public function socialRedirect($provider)
    {
        Log::info('Social login redirect', ['provider' => $provider]);
        
        try {
            $url = Socialite::driver($provider)->stateless()->redirect()->getTargetUrl();
            
            return response()->json([
                'url' => $url,
            ]);
        } catch (\Exception $e) {
            Log::error('Social login redirect failed', [
                'provider' => $provider,
                'error' => $e->getMessage(),
            ]);
            
            return response()->json([
                'message' => 'Social login failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle the provider callback and login or register the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $provider
     * @return \Illuminate\Http\JsonResponse
     */
    public function socialCallback(Request $request, $provider)
    {
        Log::info('Social login callback', ['provider' => $provider]);
        
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();
            
            $user = User::where('email', $socialUser->getEmail())->first();
            
            if (!$user) {
                // Register new user
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => Hash::make(uniqid()),
                ]);
                
                // Create profile with social data
                $profile = new UserProfile([
                    'user_id' => $user->id,
                    'full_name' => $socialUser->getName(),
                    'avatar' => $socialUser->getAvatar(),
                ]);
                $profile->save();
                
                // Create empty preferences
                UserPreference::create(['user_id' => $user->id]);
                
                Log::info('User registered via social login', [
                    'user_id' => $user->id,
                    'provider' => $provider,
                ]);
            }
            
            $token = $user->createToken('auth_token')->accessToken;
            
            Log::info('User logged in via social login', [
                'user_id' => $user->id,
                'provider' => $provider,
            ]);
            
            return response()->json([
                'message' => 'Social login successful',
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        } catch (\Exception $e) {
            Log::error('Social login callback failed', [
                'provider' => $provider,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return response()->json([
                'message' => 'Social login failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Logout the user (revoke the token).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        
        Log::info('User logout', ['user_id' => $user->id]);
        
        $request->user()->token()->revoke();
        
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}