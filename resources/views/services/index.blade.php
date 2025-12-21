@extends('layouts.app')

@section('title', 'Services - Alaa M. Jaddou – Senior Software Engineer & AI Specialist')
@section('meta_description', 'Explore professional services offered by Alaa M. Jaddou: Frontend Development, AI Integration, ERP Solutions, UI/UX Design, and full-stack software solutions.')
@section('og_title', 'Services - Alaa M. Jaddou – Senior Software Engineer & AI Specialist')
@section('og_description', 'Explore professional services offered by Alaa M. Jaddou, including scalable software solutions, AI integration, ERP implementation, and more.')

@section('content')
    <!-- Hero Section -->
    <section class="py-20 bg-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">Professional Services</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto mb-6">
                Delivering scalable, AI-driven, and maintainable software solutions for businesses, startups, and innovators.
            </p>
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-8">
                From modern web development to ERP solutions and AI-powered applications, I combine over 12 years of experience with cutting-edge technologies to solve real-world problems.
            </p>
            <a href="{{ route('contact.index') }}" class="inline-block py-4 px-10 bg-white text-indigo-700 hover:bg-gray-100 rounded-lg text-lg font-semibold shadow-md transition duration-300">Get in Touch</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-lg md:text-xl text-gray-700 max-w-4xl mx-auto mb-6">
                My services cover the entire lifecycle of software development, from ideation to delivery and support. I provide expertise in frontend development, full-stack solutions, ERP systems, AI integration, and user experience design. Every project is approached with a focus on scalability, maintainability, and operational efficiency.
            </p>
            <p class="text-lg md:text-xl text-gray-700 max-w-4xl mx-auto">
                Whether you are a startup looking to launch a digital product or an enterprise seeking AI-driven process optimization, my services are tailored to meet your unique challenges and goals.
            </p>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($services->count() > 0)
                    @foreach($services as $service)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 flex flex-col">
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
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 flex flex-col">
                        <div class="p-6 text-center flex-1 flex flex-col">
                            <i class="fas fa-code text-4xl mb-4 text-indigo-600"></i>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">Frontend Development</h3>
                            <p class="text-gray-600 mb-6 flex-1">
                                Build modern, responsive web applications using HTML, CSS, JavaScript, and frameworks like React, Vue, and Tailwind CSS. Focused on intuitive UI and exceptional UX.
                            </p>
                            <a href="#" class="inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-300 mt-auto">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 flex flex-col">
                        <div class="p-6 text-center flex-1 flex flex-col">
                            <i class="fas fa-brain text-4xl mb-4 text-indigo-600"></i>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">AI Project Consultation</h3>
                            <p class="text-gray-600 mb-6 flex-1">
                                Expert guidance for AI integration, machine learning pipelines, and intelligent automation. I help identify opportunities, choose technologies, and implement AI solutions that add measurable value.
                            </p>
                            <a href="#" class="inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-300 mt-auto">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 flex flex-col">
                        <div class="p-6 text-center flex-1 flex flex-col">
                            <i class="fas fa-database text-4xl mb-4 text-indigo-600"></i>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">ERP Solutions</h3>
                            <p class="text-gray-600 mb-6 flex-1">
                                Enterprise Resource Planning system implementation, customization, and optimization. Streamline operations, improve efficiency, and provide actionable insights from your data.
                            </p>
                            <a href="#" class="inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-300 mt-auto">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 flex flex-col">
                        <div class="p-6 text-center flex-1 flex flex-col">
                            <i class="fas fa-laptop-code text-4xl mb-4 text-indigo-600"></i>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">Website Development</h3>
                            <p class="text-gray-600 mb-6 flex-1">
                                Custom websites, e-commerce platforms, and web applications. Focused on speed, SEO-friendly structure, responsive design, and easy maintainability.
                            </p>
                            <a href="#" class="inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-300 mt-auto">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 flex flex-col">
                        <div class="p-6 text-center flex-1 flex flex-col">
                            <i class="fas fa-paint-brush text-4xl mb-4 text-indigo-600"></i>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">UI/UX Design</h3>
                            <p class="text-gray-600 mb-6 flex-1">
                                Design interfaces with intuitive user flows and modern aesthetics. Leverage my graphic design experience for interfaces that are both functional and visually engaging.
                            </p>
                            <a href="#" class="inline-block py-2 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition duration-300 mt-auto">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-transform duration-300 flex flex-col">
                        <div class="p-6 text-center flex-1 flex flex-col">
                            <i class="fas fa-cogs text-4xl mb-4 text-indigo-600"></i>
                            <h3 class="text-2xl font-semibold mb-3 text-gray-800">CMS Development</h3>
                            <p class="text-gray-600 mb-6 flex-1">
                                Custom content management systems to give you control over your website content, analytics, and integrations without technical overhead.
                            </p>
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
            <p class="text-lg text-gray-700 max-w-3xl mx-auto mb-10">
                I bring a unique combination of frontend expertise, ERP knowledge, AI integration, and operational research principles to every project. My approach ensures that your solution is not only functional but also scalable, efficient, and strategically aligned with your business goals.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-indigo-50 rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-rocket fa-3x mb-4 text-indigo-600"></i>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">AI & Innovation</h3>
                    <p class="text-gray-700">Integrating AI and automation to create smarter applications, reducing manual effort and optimizing performance.</p>
                </div>
                <div class="p-6 bg-indigo-50 rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-cogs fa-3x mb-4 text-indigo-600"></i>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Operational Excellence</h3>
                    <p class="text-gray-700">Using operational research and data-driven strategies to streamline processes, reduce costs, and maximize ROI.</p>
                </div>
                <div class="p-6 bg-indigo-50 rounded-lg shadow-sm hover:shadow-md transition">
                    <i class="fas fa-network-wired fa-3x mb-4 text-indigo-600"></i>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">End-to-End Solutions</h3>
                    <p class="text-gray-700">Full project lifecycle support: ideation, architecture, development, deployment, and long-term maintenance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">My Development Process</h2>
                <p class="text-lg text-gray-700 max-w-3xl mx-auto mb-6">
                    A structured approach combining agile development, AI-driven insights, and scalable architecture to ensure successful, measurable outcomes.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">1</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Discovery</h3>
                    <p class="text-gray-600">Understanding your business, goals, challenges, and workflows to define a clear project scope.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">2</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Planning</h3>
                    <p class="text-gray-600">Defining milestones, architecture, AI integration points, and timelines for efficient delivery.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">3</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Development</h3>
                    <p class="text-gray-600">Agile implementation of the solution with continuous feedback, automated testing, and code reviews.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">4</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Delivery & Support</h3>
                    <p class="text-gray-600">Deployment, monitoring, optimization, and ongoing support to ensure long-term success.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold mb-4">Ready to Build Smarter Solutions?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Let’s collaborate to create scalable, maintainable, and AI-driven applications that elevate your business and solve real-world challenges.</p>
            <a href="{{ route('contact.index') }}" class="inline-block py-4 px-10 bg-white text-indigo-700 hover:bg-gray-100 rounded-lg text-lg font-semibold shadow-md transition duration-300">Get in Touch</a>
        </div>
    </section>
@endsection
