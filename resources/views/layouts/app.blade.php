<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://analytics.ahrefs.com/analytics.js" data-key="z/TLyFKWDR1n/g0mI8lW+A" async></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Alaa M. Jaddou - Senior Software Engineer')">
    <meta property="og:title" content="@yield('og_title', 'Alaa M. Jaddou - Senior Software Engineer')">
    <meta property="og:description" content="@yield('og_description', 'Frontend Software Engineer aiming toward AI + Software Architect')">
    <meta property="og:image" content="@yield('og_image', asset('images/alaa-jaddou-logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <title>@yield('title', 'Alaa M. Jaddou - Senior Software Engineer')</title>

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
                    <a class="flex-shrink-0 flex items-center text-white font-bold text-xl" href="{{ route('home') }}">
                        Alaa M. Jaddou
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
                    <h3 class="text-lg font-semibold mb-4">Alaa M. Jaddou</h3>
                    <p class="mb-4">Senior Software Engineer</p>
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
                <p>&copy; {{ date('Y') }} Alaa M. Jaddou. All rights reserved.</p>
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
