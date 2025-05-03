<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        Log::info('here in index');
        // Get the number of items per page from the query parameter, default to 20 if not provided
        $perPage = request()->query('per_page', 20);

        // Validate that 'per_page' is an integer and within a reasonable range
        $perPage = filter_var($perPage, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 100]]) ?: 20;

        // Perform the query with dynamic pagination
        $posts = Post::orderBy('published_at', 'desc')->paginate($perPage);

        return response()->json([
            'status' => true,
            'message' => 'Posts fetched successfully.',
            'data' => $posts->items(),
            'pagination' => [
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'per_page' => $posts->perPage(),
                'total' => $posts->total(),
            ]
        ]);
    }
}
