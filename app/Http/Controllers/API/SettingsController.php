<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    /**
     * Get all settings for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $user = $request->user();
        Log::info('Getting settings for user', ['user_id' => $user->id]);
        
        // Get user preferences
        $preferences = $user->preference ?? UserPreference::create(['user_id' => $user->id]);
        
        // Get public system settings
        $systemSettings = Setting::where('is_public', true)->get()->groupBy('category');
        
        return response()->json([
            'preferences' => $preferences->preferences,
            'system_settings' => $systemSettings,
        ]);
    }
    
    /**
     * Get settings by category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCategory(Request $request, $category)
    {
        $user = $request->user();
        Log::info('Getting settings by category', ['user_id' => $user->id, 'category' => $category]);
        
        $settings = Setting::where('category', $category)
            ->where('is_public', true)
            ->get();
        
        return response()->json([
            'category' => $category,
            'settings' => $settings,
        ]);
    }
    
    /**
     * Update user preferences.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePreferences(Request $request)
    {
        $user = $request->user();
        Log::info('Updating preferences for user', ['user_id' => $user->id]);
        
        $validator = Validator::make($request->all(), [
            'preferences' => 'required|array',
        ]);
        
        if ($validator->fails()) {
            Log::warning('Preference update validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        try {
            $preferences = $user->preference ?? UserPreference::create(['user_id' => $user->id]);
            
            // Update specific preferences
            foreach ($request->preferences as $key => $value) {
                $preferences->setPreference($key, $value);
            }
            
            $preferences->save();
            
            Log::info('Preferences updated successfully', ['user_id' => $user->id]);
            
            return response()->json([
                'message' => 'Preferences updated successfully',
                'preferences' => $preferences->preferences,
            ]);
        } catch (\Exception $e) {
            Log::error('Preference update failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return response()->json([
                'message' => 'Failed to update preferences',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    /**
     * Reset user preferences to default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPreferences(Request $request)
    {
        $user = $request->user();
        Log::info('Resetting preferences for user', ['user_id' => $user->id]);
        
        try {
            $preferences = $user->preference ?? UserPreference::create(['user_id' => $user->id]);
            $preferences->preferences = null;
            $preferences->save();
            
            Log::info('Preferences reset successfully', ['user_id' => $user->id]);
            
            return response()->json([
                'message' => 'Preferences reset to default',
                'preferences' => $preferences->preferences,
            ]);
        } catch (\Exception $e) {
            Log::error('Preference reset failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return response()->json([
                'message' => 'Failed to reset preferences',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}