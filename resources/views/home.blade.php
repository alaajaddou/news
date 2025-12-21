@extends('layouts.app')

@section('title', 'Aj Group – AI & Software Solutions')
@section('meta_description', 'Aj Group is an AI-first company building scalable software solutions, enterprise integrations, and automation tools.')
@section('og_title', 'Aj Group – AI & Software Solutions')
@section('og_description', 'Aj Group is an AI-first company building scalable software solutions, enterprise integrations, and automation tools.')

@section('content')
    <!-- Hero Section -->
    <section class="bg-indigo-700 text-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Aj Group – Architecting AI-Driven Software Ecosystems</h1>
            <p class="text-xl md:text-2xl mb-2">AI-first software company delivering scalable, high-impact solutions</p>
            <p class="text-lg md:text-xl mb-8 text-indigo-200">Enterprise integrations, intelligent automation, and product-grade AI systems</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('services.index') }}" class="bg-white text-indigo-700 hover:bg-gray-100 px-6 py-3 rounded-lg font-medium shadow-md transition duration-300">Services</a>
                <a href="{{ route('contact.index') }}" class="bg-transparent hover:bg-indigo-600 border-2 border-white px-6 py-3 rounded-lg font-medium transition duration-300">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white border-t border-indigo-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/3 mb-8 md:mb-0 flex justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Aj Group logo" class="w-40 h-56 rounded-full shadow-xl object-cover">
                </div>
                <div class="md:w-2/3 md:pl-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">About Aj Group</h2>
                    <div class="space-y-4 text-gray-600">
                        <p class="text-lg">With over <span class="font-semibold">15 years</span> of experience developing websites and CMSs, Aj Group brings deep technical expertise to every project.</p>
                        <p class="text-lg">Our team has <span class="font-semibold">7+ years</span> of experience working with ERP systems and capabilities in graphic and product design.</p>
                        <p class="text-lg">Recently, Aj Group has been involved in AI-powered projects including Planivator and Opti AI Solutions, focusing on operations research and intelligent automation.</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('about') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium shadow-md transition duration-300">Learn More About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-gray-50 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Professional services tailored to your needs in AI, software, and operational efficiency</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($featuredServices->count() > 0)
                    @foreach($featuredServices as $service)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                            <div class="p-6 text-center">
                                @if($service->icon)
                                    <div class="mb-4">
                                        <i class="{{ $service->icon }} text-4xl text-indigo-600"></i>
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <i class="fas fa-code text-4xl text-indigo-600"></i>
                                    </div>
                                @endif
                                <h3 class="text-xl font-semibold mb-3">{{ $service->title }}</h3>
                                <p class="text-gray-600 mb-6">{{ $service->description }}</p>
                                <a href="{{ route('services.show', $service->slug) }}" class="block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Default Services -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="p-6 text-center">
                            <div class="mb-4"><i class="fas fa-code text-4xl text-indigo-600"></i></div>
                            <h3 class="text-xl font-semibold mb-3">Frontend Development</h3>
                            <p class="text-gray-600 mb-6">Modern, responsive web applications built with the latest frontend technologies.</p>
                            <a href="{{ route('services.index') }}" class="block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="p-6 text-center">
                            <div class="mb-4"><i class="fas fa-brain text-4xl text-indigo-600"></i></div>
                            <h3 class="text-xl font-semibold mb-3">AI Project Consultation</h3>
                            <p class="text-gray-600 mb-6">Expert guidance on implementing AI solutions for operational and business growth.</p>
                            <a href="{{ route('services.index') }}" class="block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="p-6 text-center">
                            <div class="mb-4"><i class="fas fa-database text-4xl text-indigo-600"></i></div>
                            <h3 class="text-xl font-semibold mb-3">ERP Solutions</h3>
                            <p class="text-gray-600 mb-6">Comprehensive ERP implementation and AI-optimized business solutions.</p>
                            <a href="{{ route('services.index') }}" class="block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="p-6 text-center">
                            <div class="mb-4"><i class="fas fa-cloud-upload-alt text-4xl text-indigo-600"></i></div>
                            <h3 class="text-xl font-semibold mb-3">DevOps & Cloud</h3>
                            <p class="text-gray-600 mb-6">CI/CD, containerization and cloud architecture for scalable systems.</p>
                            <a href="{{ route('services.index') }}" class="block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="p-6 text-center">
                            <div class="mb-4"><i class="fas fa-paint-brush text-4xl text-indigo-600"></i></div>
                            <h3 class="text-xl font-semibold mb-3">UI/UX Design</h3>
                            <p class="text-gray-600 mb-6">Design systems, wireframes, and prototypes focused on usability.</p>
                            <a href="{{ route('services.index') }}" class="block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                        <div class="p-6 text-center">
                            <div class="mb-4"><i class="fas fa-cogs text-4xl text-indigo-600"></i></div>
                            <h3 class="text-xl font-semibold mb-3">CMS & Content Platforms</h3>
                            <p class="text-gray-600 mb-6">Robust content management systems tailored to editorial workflows.</p>
                            <a href="{{ route('services.index') }}" class="block bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition duration-300">Learn More</a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('services.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium shadow-md transition duration-300">View All Services</a>
            </div>
        </div>
    </section>

    <!-- Featured Posts Section -->
    <section class="py-16 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Latest Articles</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Insights and updates from our recent work</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if($featuredPosts->count() > 0)
                    @foreach($featuredPosts as $post)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105 flex flex-col h-full">
                                @if($post->featured_image)
                                <img src="{{ url('storage/' . $post->featured_image) }}" class="w-full h-48 object-cover" alt="{{ $post->title }}">
                            @else
                                <img src="https://via.placeholder.com/600x400?text=Aj+Group" class="w-full h-48 object-cover" alt="{{ $post->title }}">
                            @endif
                            <div class="p-6 flex flex-col flex-1">
                                <h3 class="text-xl font-semibold mb-3">{{ $post->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}</p>
                                <div class="mt-auto flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $post->published_at->format('M d, Y') }}</span>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-600">No articles yet. Check back soon!</p>
                    </div>
                @endif
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('blog.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium shadow-md transition duration-300">View All Articles</a>
            </div>
        </div>
    </section>

    <!-- Our Process Section -->
    <section class="py-16 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Our Process</h2>
                <p class="text-lg text-gray-700 max-w-3xl mx-auto mb-4">We guide projects from concept to launch with a seamless, structured workflow designed for success.</p>
                <p class="text-md text-indigo-600 font-semibold">Discovery → Planning → Development → Delivery & Support</p>
            </div>

            <!-- Flow Diagram -->
            <div class="mb-12">
                <div class="hidden md:block">
                    <!-- Desktop: Horizontal Flow -->
                    <div class="relative">
                        <!-- Connecting Line -->
                        <div class="absolute top-12 left-0 right-0 h-1 bg-gradient-to-r from-indigo-300 via-indigo-500 to-indigo-300" style="top: 50px;"></div>

                        <div class="grid grid-cols-4 gap-6 relative z-10">
                            <!-- Discovery -->
                            <div class="text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition">
                                        <div class="text-center">
                                            <div class="text-3xl font-bold text-white">1</div>
                                            <div class="text-xs text-indigo-100 font-semibold">START</div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Discovery</h3>
                                <p class="text-sm text-gray-600">Understanding your goals, constraints, and success metrics, shaping a clear project vision.</p>
                            </div>

                            <!-- Planning -->
                            <div class="text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition">
                                        <div class="text-center">
                                            <div class="text-3xl font-bold text-white">2</div>
                                            <div class="text-xs text-indigo-100 font-semibold">PLAN</div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Planning</h3>
                                <p class="text-sm text-gray-600">Crafting a roadmap with milestones, deliverables, and measurable acceptance criteria.</p>
                            </div>

                            <!-- Development -->
                            <div class="text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-400 to-indigo-500 rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition">
                                        <div class="text-center">
                                            <div class="text-3xl font-bold text-white">3</div>
                                            <div class="text-xs text-indigo-100 font-semibold">BUILD</div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Development</h3>
                                <p class="text-sm text-gray-600">Incremental, test-driven cycles with architecture reviews to guarantee quality and scalability.</p>
                            </div>

                            <!-- Delivery & Support -->
                            <div class="text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition">
                                        <div class="text-center">
                                            <div class="text-3xl font-bold text-white">4</div>
                                            <div class="text-xs text-indigo-100 font-semibold">LAUNCH</div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Delivery & Support</h3>
                                <p class="text-sm text-gray-600">Delivering your solution, monitoring performance, and continuously refining for maximum impact.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile: Vertical Flow -->
                <div class="md:hidden">
                    <div class="space-y-8">
                        <!-- Discovery -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-full flex items-center justify-center shadow-lg">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-1 pt-2">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">Discovery</h3>
                                <p class="text-sm text-gray-600">Understanding your goals, constraints, and success metrics, shaping a clear project vision.</p>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <div class="w-1 h-6 bg-gradient-to-b from-indigo-400 to-indigo-300"></div>
                        </div>

                        <!-- Planning -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">2</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-1 pt-2">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">Planning</h3>
                                <p class="text-sm text-gray-600">Crafting a roadmap with milestones, deliverables, and measurable acceptance criteria.</p>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <div class="w-1 h-6 bg-gradient-to-b from-indigo-400 to-indigo-300"></div>
                        </div>

                        <!-- Development -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-400 to-indigo-500 rounded-full flex items-center justify-center shadow-lg">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">3</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-1 pt-2">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">Development</h3>
                                <p class="text-sm text-gray-600">Incremental, test-driven cycles with architecture reviews to guarantee quality and scalability.</p>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <div class="w-1 h-6 bg-gradient-to-b from-indigo-400 to-indigo-300"></div>
                        </div>

                        <!-- Delivery & Support -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-full flex items-center justify-center shadow-lg">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-white">4</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-1 pt-2">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">Delivery & Support</h3>
                                <p class="text-sm text-gray-600">Delivering your solution, monitoring performance, and continuously refining for maximum impact.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Text -->
            <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-6 md:p-8">
                <p class="text-gray-700 leading-relaxed text-center md:text-left">
                    It starts with <span class="font-semibold">understanding your goals, constraints, and success metrics</span>, shaping a clear project vision. From there, we craft a roadmap with milestones and deliverables, ensuring every step is <span class="font-semibold">measurable and aligned</span>. Development follows in <span class="font-semibold">incremental, test-driven cycles</span>, with architecture reviews to guarantee quality and scalability. Finally, we <span class="font-semibold">deliver your solution, monitor its performance, and continuously refine it</span> to maximize long-term impact.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-700 text-white text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-4">Ready to Work Together?</h2>
            <p class="text-xl max-w-3xl mx-auto mb-8">Let's discuss how we can help bring your ideas to life with modern AI-first software solutions.</p>
            <a href="{{ route('contact.index') }}" class="inline-block bg-white text-indigo-700 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium shadow-md transition duration-300">Get in Touch</a>
        </div>
    </section>
@endsection
