@extends('layouts.app')

@section('title', 'Contact - Aj Group')
@section('meta_description', 'Contact Aj Group for AI integration, software architecture, ERP solutions, and consulting.')
@section('og_title', 'Contact - Aj Group')
@section('og_description', 'Reach out to Aj Group for AI-first software solutions, integrations, and consulting services.')

@section('content')
    <!-- Hero Section -->
    <section class="text-white" style="background-color:#4338ca; background-image: linear-gradient(90deg,#4f46e5 0%,#4338ca 100%); padding-top:7rem; padding-bottom:7rem;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold mb-6">Let's Connect</h1>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-6">Ready to discuss your next project, explore collaboration opportunities, or share ideas about software engineering and AI?</p>
            <p class="text-md text-indigo-200">I'm always excited to connect with potential clients, fellow developers, and innovators. Reach out and let's explore how we can work together to build something impactful.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-2/3 px-4">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded relative mb-6" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-bs-dismiss="alert" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif

                    <!-- Marketing / Value Props -->
                    <div class="bg-gradient-to-r from-indigo-50 to-white border-l-4 border-indigo-600 p-6 rounded-lg shadow-sm mb-6">
                        <h3 class="text-xl font-bold text-indigo-700 mb-2">How I Help</h3>
                        <p class="text-gray-700 mb-4">I design AI-first, maintainable software that scales — from prototypes to enterprise systems. If you need faster time-to-value, robust integrations, or intelligent automation, let's talk.</p>
                        <ul class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <li class="bg-white rounded-lg p-3 border border-gray-100">
                                <p class="text-sm font-semibold text-gray-800">AI-first Solutions</p>
                                <p class="text-xs text-gray-600">Integrate ML and automation into workflows.</p>
                            </li>
                            <li class="bg-white rounded-lg p-3 border border-gray-100">
                                <p class="text-sm font-semibold text-gray-800">Scalable Architecture</p>
                                <p class="text-xs text-gray-600">Systems that grow with your business.</p>
                            </li>
                            <li class="bg-white rounded-lg p-3 border border-gray-100">
                                <p class="text-sm font-semibold text-gray-800">Fast Time-to-Value</p>
                                <p class="text-xs text-gray-600">Rapid prototypes into production-ready apps.</p>
                            </li>
                        </ul>
                        <div class="mt-4">
                            <a href="{{ route('services.index') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-indigo-700 transition">See Services</a>
                            <a href="#contact-form" class="ml-3 inline-block bg-white text-indigo-700 px-4 py-2 rounded-lg border border-indigo-100 hover:bg-gray-50 transition">Contact</a>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="p-8">
                            <h3 class="text-2xl font-bold mb-6 text-gray-800">Send Me a Message</h3>
                            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" id="contact-form">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                            class="block w-full rounded-lg border bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-200' }}">
                                        @error('name')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                            class="block w-full rounded-lg border bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-200' }}">
                                        @error('email')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                    <textarea id="message" name="message" rows="6" required
                                        class="block w-full rounded-lg border bg-gray-50 px-4 py-3 text-gray-900 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 {{ $errors->has('message') ? 'border-red-500' : 'border-gray-200' }}">{{ old('message') ?: (request()->get('service') ? 'I\'m interested in your ' . e(request()->get('service')) . ' service.' : '') }}</textarea>
                                    @error('message')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    @error('g-recaptcha-response')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <input type="hidden" name="g-recaptcha-response" id="recaptcha_token">

                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                    <div class="text-sm text-gray-600">I usually reply within 24 hours.</div>
                                    <div class="text-center md:text-right">
                                        <button type="submit" class="w-full md:w-auto inline-block py-3 px-8 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium shadow-md transition duration-300">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/3 px-4">
                    <!-- Contact Information -->
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 mb-8">
                        <div class="p-8">
                            <h3 class="text-xl font-bold mb-6 text-gray-800">Contact Information</h3>

                            <div class="flex mb-6">
                                <div class="mr-4">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-envelope text-indigo-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold mb-1 text-gray-700">Email</h4>
                                    <p class="m-0">
                                        <a href="mailto:info@aj-group.ps" class="text-gray-700 hover:text-indigo-600">info@aj-group.ps</a>
                                    </p>
                                </div>
                            </div>

                            <div class="flex mb-6">
                                <div class="mr-4">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-phone text-indigo-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold mb-1 text-gray-700">Phone</h4>
                                    <p class="m-0">
                                        <a href="tel:+972569410116" class="text-gray-700 hover:text-indigo-600">+972569410116</a>
                                    </p>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="mr-4">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-clock text-indigo-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold mb-1 text-gray-700">Response Time</h4>
                                    <p class="m-0 text-gray-700">Usually within 24 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="p-8">
                            <h3 class="text-xl font-bold mb-6 text-gray-800">Connect With Me</h3>

                            

                            <div class="flex mb-6">
                                <div class="mr-4">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fab fa-linkedin text-indigo-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold mb-1 text-gray-700">LinkedIn</h4>
                                    <p class="m-0">
                                        <a href="https://www.linkedin.com/in/alaa-m-jaddou-92310098/" target="_blank" class="text-gray-700 hover:text-indigo-600">linkedin.com/in/alaajaddou</a>
                                    </p>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="mr-4">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fab fa-github text-indigo-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold mb-1 text-gray-700">GitHub</h4>
                                    <p class="m-0">
                                        <a href="https://github.com/alaajaddou" target="_blank" class="text-gray-700 hover:text-indigo-600">github.com/alaajaddou</a>
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
