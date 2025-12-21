@extends('layouts.app')

@section('title', 'Alaa M. Jaddou – AI & Software Architect')
@section('meta_description', 'Alaa M. Jaddou is a Senior Software Engineer and AI-first architect, specializing in frontend development, ERP systems, and AI-powered solutions.')
@section('og_title', 'Alaa M. Jaddou – AI & Software Architect')
@section('og_description', 'Senior Software Engineer and AI-first architect specializing in frontend development, ERP systems, and AI-powered solutions.')

@section('content')
    <!-- Hero Section -->
    <section class="bg-indigo-700 text-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Alaa M. Jaddou – Architecting AI-Driven Software Ecosystems</h1>
            <p class="text-xl md:text-2xl mb-2">Current Career Path: Frontend Software Engineer</p>
            <p class="text-lg md:text-xl mb-8 text-indigo-200">Aiming toward AI + Software Architect, building scalable, high-impact solutions</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('services.index') }}" class="bg-white text-indigo-700 hover:bg-gray-100 px-6 py-3 rounded-lg font-medium shadow-md transition duration-300">My Services</a>
                <a href="{{ route('contact.index') }}" class="bg-transparent hover:bg-indigo-600 border-2 border-white px-6 py-3 rounded-lg font-medium transition duration-300">Contact Me</a>
            </div>
            <div class="mt-8">
                <img src="https://nfs.aj-group.ps/index.php/core/preview?fileId=1972&x=1920&y=1080&a=true&etag=87127e0ea5c6e7748151078f8b82afc6"
                     alt="Alaa M. Jaddou" class="mx-auto w-64 h-64 md:w-72 md:h-72 rounded-full shadow-xl object-cover">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white border-t border-indigo-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/3 mb-8 md:mb-0 flex justify-center">
                    <img src="https://nfs.aj-group.ps/index.php/core/preview?fileId=1972&x=1920&y=1080&a=true&etag=87127e0ea5c6e7748151078f8b82afc6"
                         alt="Alaa M. Jaddou" class="w-48 h-48 rounded-full shadow-xl object-cover">
                </div>
                <div class="md:w-2/3 md:pl-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Hi, I'm Alaa M. Jaddou</h2>
                    <div class="space-y-4 text-gray-600">
                        <p class="text-lg">With over <span class="font-semibold">12+ years</span> of experience developing websites and CMSs, I bring a wealth of knowledge to every project.</p>
                        <p class="text-lg">I've spent <span class="font-semibold">6 years</span> working with ERP systems and have nearly <span class="font-semibold">2 years</span> of experience in graphic design.</p>
                        <p class="text-lg">Recently, I've been involved in AI-powered projects including Planivator and Opti AI Solutions, focusing on Operations Research and intelligent automation.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('about') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium shadow-md transition duration-300">Learn More About Me</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-gray-50 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">My Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Professional services tailored to your needs in AI, software, and operational efficiency</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($featuredServices->count() > 0)
                    @foreach($featuredServices as $service)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                            <div class="p-6 text-center">
                                @if($service->icon)
                                    <div class="mb-4">
                                        <i class="{{ $service->icon }} text-4xl text-indigo-600"></i>
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <i class="fas fa-code text-4xl text-indigo-600"></i>
                                    </div>
                                @endif
                                <h3 class="text-xl font-semibold mb-3">{{ $service->title }}</h3>
                                <p class="text-gray-600 mb-6">{{ $service->description }}</p>
                                <a href="{{ route('services.show', $service->slug) }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Default Services -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="p-6 text-center">
                            <div class="mb-4"><i class="fas fa-code text-4xl text-indigo-600"></i></div>
                            <h3 class="text-xl font-semibold mb-3">Frontend Development</h3>
                            <p class="text-gray-600 mb-6">Modern, responsive web applications built with the latest frontend technologies.</p>
                            <a href="{{ route('services.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="p-6 text-center">
                            <div class="mb-4"><i class="fas fa-brain text-4xl text-indigo-600"></i></div>
                            <h3 class="text-xl font-semibold mb-3">AI Project Consultation</h3>
                            <p class="text-gray-600 mb-6">Expert guidance on implementing AI solutions for operational and business growth.</p>
                            <a href="{{ route('services.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="p-6 text-center">
                            <div class="mb-4"><i class="fas fa-database text-4xl text-indigo-600"></i></div>
                            <h3 class="text-xl font-semibold mb-3">ERP Solutions</h3>
                            <p class="text-gray-600 mb-6">Comprehensive ERP implementation and AI-optimized business solutions.</p>
                            <a href="{{ route('services.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('services.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium shadow-md transition duration-300">View All Services</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-700 text-white text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-4">Ready to Work Together?</h2>
            <p class="text-xl max-w-3xl mx-auto mb-8">Let's discuss how I can help bring your ideas to life with modern AI-first software solutions.</p>
            <a href="{{ route('contact.index') }}" class="inline-block bg-white text-indigo-700 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium shadow-md transition duration-300">Get in Touch</a>
        </div>
    </section>
@endsection
