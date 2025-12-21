@extends('layouts.app')

@section('title', 'Services - Aj Group – AI & Software Solutions')
@section('meta_description', 'Services by Aj Group — AI-first software, enterprise integrations, and automation services for measurable outcomes.')
@section('og_title', 'Services - Aj Group – AI & Software Solutions')
@section('og_description', 'Explore services offered by Aj Group: AI integration, ERP solutions, automation, and more.')

@section('content')

    <section class="bg-indigo-700 text-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-4xl font-bold mb-4">Aj Group – Building the Future of Web & AI</h1>
            <p class="text-xl mb-2">High-performance web apps, intelligent AI solutions, and ERP systems built to scale, perform, and deliver real business results.</p>
            <p class="text-lg mb-8 text-indigo-200">From Frontend Engineer to AI & Software Architect</p>
            <p class="text-lg mb-8 text-indigo-200">Designing impactful, future-ready solutions that turn complex challenges into seamless experiences.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact.index') }}" class="bg-white text-indigo-700 hover:bg-gray-100 px-6 py-3 rounded-lg font-medium shadow-md transition duration-300">Get a Quote</a>
                <a href="#projects" class="bg-transparent hover:bg-indigo-600 border-2 border-white px-6 py-3 rounded-lg font-medium transition duration-300">View Projects</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="projects" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Featured Services</h2>
                    <p class="text-gray-600 mt-1">A selection of core services I provide, with example outcomes and technologies.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @php
                    $defaults = [
                        ['title' => 'Frontend Development','slug'=>'frontend-development','icon'=>'fas fa-code','description'=>'Modern, responsive web applications with accessible UIs.','features'=>['SPA','SSR options','Performance budgets'],'technologies'=>['Vue','Inertia','Tailwind','Vite']],
                        ['title' => 'AI Project Consultation','slug'=>'ai-consultation','icon'=>'fas fa-brain','description'=>'From discovery to PoC and production-ready ML pipelines.','features'=>['Data strategy','Model selection','Deployment'],'technologies'=>['Python','PyTorch','FastAPI']],
                        ['title' => 'ERP Solutions','slug'=>'erp-solutions','icon'=>'fas fa-database','description'=>'Custom ERP integrations and implementations to streamline processes.','features'=>['Migrations','Custom modules','Integrations'],'technologies'=>['Laravel','MySQL','REST']],
                        ['title' => 'Website Development','slug'=>'website-development','icon'=>'fas fa-laptop-code','description'=>'Custom websites focused on performance, accessibility and SEO.','features'=>['Landing pages','Web apps','Performance'],'technologies'=>['Laravel','Vite','Tailwind']],
                        ['title' => 'UI/UX Design','slug'=>'ui-ux-design','icon'=>'fas fa-paint-brush','description'=>'User-centered design combining aesthetics with usability.','features'=>['Wireframes','Prototypes','Design systems'],'technologies'=>['Figma','Tailwind']],
                        ['title' => 'CMS & Content Platforms','slug'=>'cms-development','icon'=>'fas fa-cogs','description'=>'Custom CMS solutions for robust content management workflows.','features'=>['Custom editors','Permissions','Integrations'],'technologies'=>['Laravel','MySQL','Redis']],
                        ['title' => 'DevOps & Cloud','slug'=>'devops-cloud','icon'=>'fas fa-cloud-upload-alt','description'=>'Deployment, CI/CD and cloud architecture for reliability and scale.','features'=>['CI/CD','Monitoring','Auto-scaling'],'technologies'=>['Docker','GitHub Actions','AWS']],
                        ['title' => 'Maintenance & Support','slug'=>'maintenance-support','icon'=>'fas fa-tools','description'=>'Ongoing maintenance, monitoring and security updates for production systems.','features'=>['SLA options','Monitoring','Security patches'],'technologies'=>['Laravel','Prometheus','Sentry']],
                        ['title' => 'Data Engineering','slug'=>'data-engineering','icon'=>'fas fa-database','description'=>'Data pipelines, ETL and analytics-ready datasets for ML and reporting.','features'=>['ETL','Data lakes','Pipelines'],'technologies'=>['Airflow','Postgres','Spark']],
                        ['title' => 'Systems Integration','slug'=>'systems-integration','icon'=>'fas fa-project-diagram','description'=>'Integrate disparate systems via APIs, webhooks and message queues.','features'=>['API design','Queueing','Mapping'],'technologies'=>['Laravel','RabbitMQ','REST']],
                        ['title' => 'Accessibility Audits','slug'=>'accessibility-audits','icon'=>'fas fa-universal-access','description'=>'WCAG accessibility reviews and remediation for inclusive products.','features'=>['Audits','Remediation','Regression tests'],'technologies'=>['axe-core','Lighthouse']],
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
                        @endphp

                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-4">
                                        <div class="text-3xl text-indigo-600"><i class="{{ $icon }}"></i></div>
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $title }}</h3>
                                    </div>
                                    
                                </div>
                                <p class="text-gray-600 mb-4">{{ $desc }}</p>
                                <div class="mb-4">
                                    @foreach($features as $f)
                                        <span class="inline-block bg-indigo-50 text-indigo-700 px-2 py-1 mr-1 rounded-full text-sm">{{ $f }}</span>
                                    @endforeach
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex -space-x-2">
                                        @foreach(array_slice($tech,0,4) as $t)
                                            <span class="px-2 py-1 bg-gray-100 text-sm text-gray-700 rounded">{{ $t }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($defaults as $d)
                        <div class="bg-gradient-to-br from-indigo-50 to-white border-t-4 border-l-4 border-indigo-600 p-6 rounded-lg shadow-md hover:shadow-lg mb-6 transition">
                            <div class="p-3">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-4">
                                        <div class="text-3xl text-indigo-600"><i class="{{ $d['icon'] }}"></i></div>
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $d['title'] }}</h3>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4">{{ $d['description'] }}</p>
                                <div class="mb-4">
                                    @foreach($d['features'] as $f)
                                        <span class="inline-block bg-white border-2 border-indigo-600 text-indigo-700 px-2 py-1 mr-1 mb-1 rounded-full text-sm">{{ $f }}</span>
                                    @endforeach
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex -space-x-2">
                                        @foreach(array_slice($d['technologies'],0,4) as $t)
                                            <span class="px-2 py-1 bg-white shadow-sm text-sm text-gray-700 rounded">{{ $t }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

        <!-- Structured data (JSON-LD) for SEO -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Aj Group",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('images/logo.svg') }}",
            "sameAs": [
                "https://www.linkedin.com/",
                "https://github.com/"
            ],
            "description": "Aj Group: AI-first software company delivering scalable systems, integrations, and automation solutions."
        }
        </script>

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
    <section class="py-16 bg-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="w-full lg:w-2/3 text-center">
                    <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
                    <p class="text-xl mb-8">Let's discuss how we can help bring your ideas to life with modern software and AI-first solutions.</p>
                    <a href="{{ route('contact.index') }}" class="inline-block py-3 px-8 bg-white text-indigo-700 hover:bg-gray-100 rounded-lg text-lg font-medium shadow-md transition duration-300">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>
@endsection
