<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index()
    {
        $posts = Post::published()
            ->with(['categories', 'tags'])
            ->latest('published_at')
            ->paginate(9);
            
        return view('blog.index', compact('posts'));
    }

    /**
     * Display the specified blog post.
     */
    public function show(Post $post)
    {
        // Ensure the post is published
        if (!$post->is_published) {
            abort(404);
        }
        
        $post->load(['categories', 'tags']);
        
        // Get related posts based on categories
        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->whereHas('categories', function ($query) use ($post) {
                $query->whereIn('categories.id', $post->categories->pluck('id'));
            })
            ->latest('published_at')
            ->take(3)
            ->get();
            
        return view('blog.show', compact('post', 'relatedPosts'));
    }

    /**
     * Display posts by category.
     */
    public function category(Category $category)
    {
        $posts = Post::published()
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category->id);
            })
            ->with(['categories', 'tags'])
            ->latest('published_at')
            ->paginate(9);
            
        return view('blog.category', compact('category', 'posts'));
    }

    /**
     * Display posts by tag.
     */
    public function tag(Tag $tag)
    {
        $posts = Post::published()
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            })
            ->with(['categories', 'tags'])
            ->latest('published_at')
            ->paginate(9);
            
        return view('blog.tag', compact('tag', 'posts'));
    }
}