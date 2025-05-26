@extends('layouts.app')

@section('title', $category->name . ' - Blog - Alaa M. Jaddou')
@section('meta_description', 'Explore articles, tutorials, and insights about ' . $category->name . ' from Alaa M. Jaddou.')
@section('og_title', $category->name . ' - Blog - Alaa M. Jaddou')
@section('og_description', 'Explore articles, tutorials, and insights about ' . $category->name . ' from Alaa M. Jaddou.')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1>{{ $category->name }}</h1>
            <p>{{ $category->description ?? 'Explore articles and insights in this category' }}</p>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <div class="card mb-4">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        @if($post->featured_image)
                                            <a href="{{ route('blog.show', $post->slug) }}">
                                                <img src="{{ url('storage/' . $post->featured_image) }}" class="img-fluid rounded-start w-100 object-fit-cover" alt="{{ $post->title }}">
                                            </a>
                                        @else
                                            <a href="{{ route('blog.show', $post->slug) }}">
                                                <img src="https://via.placeholder.com/300x200?text=Alaa+M.+Jaddou" class="img-fluid rounded-start w-100 object-fit-cover" alt="{{ $post->title }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <p class="card-text">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}</p>

                                            <div class="mb-2">
                                                @foreach($post->categories as $cat)
                                                    <a href="{{ route('blog.category', $cat->slug) }}" class="badge bg-primary text-decoration-none me-1">{{ $cat->name }}</a>
                                                @endforeach

                                                @foreach($post->tags as $tag)
                                                    <a href="{{ route('blog.tag', $tag->slug) }}" class="badge bg-secondary text-decoration-none me-1">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">{{ $post->published_at->format('M d, Y') }}</small>
                                                <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-5">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <h3>No posts found in this category</h3>
                            <p>Check back soon for new content!</p>
                            <a href="{{ route('blog.index') }}" class="btn btn-primary mt-3">Back to Blog</a>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Categories</h5>
                        </div>
                        <div class="card-body">
                            @php
                                $categories = \App\Models\Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
                            @endphp

                            @if($categories->count() > 0)
                                <ul class="list-group list-group-flush">
                                    @foreach($categories as $cat)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a href="{{ route('blog.category', $cat->slug) }}" class="text-decoration-none">{{ $cat->name }}</a>
                                            <span class="badge bg-primary rounded-pill">{{ $cat->posts_count }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="mb-0">No categories yet.</p>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Popular Tags</h5>
                        </div>
                        <div class="card-body">
                            @php
                                $tags = \App\Models\Tag::withCount('posts')->orderBy('posts_count', 'desc')->take(20)->get();
                            @endphp

                            @if($tags->count() > 0)
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($tags as $tag)
                                        <a href="{{ route('blog.tag', $tag->slug) }}" class="badge bg-secondary text-decoration-none">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            @else
                                <p class="mb-0">No tags yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
