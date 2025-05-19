@extends('layouts.app')

@section('title', 'Alaa M. Jaddou - Your Friendly Guide to the Future of AI')
@section('meta_description', 'Alaa M. Jaddou provides expert insights, tutorials, and services in artificial intelligence, machine learning, and tech innovation.')
@section('og_title', 'Alaa M. Jaddou - Your Friendly Guide to the Future of AI')
@section('og_description', 'Expert insights, tutorials, and services in artificial intelligence, machine learning, and tech innovation.')

@section('content')
    <!-- Hero Section -->
    <section class="bg-primary text-white py-5 py-md-7 text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Your Friendly Guide to the Future of AI</h1>
            <p class="fs-4 mx-auto mb-5" style="max-width: 800px">Demystifying artificial intelligence through expert insights, practical tutorials, and innovative solutions.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('blog.index') }}" class="btn btn-light btn-lg text-primary shadow-sm">Read Blog</a>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg">Contact Me</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 py-md-7 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-6 mb-4 mb-lg-0 text-ccenter">
                    <img style="width: 200px; height: 200px; margin: auto;" src="https://media.licdn.com/dms/image/v2/C4D03AQGqXB9-GMmLqQ/profile-displayphoto-shrink_800_800/profile-displayphoto-shrink_800_800/0/1581969691126?e=1753315200&v=beta&t=sQbR6McMKTCuDj3jPJfPS2PVF6hbRablq3FHd9knOQw" alt="Alaa M. Jaddou" class="img-fluid rounded rounded-circle shadow-lg">
                </div>
                <div class="col-lg-6">
                    <h2 class="fs-1 fw-bold text-dark mb-3">Hi, I'm Alaa M. Jaddou</h2>
                    <p class="fs-4 text-secondary mb-3">I'm an AI specialist, developer, and educator passionate about making artificial intelligence accessible to everyone.</p>
                    <p class="text-secondary mb-4">With over a decade of experience in machine learning, natural language processing, and software development, I create content that bridges the gap between complex AI concepts and practical applications.</p>
                    <a href="{{ route('about') }}" class="btn btn-primary btn-lg shadow-sm">Learn More About Me</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Posts Section -->
    <section class="py-5 py-md-7">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fs-1 fw-bold text-dark mb-3">Featured Posts</h2>
                <p class="fs-4 text-secondary mx-auto" style="max-width: 800px">Explore my latest insights and tutorials on AI and technology</p>
            </div>

            <div class="row g-4">
                @if($featuredPosts->count() > 0)
                    @foreach($featuredPosts as $post)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm transition-hover">
                                @if($post->featured_image)
                                    <img src="{{ $post->featured_image }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $post->title }}">
                                @else
                                    <img src="https://via.placeholder.com/600x400?text=Alaa+M.+Jaddou" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $post->title }}">
                                @endif
                                <div class="card-body">
                                    <h3 class="card-title fs-5 fw-semibold">{{ $post->title }}</h3>
                                    <p class="card-text text-secondary">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}</p>
                                </div>
                                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                                    <small class="text-muted">{{ $post->published_at->format('M d, Y') }}</small>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-4">
                        <p class="text-secondary">No featured posts yet. Check back soon!</p>
                    </div>
                @endif
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('blog.index') }}" class="btn btn-primary btn-lg shadow-sm">View All Posts</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5 py-md-7 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fs-1 fw-bold text-dark mb-3">Services</h2>
                <p class="fs-4 text-secondary mx-auto" style="max-width: 800px">Expert AI solutions tailored to your needs</p>
            </div>

            <div class="row g-4">
                @if($featuredServices->count() > 0)
                    @foreach($featuredServices as $service)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm text-center p-4 transition-hover">
                                @if($service->icon)
                                    <div class="mb-3">
                                        <i class="{{ $service->icon }} fs-1 text-primary"></i>
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <i class="fas fa-robot fs-1 text-primary"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h3 class="card-title fs-5 fw-semibold">{{ $service->title }}</h3>
                                    <p class="card-text text-secondary">{{ $service->description }}</p>
                                </div>
                                <div class="card-footer bg-white border-0">
                                    <a href="{{ route('services.show', $service->slug) }}" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm text-center p-4 transition-hover">
                            <div class="mb-3">
                                <i class="fas fa-brain fs-1 text-primary"></i>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title fs-5 fw-semibold">AI Consulting</h3>
                                <p class="card-text text-secondary">Expert guidance on implementing AI solutions for your business needs.</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('services.index') }}" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm text-center p-4 transition-hover">
                            <div class="mb-3">
                                <i class="fas fa-code fs-1 text-primary"></i>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title fs-5 fw-semibold">Custom AI Development</h3>
                                <p class="card-text text-secondary">Tailored AI solutions designed and developed to solve your specific challenges.</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('services.index') }}" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm text-center p-4 transition-hover">
                            <div class="mb-3">
                                <i class="fas fa-chalkboard-teacher fs-1 text-primary"></i>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title fs-5 fw-semibold">AI Training & Workshops</h3>
                                <p class="card-text text-secondary">Comprehensive training programs to help your team understand and leverage AI.</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('services.index') }}" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('services.index') }}" class="btn btn-primary btn-lg shadow-sm">View All Services</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 py-md-7 bg-primary text-white text-center">
        <div class="container">
            <h2 class="fs-1 fw-bold mb-3">Ready to Explore the Future of AI?</h2>
            <p class="fs-4 mx-auto mb-5" style="max-width: 800px">Let's connect and discuss how AI can transform your projects and ideas.</p>
            <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg px-5">Get in Touch</a>
        </div>
    </section>
@endsection
