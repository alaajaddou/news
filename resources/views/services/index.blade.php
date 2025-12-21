@extends('layouts.app')

@section('title', 'Services - Alaa M. Jaddou - Senior Software Engineer')
@section('meta_description', 'Professional services offered by Alaa M. Jaddou including Frontend Development, AI Project Consultation, and ERP Solutions.')
@section('og_title', 'Services - Alaa M. Jaddou - Senior Software Engineer')
@section('og_description', 'Professional services offered by Alaa M. Jaddou including Frontend Development, AI Project Consultation, and ERP Solutions.')

@section('content')
    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-r from-indigo-700 to-indigo-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-extrabold mb-4">Services by Alaa M. Jaddou</h1>
            <p class="text-xl max-w-3xl mx-auto mb-6">Building high-quality web apps, AI solutions, and ERP systems with a focus on performance, maintainability, and clear business outcomes.</p>
            <div class="flex items-center justify-center gap-4">
                <a href="{{ route('contact.index') }}" class="inline-block py-3 px-6 bg-white text-indigo-700 rounded-lg font-semibold shadow">Get a Quote</a>
                <a href="#projects" class="inline-block py-3 px-6 border border-white/30 text-white rounded-lg">View Projects</a>
            </div>
        </div>
    </section>

    <!-- Snapshot Stats -->
    <section class="mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-6 grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="text-center">
                    <div class="text-3xl font-bold text-indigo-600">12+</div>
                    <div class="text-sm text-gray-500">Years Experience</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-indigo-600">120+</div>
                    <div class="text-sm text-gray-500">Projects Delivered</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-indigo-600">50+</div>
                    <div class="text-sm text-gray-500">Happy Clients</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-indigo-600">30+</div>
                    <div class="text-sm text-gray-500">Open-Source & Contributions</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="projects" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Featured Services</h2>
                    <p class="text-gray-600 mt-1">A selection of core services I provide, with example outcomes, timelines and technologies.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $defaults = [
                        ['title' => 'Frontend Development','slug'=>'frontend-development','icon'=>'fas fa-code','description'=>'Modern, responsive web applications with accessible UIs.','features'=>['SPA','SSR options','Performance budgets'],'technologies'=>['Vue','Inertia','Tailwind','Vite'],'estimate'=>'4-8 weeks','price'=>'$6k - $20k'],
                        ['title' => 'AI Project Consultation','slug'=>'ai-consultation','icon'=>'fas fa-brain','description'=>'From discovery to PoC and production-ready ML pipelines.','features'=>['Data strategy','Model selection','Deployment'],'technologies'=>['Python','PyTorch','FastAPI'],'estimate'=>'2-6 weeks','price'=>'$3k - $15k'],
                        ['title' => 'ERP Solutions','slug'=>'erp-solutions','icon'=>'fas fa-database','description'=>'Custom ERP integrations and implementations to streamline processes.','features'=>['Migrations','Custom modules','Integrations'],'technologies'=>['Laravel','MySQL','REST'], 'estimate'=>'8-20 weeks','price'=>'$15k+'],
                    ];
                @endphp

                @if(isset($services) && $services->count() > 0)
                    @foreach($services as $service)
                        @php
                            $title = $service->title ?? ($service['title'] ?? 'Service');
                            $desc = $service->description ?? ($service['description'] ?? 'Professional service');
                            $icon = $service->icon ?? ($service['icon'] ?? 'fas fa-code');
                            $slug = $service->slug ?? ($service['slug'] ?? Str::slug($title));
                            $features = $service->features ?? ($service['features'] ?? ['Scoping','Delivery','Support']);
                            $tech = $service->technologies ?? ($service['technologies'] ?? ['Laravel','Tailwind']);
                            $estimate = $service->estimate ?? ($service['estimate'] ?? 'Varies');
                            $price = $service->price ?? ($service['price'] ?? 'Contact');
                        @endphp

                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-4">
                                        <div class="text-3xl text-indigo-600"><i class="{{ $icon }}"></i></div>
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $title }}</h3>
                                    </div>
                                    <div class="text-sm text-gray-500">{{ $estimate }}</div>
                                </div>
                                <p class="text-gray-600 mb-4">{{ $desc }}</p>
                                <div class="mb-4">
                                    @foreach($features as $f)
                                        <span class="inline-block bg-indigo-50 text-indigo-700 px-3 py-1 mr-2 rounded-full text-sm">{{ $f }}</span>
                                    @endforeach
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex -space-x-2">
                                        @foreach(array_slice($tech,0,4) as $t)
                                            <span class="px-2 py-1 bg-gray-100 text-sm text-gray-700 rounded">{{ $t }}</span>
                                        @endforeach
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('services.show', $slug) }}" class="inline-block py-2 px-4 bg-indigo-600 text-white rounded-lg">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($defaults as $d)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-4">
                                        <div class="text-3xl text-indigo-600"><i class="{{ $d['icon'] }}"></i></div>
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $d['title'] }}</h3>
                                    </div>
                                    <div class="text-sm text-gray-500">{{ $d['estimate'] }}</div>
                                </div>
                                <p class="text-gray-600 mb-4">{{ $d['description'] }}</p>
                                <div class="mb-4">
                                    @foreach($d['features'] as $f)
                                        <span class="inline-block bg-indigo-50 text-indigo-700 px-3 py-1 mr-2 rounded-full text-sm">{{ $f }}</span>
                                    @endforeach
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex -space-x-2">
                                        @foreach(array_slice($d['technologies'],0,4) as $t)
                                            <span class="px-2 py-1 bg-gray-100 text-sm text-gray-700 rounded">{{ $t }}</span>
                                        @endforeach
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <a href="#" class="inline-block py-2 px-4 bg-indigo-600 text-white rounded-lg">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">What Clients Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-700 mb-4">"Alaa took our monolithic app and modernized parts of the frontend while improving performance and developer DX."</p>
                    <div class="text-sm font-semibold text-gray-900">— Product Manager, Acme Corp</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-700 mb-4">"Clear communication, robust architecture suggestions, and on-time delivery. Highly recommend for complex integrations."</p>
                    <div class="text-sm font-semibold text-gray-900">— CTO, Fintech Startup</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-700 mb-4">"Excellent AI consultation — helped prioritize use cases and delivered a solid PoC that gave immediate ROI."</p>
                    <div class="text-sm font-semibold text-gray-900">— Head of Data, Retail Co</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">My Process</h2>
                <p class="text-lg text-gray-700 max-w-3xl mx-auto">I follow a structured approach to ensure your project is delivered successfully.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-indigo-50 p-6 rounded-lg shadow-md text-center">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">1</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Discovery</h3>
                    <p class="text-gray-600">Understand goals, constraints, and success metrics.</p>
                </div>
                <div class="bg-indigo-50 p-6 rounded-lg shadow-md text-center">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">2</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Planning</h3>
                    <p class="text-gray-600">Roadmaps, milestones, and deliverables with clear acceptance criteria.</p>
                </div>
                <div class="bg-indigo-50 p-6 rounded-lg shadow-md text-center">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">3</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Development</h3>
                    <p class="text-gray-600">Incremental delivery, tests, and architecture reviews.</p>
                </div>
                <div class="bg-indigo-50 p-6 rounded-lg shadow-md text-center">
                    <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">4</div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-800">Delivery & Support</h3>
                    <p class="text-gray-600">Handover, monitoring, and ongoing improvements.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="w-full lg:w-2/3 text-center">
                    <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
                    <p class="text-xl mb-8">Let's discuss how I can help bring your ideas to life with modern software solutions.</p>
                    <a href="{{ route('contact.index') }}" class="inline-block py-3 px-8 bg-white text-indigo-700 hover:bg-gray-100 rounded-lg text-lg font-medium shadow-md transition duration-300">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>
@endsection
