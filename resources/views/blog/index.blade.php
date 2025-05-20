@extends('layouts.app')

@section('title', 'Blog - Alaa M. Jaddou')
@section('meta_description', 'Explore articles, tutorials, and insights about artificial intelligence, machine learning, and technology from Alaa M. Jaddou.')
@section('og_title', 'Blog - Alaa M. Jaddou')
@section('og_description', 'Explore articles, tutorials, and insights about artificial intelligence, machine learning, and technology.')

@section('content')
    <!-- Hero Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1>Blog</h1>
            <p>Insights, tutorials, and thoughts on AI and technology</p>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-2/3 px-4">
                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <div class="bg-white rounded-lg shadow-md mb-8 overflow-hidden">
                                <div class="flex flex-wrap">
                                    <div class="w-full md:w-1/3">
                                        @if($post->featured_image)
                                            <a href="{{ route('blog.show', $post) }}">
                                                <img src="{{ $post->featured_image }}" class="w-full h-full object-cover rounded-tl-lg md:rounded-bl-lg" alt="{{ $post->title }}">
                                            </a>
                                        @else
                                            <a href="{{ route('blog.show', $post) }}">
                                                <img src="https://via.placeholder.com/300x200?text=Alaa+M.+Jaddou" class="w-full h-full object-cover rounded-tl-lg md:rounded-bl-lg" alt="{{ $post->title }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="w-full md:w-2/3">
                                        <div class="p-6">
                                            <h5 class="text-xl font-semibold mb-2">{{ $post->title }}</h5>
                                            <p class="mb-4">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}</p>

                                            <div class="mb-4">
                                                @foreach($post->categories as $category)
                                                    <a href="{{ route('blog.category', $category) }}" class="inline-block bg-amber-500 text-white text-xs px-2 py-1 rounded mr-1 mb-1">{{ $category->name }}</a>
                                                @endforeach

                                                @foreach($post->tags as $tag)
                                                    <a href="{{ route('blog.tag', $tag) }}" class="inline-block bg-gray-500 text-white text-xs px-2 py-1 rounded mr-1 mb-1">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>

                                            <div class="flex justify-between items-center">
                                                <small class="text-gray-500">{{ $post->published_at->format('M d, Y') }}</small>
                                                <a href="{{ route('blog.show', $post) }}" class="inline-block py-1 px-3 bg-amber-500 hover:bg-amber-600 text-white text-sm rounded">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="flex justify-center mt-8">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <h3 class="text-xl font-semibold mb-2">No posts found</h3>
                            <p>Check back soon for new content!</p>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="w-full lg:w-1/3 px-4">
                    <div class="bg-white rounded-lg shadow-md mb-8">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h5 class="font-semibold text-lg m-0">Categories</h5>
                        </div>
                        <div class="p-6">
                            @php
                                $categories = \App\Models\Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
                            @endphp

                            @if($categories->count() > 0)
                                <ul class="divide-y divide-gray-200">
                                    @foreach($categories as $category)
                                        <li class="py-3 flex justify-between items-center">
                                            <a href="{{ route('blog.category', $category) }}" class="text-gray-700 hover:text-amber-500">{{ $category->name }}</a>
                                            <span class="bg-amber-500 text-white text-xs px-2 py-1 rounded-full">{{ $category->posts_count }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="m-0">No categories yet.</p>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h5 class="font-semibold text-lg m-0">Popular Tags</h5>
                        </div>
                        <div class="p-6">
                            @php
                                $tags = \App\Models\Tag::withCount('posts')->orderBy('posts_count', 'desc')->take(20)->get();
                            @endphp

                            @if($tags->count() > 0)
                                <div class="flex flex-wrap gap-2">
                                    @foreach($tags as $tag)
                                        <a href="{{ route('blog.tag', $tag) }}" class="inline-block bg-gray-500 text-white text-xs px-2 py-1 rounded hover:bg-gray-600">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            @else
                                <p class="m-0">No tags yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
