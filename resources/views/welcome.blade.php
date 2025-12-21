<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aj Group | AI Powered Solutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-50 text-gray-800">

<!-- Header with gradient background -->
<header class="bg-gradient-to-r from-primary-500 via-secondary-500 to-danger-500 text-white py-8 px-4 text-center">
    <img src="{{ asset('images/logo.svg') }}" alt="Aj Group Logo" class="max-w-[200px] mx-auto bg-white/90 p-3 rounded-full shadow-lg">
    <h1 class="text-4xl font-bold mt-4">Aj Group</h1>
    <p class="text-lg text-gray-200">AI-Powered Software & Solutions</p>
</header>

<!-- Intro Section -->
<section class="max-w-7xl mx-auto py-16 px-4">
    <div class="flex flex-wrap items-center gap-8 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 shadow-md border-l-2 border-primary-500 border-r-2 border-warning-500">
        <div class="flex-1 min-w-[300px]">
            <h2 class="text-3xl font-bold mb-4 bg-gradient-to-r from-primary-500 via-secondary-500 to-warning-500 inline-block text-transparent bg-clip-text">
                Empowering Innovation Through AI
            </h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                Aj Group delivers advanced AI solutions that automate, analyze, and accelerate business success. We combine data science, machine learning, and human expertise to create intelligent systems that think, learn, and evolve with your needs.
            </p>
        </div>
        <img class="flex-1 min-w-[300px] max-w-[500px] rounded-xl" src="{{ asset('images/ai.png') }}" alt="AI Tech Placeholder">
    </div>
</section>

<!-- Services Section -->
<section class="max-w-7xl mx-auto py-16 px-4">
    <div class="bg-white rounded-2xl shadow-md p-8">
        <h2 class="text-3xl font-bold text-center mb-12 relative inline-block left-1/2 -translate-x-1/2">
            <i class="fas fa-cogs mr-2"></i> Our Services
            <span class="absolute bottom-[-10px] left-0 w-full h-1 bg-gradient-to-r from-primary-500 via-secondary-500 to-warning-500 rounded-full"></span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Service Card 1 -->
            <div class="bg-gradient-to-br from-primary-50 via-primary-100 to-primary-200 p-6 rounded-xl text-center border-t-4 border-primary-500 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-brain text-4xl text-primary-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">NLP & Chatbots</h3>
                <p class="text-gray-600">Conversational AI that understands users and improves engagement.</p>
            </div>

            <!-- Service Card 2 -->
            <div class="bg-gradient-to-br from-success-50 via-success-100 to-success-200 p-6 rounded-xl text-center border-t-4 border-success-500 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-chart-line text-4xl text-success-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Predictive Analytics</h3>
                <p class="text-gray-600">Use machine learning to forecast trends and make smarter decisions.</p>
            </div>

            <!-- Service Card 3 -->
            <div class="bg-gradient-to-br from-secondary-50 via-secondary-100 to-secondary-200 p-6 rounded-xl text-center border-t-4 border-secondary-500 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-image text-4xl text-secondary-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Computer Vision</h3>
                <p class="text-gray-600">Image and video analysis for automation and detection systems.</p>
            </div>

            <!-- Service Card 4 -->
            <div class="bg-gradient-to-br from-warning-50 via-warning-100 to-warning-200 p-6 rounded-xl text-center border-t-4 border-warning-500 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-robot text-4xl text-warning-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Automation</h3>
                <p class="text-gray-600">Intelligent process automation to streamline workflows and reduce costs.</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section (Commented out but converted to Tailwind) -->
{{--
<section class="max-w-7xl mx-auto py-16 px-4">
    <div class="bg-white rounded-2xl shadow-md p-8">
        <h2 class="text-3xl font-bold text-center mb-12 relative inline-block left-1/2 -translate-x-1/2">
            <i class="fas fa-briefcase mr-2"></i> Portfolio
            <span class="absolute bottom-[-10px] left-0 w-full h-1 bg-gradient-to-r from-primary-500 via-secondary-500 to-warning-500 rounded-full"></span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="overflow-hidden rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400x160?text=Project+1" alt="Project 1" class="w-full h-40 object-cover">
                <h4 class="text-lg font-semibold p-4">SmartBot CRM</h4>
            </div>
            <div class="overflow-hidden rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400x160?text=Project+2" alt="Project 2" class="w-full h-40 object-cover">
                <h4 class="text-lg font-semibold p-4">AI Market Analyzer</h4>
            </div>
            <div class="overflow-hidden rounded-lg shadow-md">
                <img src="https://via.placeholder.com/400x160?text=Project+3" alt="Project 3" class="w-full h-40 object-cover">
                <h4 class="text-lg font-semibold p-4">Healthcare Classifier</h4>
            </div>
        </div>
    </div>
</section>
--}}

<!-- Contact Section -->
<section class="max-w-7xl mx-auto py-16 px-4">
    <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl p-12 shadow-lg border-l-4 border-secondary-500 border-r-4 border-warning-500 border-t border-primary-500 border-b border-success-500">
        @if(session('success'))
            <div class="bg-success-100 text-success-800 p-4 rounded-lg text-center mb-8" id="success-message">
                {{ session('success') }}
            </div>
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                const successMessage = document.getElementById('success-message');
                if (successMessage) {
                  successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
              });
            </script>
        @endif

        <h2 class="text-3xl font-bold text-center mb-12 relative inline-block left-1/2 -translate-x-1/2">
            <i class="fas fa-envelope mr-2"></i> Contact Us
            <span class="absolute bottom-[-10px] left-0 w-full h-1 bg-gradient-to-r from-primary-500 via-secondary-500 to-warning-500 rounded-full"></span>
        </h2>

        <form action="{{ route('contact.submit') }}" method="POST" class="max-w-2xl mx-auto space-y-6">
            @csrf
            <div>
                <input type="text" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" placeholder="Your Name" required>
            </div>
            <div>
                <input type="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" placeholder="Your Email" required>
            </div>
            <div>
                <textarea name="message" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" placeholder="Your Message" required></textarea>
            </div>

            <script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.site_key') }}"></script>
            <script>
              grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('captcha.site_key') }}', { action: 'contact' }).then(function(token) {
                  document.getElementById('recaptcha_token').value = token;
                });
              });
            </script>
            <input type="hidden" name="g-recaptcha-response" id="recaptcha_token">

            <button type="submit" class="w-full py-3 px-6 bg-gradient-to-r from-primary-500 via-secondary-500 to-warning-500 text-white font-semibold rounded-lg shadow-md hover:from-primary-600 hover:via-secondary-600 hover:to-warning-600 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                Send Message
            </button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gradient-to-r from-gray-800 via-gray-900 to-black text-gray-300 py-8 px-4 text-center text-sm border-t-4 border-gradient-to-r from-primary-500 via-secondary-500 to-warning-500">
    &copy; {{ date('Y') }} Aj Group. All rights reserved. | 
    <a href="mailto:info@aj-group.ps" class="text-primary-300 hover:text-primary-200 transition-colors">info@aj-group.ps</a>
</footer>

</body>
</html>
