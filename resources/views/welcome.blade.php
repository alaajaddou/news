<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aj Group | AI Powered Solutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            color: #1f2937;
        }

        header {

            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            color: #FFFFFF;
            padding: 1rem 1rem;
            text-align: center;
        }

        header img {
            max-width: 200px;
        }

        header h1 {
            margin-top: 1rem;
            font-size: 2.5rem;
        }

        header p {
            font-size: 1.1rem;
            color: #d1d5db;
        }

        .section {
            padding: 4rem 1.5rem;
            max-width: 1100px;
            margin: auto;
            text-align: center;
        }

        .intro {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 2rem;
        }

        .intro img {
            flex: 1;
            max-width: 500px;
            border-radius: 0.75rem;
        }

        .intro-text {
            flex: 1;
        }

        .intro-text h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .intro-text p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #4b5563;
        }

        .services, .portfolio {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 2rem;
        }

        .services h2, .portfolio h2 {
            text-align: center;
            margin-bottom: 2rem;
        }

        .service-cards, .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background: #f3f4f6;
            padding: 1.5rem;
            border-radius: 0.75rem;
            text-align: center;
        }

        .card i {
            font-size: 2rem;
            color: #3b82f6;
            margin-bottom: 1rem;
        }

        .card h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .card p {
            font-size: 0.95rem;
            color: #4b5563;
        }

        .portfolio-item img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .portfolio-item h4 {
            margin-top: 0.75rem;
            font-size: 1.1rem;
        }

        .contact {
            background-color: #f3f4f6;
            padding: 3rem;
            border-radius: 1rem;
        }

        .contact h2 {
            text-align: center;
            margin-bottom: 2rem;
        }

        form {
            max-width: 600px;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        input, textarea {
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
        }

        button {
            background-color: #3b82f6;
            color: white;
            padding: 0.75rem;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 0.5rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #2563eb;
        }

        footer {
            text-align: center;
            background-color: #1f2937;
            color: #d1d5db;
            padding: 2rem 1rem;
            font-size: 0.9rem;
        }

        @media(max-width: 768px) {
            .intro {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<header>
    <img src="{{ asset('images/logo.png') }}" alt="Aj Group Logo">
    <h1>Aj Group</h1>
    <p>AI Powered Solution Provider</p>
</header>

<section class="section intro">
    <div class="intro-text">
        <h2>Empowering Innovation Through AI</h2>
        <p>Aj Group delivers advanced AI solutions that automate, analyze, and accelerate business success. We combine data science, machine learning, and human expertise to create intelligent systems that think, learn, and evolve with your needs.</p>
    </div>
    <img style="width: 75%" src="{{ asset('images/ai.png') }}" alt="AI Tech Placeholder">
</section>

<section class="section services">
    <h2><i class="fas fa-cogs"></i> Our Services</h2>
    <div class="service-cards">
        <div class="card">
            <i class="fas fa-brain"></i>
            <h3>NLP & Chatbots</h3>
            <p>Conversational AI that understands users and improves engagement.</p>
        </div>
        <div class="card">
            <i class="fas fa-chart-line"></i>
            <h3>Predictive Analytics</h3>
            <p>Use machine learning to forecast trends and make smarter decisions.</p>
        </div>
        <div class="card">
            <i class="fas fa-image"></i>
            <h3>Computer Vision</h3>
            <p>Image and video analysis for automation and detection systems.</p>
        </div>
    </div>
</section>

{{--<section class="section portfolio">--}}
{{--    <h2><i class="fas fa-briefcase"></i> Portfolio</h2>--}}
{{--    <div class="portfolio-grid">--}}
{{--        <div class="portfolio-item">--}}
{{--            <img src="https://via.placeholder.com/400x160?text=Project+1" alt="Project 1">--}}
{{--            <h4>SmartBot CRM</h4>--}}
{{--        </div>--}}
{{--        <div class="portfolio-item">--}}
{{--            <img src="https://via.placeholder.com/400x160?text=Project+2" alt="Project 2">--}}
{{--            <h4>AI Market Analyzer</h4>--}}
{{--        </div>--}}
{{--        <div class="portfolio-item">--}}
{{--            <img src="https://via.placeholder.com/400x160?text=Project+3" alt="Project 3">--}}
{{--            <h4>Healthcare Classifier</h4>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="section contact">

    @if(session('success'))
        <div class="alert alert-success text-center mb-4" id="success-message">
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

    <h2 class="text-center mb-4"><i class="fas fa-envelope"></i> Contact Us</h2>
    <form action="{{ route('contact.submit') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
        </div>
        <div class="mb-3">
            <textarea name="message" rows="5" class="form-control" placeholder="Your Message" required></textarea>
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

        <button type="submit" class="btn btn-primary w-100">Send Message</button>
    </form>
</section>

<footer>
    &copy; {{ date('Y') }} Aj Group. All rights reserved. | <a href="mailto:info@aj-group.ps" class="btn btn-link small">info@aj-group.ps</a>
</footer>

</body>
</html>
