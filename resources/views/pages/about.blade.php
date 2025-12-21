@extends('layouts.app')

@section('title', 'About Aj Group – AI & Software Solutions')
@section('meta_description', 'Learn about Aj Group — our mission, services, and leadership in AI-first software solutions.')
@section('og_title', 'About Aj Group – AI & Software Solutions')
@section('og_description', 'Aj Group is a company specializing in AI-powered software, scalable architectures, and enterprise integrations.')

@section('content')

     <section class="bg-indigo-700 text-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-4xl font-bold mb-4">About Aj Group</h1>
            <p class="text-xl mb-2">AI-First Software Company | Scalable Systems | Enterprise Integrations</p>
            <p class="text-lg mb-8 text-indigo-200">Building scalable, intelligent solutions that drive measurable business outcomes for organizations.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('services.index') }}" class="bg-white text-indigo-700 hover:bg-gray-100 px-6 py-3 rounded-lg font-medium shadow-md transition duration-300">My Services</a>
                <a href="{{ route('contact.index') }}" class="bg-transparent hover:bg-indigo-600 border-2 border-white px-6 py-3 rounded-lg font-medium transition duration-300">Contact Me</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Introduction -->
                    <div class="mb-12 grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                        <div class="md:col-span-1 flex justify-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Aj Group logo" class="w-40 h-56 rounded-full shadow-xl object-cover">
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-lg text-gray-700 mb-4 leading-relaxed">Aj Group is a technology company focused on AI-driven software and systems engineering. We design and deliver production-ready solutions, integrations, and automation tools for businesses seeking measurable operational improvements.</p>
                            <p class="text-lg text-gray-700 mb-4 leading-relaxed">Below is a short note about our founder and CEO.</p>

                            <div class="flex gap-4 flex-wrap mt-4">
                                <div class="bg-indigo-50 px-4 py-2 rounded-lg border border-indigo-200">
                                    <p class="text-sm font-semibold text-indigo-700">15+ Years Web Development</p>
                                </div>
                                <div class="bg-indigo-50 px-4 py-2 rounded-lg border border-indigo-200">
                                    <p class="text-sm font-semibold text-indigo-700">7+ Years ERP Systems</p>
                                </div>
                                <div class="bg-indigo-50 px-4 py-2 rounded-lg border border-indigo-200">
                                    <p class="text-sm font-semibold text-indigo-700">AI-First Architecture</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Professional Journey -->
                    <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b-2 border-indigo-300 pb-3">About the Company</h2>
                    <p class="text-lg mb-4 text-gray-700 leading-relaxed">Founded to bridge the gap between AI research and production-grade software, Aj Group delivers solutions that combine operational research, machine learning, and robust engineering practices. Our focus areas include enterprise integrations, AI-powered analytics, and scalable web platforms.</p>

                    <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b-2 border-indigo-300 pb-3 mt-12">About the CEO</h2>
                    <p class="text-lg mb-4 text-gray-700 leading-relaxed">Alaa M. Jaddou is the founder and CEO of Aj Group. With 15+ years in software engineering and AI-first architecture, Alaa leads the technical vision and client engagements, ensuring solutions are both practical and future-proof.</p>

                    <!-- Key Areas of Expertise -->
                    <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b-2 border-indigo-300 pb-3 mt-12">Key Areas of Expertise</h2>

                    <div class="space-y-6 mb-12">
                        <div class="bg-gradient-to-r from-indigo-50 to-white border-l-4 border-indigo-600 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                            <h4 class="text-xl font-semibold mb-2 text-indigo-700">Web & Frontend Development</h4>
                            <p class="text-gray-700"><span class="font-semibold">15+ years</span> in HTML, CSS, JavaScript, and frameworks like React, Angular, Vue, and Tailwind CSS, building responsive and performant web applications.</p>
                        </div>

                        <div class="bg-gradient-to-r from-indigo-50 to-white border-l-4 border-indigo-600 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                            <h4 class="text-xl font-semibold mb-2 text-indigo-700">ERP & Business Solutions</h4>
                            <p class="text-gray-700"><span class="font-semibold">7+ years</span> designing enterprise-grade ERP systems that streamline operations, enhanced with AI-driven insights.</p>
                        </div>

                        <div class="bg-gradient-to-r from-indigo-50 to-white border-l-4 border-indigo-600 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                            <h4 class="text-xl font-semibold mb-2 text-indigo-700">AI & Automation</h4>
                            <p class="text-gray-700">Leveraging machine learning, optimization, and operational research techniques to automate workflows and support data-driven decision-making.</p>
                        </div>

                        <div class="bg-gradient-to-r from-indigo-50 to-white border-l-4 border-indigo-600 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                            <h4 class="text-xl font-semibold mb-2 text-indigo-700">System Architecture</h4>
                            <p class="text-gray-700">Designing scalable, maintainable software ecosystems that integrate multiple products and services for maximum operational efficiency.</p>
                        </div>
                    </div>

                    <!-- Professional Highlights -->
                    <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b-2 border-indigo-300 pb-3">Professional Highlights</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-600 text-white">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold text-gray-800">AI-Driven Projects</h5>
                                <p class="text-gray-700">Led AI-driven projects such as <span class="font-semibold">Planivator</span> and <span class="font-semibold">Opti AI Solutions</span>, optimizing workflows and business processes.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-600 text-white">
                                    <i class="fas fa-cogs"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold text-gray-800">ERP Implementation</h5>
                                <p class="text-gray-700">Implemented ERP systems across diverse industries, improving operational efficiency and decision support.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-600 text-white">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold text-gray-800">Team Leadership</h5>
                                <p class="text-gray-700">Mentored engineering teams to adopt AI-first approaches and maintainable architecture practices.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-md bg-indigo-600 text-white">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold text-gray-800">Multi-Project Ecosystem</h5>
                                <p class="text-gray-700">Architected scalable solutions across multiple products within the Aj Group ecosystem.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Our Mission -->
                    <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b-2 border-indigo-300 pb-3">Our Mission</h2>

                    <p class="text-lg text-gray-700 mb-6 leading-relaxed">We aim to combine AI, software architecture, and operational research to build intelligent, high-impact applications. Our focus is on:</p>

                    <ul class="mb-12 space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="text-indigo-600 mt-1"><i class="fas fa-check-circle"></i></span>
                            <span class="text-gray-700"><span class="font-semibold">Developing scalable, maintainable solutions</span> within a multi-project ecosystem</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-indigo-600 mt-1"><i class="fas fa-check-circle"></i></span>
                            <span class="text-gray-700"><span class="font-semibold">Delivering seamless, intuitive user experiences</span> across web and mobile platforms</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-indigo-600 mt-1"><i class="fas fa-check-circle"></i></span>
                            <span class="text-gray-700"><span class="font-semibold">Integrating AI and automation</span> for smarter, actionable outcomes</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-indigo-600 mt-1"><i class="fas fa-check-circle"></i></span>
                            <span class="text-gray-700"><span class="font-semibold">Supporting teams and organizations</span> to innovate efficiently</span>
                        </li>
                    </ul>

                    <!-- Let's Connect CTA -->
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white p-8 rounded-lg shadow-lg text-center mb-12">
                        <h2 class="text-2xl font-bold mb-3">Let's Connect</h2>
                        <p class="text-lg mb-6">If you're looking for guidance in AI integration, software architecture, or building scalable digital solutions, I'd love to connect and explore opportunities for collaboration.</p>
                        <a href="{{ route('contact.index') }}" class="inline-block py-3 px-8 bg-white text-indigo-700 hover:bg-gray-100 rounded-lg text-lg font-semibold shadow-md transition duration-300">Get in Touch</a>
                    </div>
        </div>
    </section>
@endsection
