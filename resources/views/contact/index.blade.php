@extends('layouts.app')

@section('title', 'Contact - Alaa M. Jaddou')
@section('meta_description', 'Get in touch with Alaa M. Jaddou for AI consulting, development, training, or any questions about artificial intelligence and technology.')
@section('og_title', 'Contact - Alaa M. Jaddou')
@section('og_description', 'Get in touch with Alaa M. Jaddou for AI consulting, development, training, or any questions about artificial intelligence and technology.')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1>Contact Me</h1>
            <p>Let's discuss how AI can transform your projects and ideas</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <p class="lead">I'm always excited to connect with fellow AI enthusiasts, potential clients, or anyone interested in learning more about artificial intelligence. Fill out the form below, and I'll get back to you as soon as possible.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Contact Form -->
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="6" required>{{ old('message') ?? request()->get('service') ? 'I\'m interested in your ' . request()->get('service') . ' service.' : '' }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    @error('g-recaptcha-response')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <input type="hidden" name="g-recaptcha-response" id="recaptcha_token">

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Contact Information -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h3 class="h4 mb-4">Contact Information</h3>

                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <i class="fas fa-envelope text-primary fa-fw fa-lg"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">Email</h4>
                                    <p class="mb-0">
                                        <a href="mailto:info@aj-group.ps" class="text-decoration-none">info@aj-group.ps</a>
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <i class="fas fa-phone text-primary fa-fw fa-lg"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">Phone</h4>
                                    <p class="mb-0">
                                        <a href="tel:+972569410116" class="text-decoration-none">+972569410116</a>
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-clock text-primary fa-fw fa-lg"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">Response Time</h4>
                                    <p class="mb-0">Usually within 24 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="h4 mb-4">Connect With Me</h3>

                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <i class="fab fa-twitter text-primary fa-fw fa-lg"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">Twitter</h4>
                                    <p class="mb-0">
                                        <a href="#" class="text-decoration-none">@AlaaJaddou</a>
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex mb-3">
                                <div class="me-3">
                                    <i class="fab fa-linkedin text-primary fa-fw fa-lg"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">LinkedIn</h4>
                                    <p class="mb-0">
                                        <a href="#" class="text-decoration-none">linkedin.com/in/alaajaddou</a>
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fab fa-github text-primary fa-fw fa-lg"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-1">GitHub</h4>
                                    <p class="mb-0">
                                        <a href="#" class="text-decoration-none">github.com/alaajaddou</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
