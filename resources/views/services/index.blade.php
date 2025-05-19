@extends('layouts.app')

@section('title', 'Services - Alaa M. Jaddou')
@section('meta_description', 'Explore AI-related services offered by Alaa M. Jaddou including AI consulting, custom development, training, and more.')
@section('og_title', 'Services - Alaa M. Jaddou')
@section('og_description', 'Explore AI-related services offered by Alaa M. Jaddou including AI consulting, custom development, training, and more.')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1>Services</h1>
            <p>Expert AI solutions tailored to your needs</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <p class="lead">I offer a range of AI-related services to help individuals and businesses leverage the power of artificial intelligence. Whether you're looking to implement AI in your business, need custom development, or want to learn more about AI, I'm here to help.</p>
                </div>
            </div>

            <div class="row">
                @if($services->count() > 0)
                    @foreach($services as $service)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    @if($service->icon)
                                        <i class="{{ $service->icon }} fa-3x mb-3 text-primary"></i>
                                    @else
                                        <i class="fas fa-robot fa-3x mb-3 text-primary"></i>
                                    @endif
                                    <h3 class="card-title h4">{{ $service->title }}</h3>
                                    <p class="card-text">{{ $service->description }}</p>
                                    <a href="{{ route('services.show', $service->slug) }}" class="btn btn-primary">Learn More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Default services if none in database -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-brain fa-3x mb-3 text-primary"></i>
                                <h3 class="card-title h4">AI Consulting</h3>
                                <p class="card-text">Expert guidance on implementing AI solutions for your business needs. I'll help you identify opportunities, evaluate technologies, and develop a strategic roadmap.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-code fa-3x mb-3 text-primary"></i>
                                <h3 class="card-title h4">Custom AI Development</h3>
                                <p class="card-text">Tailored AI solutions designed and developed to solve your specific challenges. From machine learning models to natural language processing systems.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-chalkboard-teacher fa-3x mb-3 text-primary"></i>
                                <h3 class="card-title h4">AI Training & Workshops</h3>
                                <p class="card-text">Comprehensive training programs to help your team understand and leverage AI. Customized workshops for technical and non-technical audiences.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-search fa-3x mb-3 text-primary"></i>
                                <h3 class="card-title h4">AI Research</h3>
                                <p class="card-text">In-depth research on AI topics relevant to your business. Stay ahead of the curve with insights on emerging technologies and trends.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-robot fa-3x mb-3 text-primary"></i>
                                <h3 class="card-title h4">Chatbot Development</h3>
                                <p class="card-text">Custom chatbots and conversational AI solutions to enhance customer service, automate tasks, and improve user experience.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-chart-line fa-3x mb-3 text-primary"></i>
                                <h3 class="card-title h4">AI-Powered Analytics</h3>
                                <p class="card-text">Advanced analytics solutions that leverage machine learning to extract insights from your data and drive better business decisions.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-4">Ready to Get Started?</h2>
                    <p class="lead mb-4">Let's discuss how AI can transform your business or project. Contact me for a free consultation.</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>
@endsection
