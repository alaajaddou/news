<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://analytics.ahrefs.com/analytics.js" data-key="z/TLyFKWDR1n/g0mI8lW+A" async></script>
    <meta name="ahrefs-site-verification" content="2ba4f7193c7df60fcbcaf2ed62d31dd972ed638336ef93c9a86d63b4d72b0876">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Aj Group - AI & Software Solutions')">
    <meta property="og:title" content="@yield('og_title', 'Aj Group - AI & Software Solutions')">
    <meta property="og:description" content="@yield('og_description', 'AI-first software and systems for business automation and optimization')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.svg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
    <link rel="icon" href="{{ asset('favicons/favicon.ico') }}">

    <!-- Android Chrome Icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicons/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicons/android-chrome-512x512.png') }}">


    <title>@yield('title', 'Aj Group - AI & Software Solutions')</title>

    <link name="canonical" rel="canonical" href="{{ url()->current() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('styles')
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-indigo-700 shadow-md">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a class="flex-shrink-0 flex items-center text-white font-bold text-xl" href="{{ route('home') }}" aria-label="Aj Group">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="h-14 w-10 mr-3 rounded-full bg-white object-cover">
                        <span class="sr-only">Aj Group</span>
                        <span aria-hidden="true">Group</span>
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-white hover:text-gray-200 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:flex md:items-center md:space-x-6">
                    <a href="{{ route('home') }}" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('home') ? 'bg-indigo-800' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('about') ? 'bg-indigo-800' : '' }}">About</a>
                    <a href="{{ route('services.index') }}" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('services.*') ? 'bg-indigo-800' : '' }}">Services</a>
                    <a href="{{ route('blog.index') }}" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('blog.*') ? 'bg-indigo-800' : '' }}">Blog</a>
                    <a href="{{ route('contact.index') }}" class="text-white hover:text-gray-200 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('contact.*') ? 'bg-indigo-800' : '' }}">Contact</a>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state -->
            <div id="mobile-menu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="{{ route('home') }}" class="text-white hover:bg-indigo-800 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-indigo-800' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="text-white hover:bg-indigo-800 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'bg-indigo-800' : '' }}">About</a>
                    <a href="{{ route('services.index') }}" class="text-white hover:bg-indigo-800 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('services.*') ? 'bg-indigo-800' : '' }}">Services</a>
                    <a href="{{ route('blog.index') }}" class="text-white hover:bg-indigo-800 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('blog.*') ? 'bg-indigo-800' : '' }}">Blog</a>
                    <a href="{{ route('contact.index') }}" class="text-white hover:bg-indigo-800 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact.*') ? 'bg-indigo-800' : '' }}">Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Aj Group</h3>
                    <p class="mb-4">AI & Software Solutions</p>
                    <div class="flex space-x-4">
                        <a href="https://www.linkedin.com/in/alaa-m-jaddou-92310098/" target="_blank" class="text-gray-300 hover:text-white"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/alaajaddou" target="_blank" class="text-gray-300 hover:text-white"><i class="fab fa-github"></i></a>
{{--                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-youtube"></i></a>--}}
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">About</a></li>
                        <li><a href="{{ route('blog.index') }}" class="text-gray-300 hover:text-white">Blog</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-gray-300 hover:text-white">Services</a></li>
                        <li><a href="{{ route('contact.index') }}" class="text-gray-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li><i class="fas fa-envelope mr-2"></i> <a href="mailto:info@aj-group.ps">info@aj-group.ps</a></li>
                        <li><i class="fab fa-whatsapp mr-2"></i> <a href="https://wa.me/972569410116" class="hover:text-white">+972569410116</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p>&copy; {{ date('Y') }} Aj Group. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile menu toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>

    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.site_key') }}"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // reCAPTCHA
        if (typeof grecaptcha !== 'undefined' && document.getElementById('recaptcha_token')) {
          grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('captcha.site_key') }}', { action: 'contact' }).then(function(token) {
              document.getElementById('recaptcha_token').value = token;
            });
          });
        }
      });
    </script>

    @yield('scripts')
</body>
</html>
