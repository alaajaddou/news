@extends('layouts.app')

@section('title', $post->title . ' - Aj Group')
@section('meta_description', $post->excerpt ?? Str::limit(strip_tags($post->content), 160))
@section('og_title', $post->title . ' - Aj Group')
@section('og_description', $post->excerpt ?? Str::limit(strip_tags($post->content), 160))
@section('og_image', url('storage/' . $post->featured_image) ?? asset('images/logo.svg'))

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
        .post-header {
            text-align: center;
            background: linear-gradient(to right, #f8fafc, #e2e8f0);
            padding: 3rem 0;
            border-bottom: 1px solid #dee2e6;
        }

        .post-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .post-header .badge {
            font-size: 0.9rem;
            padding: 0.5em 0.75em;
            border-radius: 0.25rem;
        }

        .post-header .text-muted {
            font-size: 0.95rem;
            color: #6c757d !important;
        }


        @media (prefers-color-scheme: light) {
            .post-content pre {
                background-color: #1e1e1e;
                color: #dcdcdc;
            }

            .post-content code {
                color: #dcdcdc;
            }

            .post-content blockquote {
                border-left-color: #eab308; /* amber */
                color: #d1d5db; /* gray-300 */
            }
        }

    </style>
@endsection

@section('content')
    <!-- Post Header -->
    <header class="py-5 bg-light post-header">
        <article itemscope itemtype="https://schema.org/Article" class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="mb-4">
                        @foreach($post->categories as $category)
                            <a href="{{ route('blog.category', $category->slug) }}" class="badge bg-primary text-decoration-none me-1">{{ $category->name }}</a>
                        @endforeach
                    </div>

                    <h1 itemprop="headline" class="fw-bold mb-3">{{ $post->title }}</h1>
                    <meta itemprop="datePublished" content="{{ $post->published_at->toIso8601String() }}">
                    <meta itemprop="author" content="{{ $post->author_name }}">
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
        </article>
    </header>

    <!-- Post Content -->
    <section class="section post-content">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="w-full max-w-4xl">
                    @if($post->featured_image)
                        <img
                                src="{{ url('storage/' . $post->featured_image) }}"
                                alt="{{ $post->title }}"
                                class="block mx-auto my-10 max-w-full rounded-xl shadow-lg transition-transform duration-300 hover:scale-105"
                        />
                    @endif

                    <div class="prose lg:prose-xl max-w-4xl mx-auto p-6 text-gray-800">
                        {!! str($post->content)->markdown()->sanitizeHtml() !!}
                    </div>

                    <!-- Tags -->
                    @if($post->tags->count() > 0)
                        <div class="mb-5 mt-6">
                            <h5 class="text-lg font-semibold mb-3">Tags</h5>
                            <div class="flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('blog.tag', $tag->slug) }}"
                                       class="inline-block bg-gray-200 text-gray-700 text-sm px-3 py-1 rounded hover:bg-gray-300 transition">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
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
