<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PlansController extends Controller
{
    /**
     * Display a listing of the plans.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        Log::info('Fetching all plans');
        
        $plans = Plan::active()->ordered()->get();
        
        return response()->json([
            'plans' => $plans,
        ]);
    }

    /**
     * Display the specified plan.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug)
    {
        Log::info('Fetching plan details', ['slug' => $slug]);
        
        $plan = Plan::where('slug', $slug)->where('is_active', true)->first();
        
        if (!$plan) {
            Log::warning('Plan not found', ['slug' => $slug]);
            return response()->json([
                'message' => 'Plan not found',
            ], 404);
        }
        
        return response()->json([
            'plan' => $plan,
        ]);
    }

    /**
     * Store a newly created plan in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Log::info('Creating new plan');
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'billing_cycle' => 'required|string|in:monthly,yearly,one-time',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ]);
        
        if ($validator->fails()) {
            Log::warning('Plan creation validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        try {
            $plan = new Plan($request->all());
            $plan->slug = Str::slug($request->title);
            $plan->save();
            
            Log::info('Plan created successfully', ['plan_id' => $plan->id]);
            
            return response()->json([
                'message' => 'Plan created successfully',
                'plan' => $plan,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Plan creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return response()->json([
                'message' => 'Failed to create plan',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified plan in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        Log::info('Updating plan', ['plan_id' => $id]);
        
        $plan = Plan::find($id);
        
        if (!$plan) {
            Log::warning('Plan not found for update', ['plan_id' => $id]);
            return response()->json([
                'message' => 'Plan not found',
            ], 404);
        }
        
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'price' => 'numeric|min:0',
            'currency' => 'string|size:3',
            'billing_cycle' => 'string|in:monthly,yearly,one-time',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ]);
        
        if ($validator->fails()) {
            Log::warning('Plan update validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        try {
            $plan->fill($request->all());
            $plan->save();
            
            Log::info('Plan updated successfully', ['plan_id' => $plan->id]);
            
            return response()->json([
                'message' => 'Plan updated successfully',
                'plan' => $plan,
            ]);
        } catch (\Exception $e) {
            Log::error('Plan update failed', [
                'plan_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return response()->json([
                'message' => 'Failed to update plan',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified plan from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Log::info('Deleting plan', ['plan_id' => $id]);
        
        $plan = Plan::find($id);
        
        if (!$plan) {
            Log::warning('Plan not found for deletion', ['plan_id' => $id]);
            return response()->json([
                'message' => 'Plan not found',
            ], 404);
        }
        
        try {
            $plan->delete();
            
            Log::info('Plan deleted successfully', ['plan_id' => $id]);
            
            return response()->json([
                'message' => 'Plan deleted successfully',
            ]);
        } catch (\Exception $e) {
            Log::error('Plan deletion failed', [
                'plan_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return response()->json([
                'message' => 'Failed to delete plan',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Search for plans.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        Log::info('Searching plans', ['query' => $query]);
        
        $plans = Plan::active()
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->ordered()
            ->get();
        
        return response()->json([
            'query' => $query,
            'plans' => $plans,
        ]);
    }
}