<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Get featured posts for the homepage
        $featuredPosts = Post::published()
            ->featured()
            ->with(['categories', 'tags'])
            ->latest('published_at')
            ->take(3)
            ->get();
            
        // Get featured services for the homepage
        $featuredServices = Service::where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('order')
            ->take(3)
            ->get();
            
        return view('home', compact('featuredPosts', 'featuredServices'));
    }
}