@extends('layouts.app')

@section('title', 'Services - Alaa M. Jaddou – AI & Software Architect')
@section('meta_description', 'Professional services offered by Alaa M. Jaddou, including Frontend Development, AI Integration, ERP Solutions, and more.')
@section('og_title', 'Services - Alaa M. Jaddou – AI & Software Architect')
@section('og_description', 'Explore professional services provided by Alaa M. Jaddou, specializing in scalable software, AI projects, and ERP solutions.')

@section('content')
    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-r from-indigo-700 to-indigo-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-4">Professional Services</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto">AI-driven, scalable, and maintainable software solutions designed for businesses, startups, and innovators.</p>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-lg md:text-xl text-gray-700 max-w-4xl mx-auto">
                With over 12 years of experience in web development, ERP systems, and AI-driven solutions, I provide end-to-end services tailored to your technical and strategic needs. From building modern applications to consulting on AI integration, I help you optimize your operations and scale efficiently.
            </p>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($services->count() > 0)
                    @foreach($services as $service)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 hover:scale-105 flex flex-col">
                            <div class="p-6 text-center flex-1 flex flex-col">
                                @if($service->icon)
                                    <i class="{{ $service->icon }} text-4xl mb-4 text-indigo-600"></i>
                                @else
                                    <i class="fas fa-code text-4xl mb-4 text-indigo-600"></i>
                                @endif
                                <h3 class="text-2xl font-semibold mb-3 text-gray-800">{{ $service->title }}</h3>
                                <p class="text-gray-600 mb-6 flex-1">{{ $service->description }}</p>
                                <a href="{{ route('services.show', $service->slug) }}" class="inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-300 mt-auto">Learn More</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Default Services -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 hover:scale-105 flex flex-col">
                        <div class="p-6 text-center flex-1 flex flex-col">
                            <i class="fas fa-code text-4xl mb-4 text-indigo-600"></i>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">Frontend Development</h3>
                            <p class="text-gray-600 mb-6 flex-1">Building responsive, modern web applications with React, Vue, and Tailwind CSS. I focus on intuitive UX, performance, and maintainability.</p>
                            <a href="#" class="inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-300 mt-auto">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 hover:scale-105 flex flex-col">
                        <div class="p-6 text-center flex-1 flex flex-col">
                            <i class="fas fa-brain text-4xl mb-4 text-indigo-600"></i>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">AI Project Consultation</h3>
                            <p class="text-gray-600 mb-6 flex-1">Expert guidance on AI integration, operational efficiency, and building intelligent applications using machine learning and automation.</p>
                            <a href="#" class="inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-300 mt-auto">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 hover:scale-105 flex flex-col">
                        <div class="p-6 text-center flex-1 flex flex-col">
                            <i class="fas fa-database text-4xl mb-4 text-indigo-600"></i>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">ERP Solutions</h3>
                            <p class="text-gray-600 mb-6 flex-1">ERP design, implementation, and optimization for scalable business operations. Enhance efficiency with data-driven workflows.</p>
                            <a href="#" class="inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-300 mt-auto">Learn More</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Why Choose Me Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Why Choose Me?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-indigo-50 rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-rocket fa-3x mb-4 text-indigo-600"></i>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">AI & Innovation</h3>
                    <p class="text-gray-700">Integrating AI and automation into projects to deliver smarter, faster, and scalable solutions.</p>
                </div>
                <div class="p-6 bg-indigo-50 rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-cogs fa-3x mb-4 text-indigo-600"></i>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Operational Excellence</h3>
                    <p class="text-gray-700">Applying operational research principles to optimize workflows, reduce waste, and improve efficiency.</p>
                </div>
                <div class="p-6 bg-indigo-50 rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-network-wired fa-3x mb-4 text-indigo-600"></i>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">End-to-End Solutions</h3>
                    <p class="text-gray-700">From ideation to deployment and support, I provide comprehensive services aligned with long-term business goals.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">My Development Process</h2>
                <p class="text-lg text-gray-700 max-w-3xl mx-auto">A structured approach combining design, AI-driven insights, and agile development to deliver measurable results.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">1</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Discovery</h3>
                    <p class="text-gray-600">Understand your goals, challenges, and operational context to craft an AI-optimized roadmap.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">2</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Planning</h3>
                    <p class="text-gray-600">Define milestones, system architecture, and automation workflows for scalable implementation.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">3</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Development</h3>
                    <p class="text-gray-600">Agile implementation of your solution, integrating frontend, ERP, and AI components efficiently.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">4</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Delivery & Support</h3>
                    <p class="text-gray-600">Deploy, monitor, and optimize your solution with long-term support and AI-driven insights.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-indigo-700 to-indigo-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold mb-4">Ready to Build Smarter Solutions?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Let’s discuss how I can help you create scalable, AI-driven software that elevates your business.</p>
            <a href="{{ route('contact.index') }}" class="inline-block py-4 px-10 bg-white text-indigo-700 hover:bg-gray-100 rounded-lg text-lg font-semibold shadow-md transition duration-300">Get in Touch</a>
        </div>
    </section>
@endsection
