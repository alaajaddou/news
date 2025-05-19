@extends('layouts.app')

@section('title', 'About Alaa M. Jaddou - My Journey in AI and Technology')
@section('meta_description', 'Learn about Alaa M. Jaddou\'s journey, expertise, and mission in the field of artificial intelligence and technology.')
@section('og_title', 'About Alaa M. Jaddou - My Journey in AI and Technology')
@section('og_description', 'Learn about my journey, expertise, and mission in the field of artificial intelligence and technology.')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1>About Alaa M. Jaddou</h1>
            <p>My journey, expertise, and mission in the world of AI</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="mb-4">My Story</h2>
                    <p class="lead mb-4">I'm an AI specialist, developer, and educator with a passion for making artificial intelligence accessible to everyone.</p>

                    <p>My journey in technology began over a decade ago when I first discovered the potential of machine learning algorithms to solve complex problems. What started as curiosity quickly evolved into a career-defining passion.</p>

                    <p>After completing my education in Computer Science with a specialization in Artificial Intelligence, I worked with several tech companies, helping them implement AI solutions that transformed their businesses. These experiences showed me the immense potential of AI, but also highlighted a significant gap: the disconnect between cutting-edge AI research and practical, accessible applications.</p>

                    <p>This realization led me to create Alaa M. Jaddou, a platform dedicated to bridging this gap through education, consulting, and development services.</p>

                    <div class="my-5">
                        <img src="https://via.placeholder.com/800x400" alt="Alaa M. Jaddou Journey" class="img-fluid rounded shadow">
                    </div>

                    <h2 class="mb-4">My Expertise</h2>

                    <div class="row mb-5">
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 text-center">
                                <div class="card-body">
                                    <i class="fas fa-brain fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title">Machine Learning</h5>
                                    <p class="card-text">Expertise in supervised and unsupervised learning, neural networks, and deep learning frameworks.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 text-center">
                                <div class="card-body">
                                    <i class="fas fa-comments fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title">Natural Language Processing</h5>
                                    <p class="card-text">Building systems that understand, interpret, and generate human language.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 text-center">
                                <div class="card-body">
                                    <i class="fas fa-code fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title">Software Development</h5>
                                    <p class="card-text">Full-stack development with a focus on AI integration and scalable architectures.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-4">My Mission</h2>

                    <p>My mission is to demystify artificial intelligence and make it accessible to individuals and businesses of all sizes. I believe that AI has the potential to solve some of our most pressing challenges, but only if we can bridge the gap between complex research and practical applications.</p>

                    <p>Through this platform, I aim to:</p>

                    <ul class="mb-5">
                        <li><strong>Educate:</strong> Provide clear, jargon-free explanations of AI concepts and technologies.</li>
                        <li><strong>Inspire:</strong> Showcase innovative applications of AI that are making a positive impact.</li>
                        <li><strong>Empower:</strong> Offer practical tutorials and resources that help you implement AI in your own projects.</li>
                        <li><strong>Support:</strong> Provide consulting and development services to help businesses leverage AI effectively.</li>
                    </ul>

                    <h2 class="mb-4">Let's Connect</h2>

                    <p>I'm always excited to connect with fellow AI enthusiasts, potential clients, or anyone interested in learning more about artificial intelligence. Whether you have a specific project in mind or just want to chat about the latest developments in AI, I'd love to hear from you.</p>

                    <div class="text-center mt-5">
                        <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg">Get in Touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
