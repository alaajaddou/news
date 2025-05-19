@extends('layouts.app')

@section('title', $post->title . ' - Alaa M. Jaddou')
@section('meta_description', $post->excerpt ?? Str::limit(strip_tags($post->content), 160))
@section('og_title', $post->title . ' - Alaa M. Jaddou')
@section('og_description', $post->excerpt ?? Str::limit(strip_tags($post->content), 160))
@section('og_image', $post->featured_image ?? asset('images/alaa-m-jaddou-logo.png'))

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/github.min.css">
    <style>
        .post-content {
            line-height: 1.8;
        }

        .post-content h2 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .post-content h3 {
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .post-content p {
            margin-bottom: 1.25rem;
        }

        .post-content ul, .post-content ol {
            margin-bottom: 1.25rem;
            padding-left: 1.5rem;
        }

        .post-content li {
            margin-bottom: 0.5rem;
        }

        .post-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1.5rem 0;
        }

        .post-content pre {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            overflow-x: auto;
        }

        .post-content code {
            font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
            font-size: 0.9em;
        }

        .post-content blockquote {
            border-left: 4px solid #e74c3c;
            padding-left: 1rem;
            margin-left: 0;
            margin-right: 0;
            font-style: italic;
            color: #4b5563;
        }

        .social-share a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            margin-right: 0.5rem;
            transition: transform 0.3s;
        }

        .social-share a:hover {
            transform: translateY(-3px);
        }

        .twitter-bg {
            background-color: #1DA1F2;
        }

        .facebook-bg {
            background-color: #4267B2;
        }

        .linkedin-bg {
            background-color: #0077B5;
        }
    </style>
@endsection

@section('content')
    <!-- Post Header -->
    <header class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="mb-4">
                        @foreach($post->categories as $category)
                            <a href="{{ route('blog.category', $category->slug) }}" class="badge bg-primary text-decoration-none me-1">{{ $category->name }}</a>
                        @endforeach
                    </div>
                    <h1 class="fw-bold mb-3">{{ $post->title }}</h1>
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <p class="text-muted mb-0">
                                @if($post->author_name)
                                    By {{ $post->author_name }} • 
                                @endif
                                {{ $post->published_at->format('F d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if($post->featured_image)
                        <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="img-fluid rounded shadow mb-5">
                    @endif

                    <div class="post-content mb-5">
                        {!! Str::markdown($post->content) !!}
                    </div>

                    <!-- Tags -->
                    @if($post->tags->count() > 0)
                        <div class="mb-5">
                            <h5 class="mb-3">Tags</h5>
                            @foreach($post->tags as $tag)
                                <a href="{{ route('blog.tag', $tag->slug) }}" class="badge bg-secondary text-decoration-none me-1">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    @endif

                    <!-- Social Share -->
                    <div class="mb-5">
                        <h5 class="mb-3">Share This Post</h5>
                        <div class="social-share">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" class="twitter-bg">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="facebook-bg">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="linkedin-bg">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    @if($relatedPosts->count() > 0)
                        <div class="mb-5">
                            <h3 class="mb-4">Related Posts</h3>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100">
                                            @if($relatedPost->featured_image)
                                                <img src="{{ $relatedPost->featured_image }}" class="card-img-top" alt="{{ $relatedPost->title }}">
                                            @else
                                                <img src="https://via.placeholder.com/300x200?text=Alaa+M.+Jaddou" class="card-img-top" alt="{{ $relatedPost->title }}">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $relatedPost->title }}</h5>
                                                <a href="{{ route('blog.show', $relatedPost->slug) }}" class="btn btn-sm btn-primary">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Back to Blog -->
                    <div class="text-center">
                        <a href="{{ route('blog.index') }}" class="btn btn-primary">Back to Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((el) => {
                hljs.highlightElement(el);
            });
        });
    </script>
@endsection
