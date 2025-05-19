@extends('layouts.app')

@section('title', $service->title . ' - Alaa M. Jaddou')
@section('meta_description', $service->description)
@section('og_title', $service->title . ' - Alaa M. Jaddou')
@section('og_description', $service->description)

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1>{{ $service->title }}</h1>
            <p>{{ $service->description }}</p>
        </div>
    </section>

    <!-- Service Details Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    @if($service->image)
                        <img src="{{ $service->image }}" alt="{{ $service->title }}" class="img-fluid rounded shadow mb-4">
                    @endif

                    <div class="mb-5">
                        {!! Str::markdown($service->long_description ?? 'Detailed information about this service will be available soon.') !!}
                    </div>

                    <!-- CTA -->
                    <div class="bg-light p-4 rounded mb-5">
                        <h3>Interested in this service?</h3>
                        <p>Contact me to discuss how I can help with your specific needs.</p>
                        <a href="{{ route('contact.index') }}?service={{ $service->title }}" class="btn btn-primary">Get in Touch</a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Other Services -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Other Services</h5>
                        </div>
                        <div class="card-body">
                            @if($otherServices->count() > 0)
                                <ul class="list-group list-group-flush">
                                    @foreach($otherServices as $otherService)
                                        <li class="list-group-item">
                                            <a href="{{ route('services.show', $otherService->slug) }}" class="text-decoration-none">
                                                <div class="d-flex align-items-center">
                                                    @if($otherService->icon)
                                                        <i class="{{ $otherService->icon }} me-2 text-primary"></i>
                                                    @else
                                                        <i class="fas fa-check me-2 text-primary"></i>
                                                    @endif
                                                    {{ $otherService->title }}
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="mb-0">No other services available.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Contact Information</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                    <a href="mailto:info@alaajaddou.com" class="text-decoration-none">info@alaajaddou.com</a>
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-phone me-2 text-primary"></i>
                                    <a href="tel:+972569410116" class="text-decoration-none">+972569410116</a>
                                </li>
                                <li>
                                    <i class="fas fa-clock me-2 text-primary"></i>
                                    Response time: Within 24 hours
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Services -->
    <section class="section bg-light">
        <div class="container text-center">
            <a href="{{ route('services.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i> Back to All Services
            </a>
        </div>
    </section>
@endsection
