@extends('layouts.app')

@section('title', 'Contact - Alaa M. Jaddou - Senior Software Engineer')
@section('meta_description', 'Get in touch with Alaa M. Jaddou for frontend development, ERP solutions, or any questions about software engineering and technology.')
@section('og_title', 'Contact - Alaa M. Jaddou - Senior Software Engineer')
@section('og_description', 'Get in touch with Alaa M. Jaddou for frontend development, ERP solutions, or any questions about software engineering and technology.')

@section('content')
    <div class="py-12">
        <!-- Hero Section -->
        <section class="py-16 bg-indigo-700 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl font-bold mb-4">Contact Me</h1>
                <p class="text-xl">Let's discuss how I can help with your software development needs</p>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center mb-12">
                <div class="w-full lg:w-2/3 text-center">
                    <p class="text-lg text-gray-700">I'm always excited to connect with potential clients, fellow developers, or anyone interested in discussing software engineering and technology. Fill out the form below, and I'll get back to you as soon as possible.</p>
                </div>
            </div>

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

                    <!-- Contact Form -->
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="p-8">
                            <h3 class="text-2xl font-bold mb-6 text-gray-800">Send Me a Message</h3>
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf

                                <div class="mb-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                    <input type="text" class="w-full px-4 py-3 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" class="w-full px-4 py-3 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                    <textarea class="w-full px-4 py-3 border @error('message') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="message" name="message" rows="6" required>{{ old('message') ?? request()->get('service') ? 'I\'m interested in your ' . request()->get('service') . ' service.' : '' }}</textarea>
                                    @error('message')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    @error('g-recaptcha-response')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <input type="hidden" name="g-recaptcha-response" id="recaptcha_token">

                                <div class="text-center">
                                    <button type="submit" class="inline-block py-3 px-8 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium shadow-md transition duration-300">Send Message</button>
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
                                        <i class="fab fa-twitter text-indigo-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold mb-1 text-gray-700">Twitter</h4>
                                    <p class="m-0">
                                        <a href="#" class="text-gray-700 hover:text-indigo-600">@AlaaJaddou</a>
                                    </p>
                                </div>
                            </div>

                            <div class="flex mb-6">
                                <div class="mr-4">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fab fa-linkedin text-indigo-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold mb-1 text-gray-700">LinkedIn</h4>
                                    <p class="m-0">
                                        <a href="#" class="text-gray-700 hover:text-indigo-600">linkedin.com/in/alaajaddou</a>
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
                                        <a href="#" class="text-gray-700 hover:text-indigo-600">github.com/alaajaddou</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
