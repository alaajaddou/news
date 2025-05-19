<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Aj Group - Your Friendly Guide to the Future of AI')">
    <meta property="og:title" content="@yield('og_title', 'Aj Group')">
    <meta property="og:description" content="@yield('og_description', 'Your Friendly Guide to the Future of AI')">
    <meta property="og:image" content="@yield('og_image', asset('images/ai-tech-guy-logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <title>@yield('title', 'Aj Group - Your Friendly Guide to the Future of AI')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('styles')
</head>
<body>
    <!-- Header -->
    <header class="bg-primary py-3">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">Aj Group</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" 
                        aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                               href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" 
                               href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" 
                               href="{{ route('blog.index') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" 
                               href="{{ route('services.index') }}">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}" 
                               href="{{ route('contact.index') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Aj Group</h5>
                    <p class="mb-3">Your Friendly Guide to the Future of AI</p>
                    <div class="fs-4">
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-github"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}" class="text-white text-decoration-none">About</a></li>
                        <li class="mb-2"><a href="{{ route('blog.index') }}" class="text-white text-decoration-none">Blog</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}" class="text-white text-decoration-none">Services</a></li>
                        <li class="mb-2"><a href="{{ route('contact.index') }}" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Contact</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@aj-group.ps</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> +972569410116</li>
                    </ul>
                </div>
            </div>
            <div class="text-center pt-4 mt-4 border-top border-secondary">
                <p class="mb-0">&copy; {{ date('Y') }} Aj Group. All rights reserved.</p>
            </div>
        </div>
    </footer>

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
