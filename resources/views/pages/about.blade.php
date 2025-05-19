@extends('layouts.app')

@section('title', 'About Alaa M. Jaddou - Senior Software Engineer')
@section('meta_description', 'Learn about Alaa M. Jaddou\'s journey, expertise, and career background as a Senior Software Engineer.')
@section('og_title', 'About Alaa M. Jaddou - Senior Software Engineer')
@section('og_description', 'Learn about my journey, expertise, and career background as a Senior Software Engineer.')

@section('content')
    <!-- Hero Section -->
    <section class="py-16 bg-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">About Alaa M. Jaddou</h1>
            <p class="text-xl">My journey and expertise as a Senior Software Engineer</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="w-full lg:w-2/3 mx-auto">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800">My Professional Journey</h2>

                    <div class="mb-8 flex justify-center">
                        <img src="https://media.licdn.com/dms/image/v2/C4D03AQGqXB9-GMmLqQ/profile-displayphoto-shrink_800_800/profile-displayphoto-shrink_800_800/0/1581969691126?e=1753315200&v=beta&t=sQbR6McMKTCuDj3jPJfPS2PVF6hbRablq3FHd9knOQw" alt="Alaa M. Jaddou" class="w-48 h-48 rounded-full shadow-xl object-cover">
                    </div>

                    <p class="text-lg mb-4 text-gray-700">I'm a Senior Software Engineer with over 12 years of experience in web development, specializing in frontend technologies and ERP systems.</p>

                    <p class="mb-4 text-gray-700">My career in software development began with a passion for creating intuitive, user-friendly interfaces. Over the years, I've honed my skills across various domains, from content management systems to enterprise resource planning solutions.</p>

                    <p class="mb-4 text-gray-700">Currently, I'm focused on frontend software engineering, while also expanding my expertise in AI technologies and software architecture. This combination allows me to build modern, intelligent applications that solve real-world problems.</p>

                    <div class="my-10">
                        <h3 class="text-2xl font-bold mb-6 text-gray-800">Career Highlights</h3>
                        <div class="space-y-6">
                            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                                <h4 class="text-xl font-semibold mb-2 text-indigo-700">Web Development & CMS</h4>
                                <p class="text-gray-700">12+ years of experience developing websites and content management systems, with a focus on performance, accessibility, and user experience.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                                <h4 class="text-xl font-semibold mb-2 text-indigo-700">ERP Systems</h4>
                                <p class="text-gray-700">6 years working with enterprise resource planning systems, implementing solutions that streamline business operations and improve efficiency.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                                <h4 class="text-xl font-semibold mb-2 text-indigo-700">Graphic Design</h4>
                                <p class="text-gray-700">Nearly 2 years of experience in graphic design, bringing a unique perspective to frontend development with an eye for aesthetics and user interface design.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                                <h4 class="text-xl font-semibold mb-2 text-indigo-700">AI-Powered Projects</h4>
                                <p class="text-gray-700">Recently involved in AI-powered projects including Planivator and OptiAiSolutions, combining software engineering expertise with cutting-edge AI technologies.</p>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-3xl font-bold mb-6 text-gray-800">Technical Expertise</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                        <div class="bg-indigo-50 border border-indigo-200 rounded-lg shadow-sm hover:shadow-md transition-all">
                            <div class="p-6 text-center">
                                <i class="fas fa-code fa-3x mb-4 text-indigo-600"></i>
                                <h5 class="text-xl font-semibold mb-3 text-gray-800">Frontend Development</h5>
                                <p class="text-gray-700">Expert in HTML, CSS, JavaScript, and modern frameworks like React, Vue, and Tailwind CSS.</p>
                            </div>
                        </div>
                        <div class="bg-indigo-50 border border-indigo-200 rounded-lg shadow-sm hover:shadow-md transition-all">
                            <div class="p-6 text-center">
                                <i class="fas fa-database fa-3x mb-4 text-indigo-600"></i>
                                <h5 class="text-xl font-semibold mb-3 text-gray-800">ERP Solutions</h5>
                                <p class="text-gray-700">Implementation and customization of enterprise resource planning systems for business efficiency.</p>
                            </div>
                        </div>
                        <div class="bg-indigo-50 border border-indigo-200 rounded-lg shadow-sm hover:shadow-md transition-all">
                            <div class="p-6 text-center">
                                <i class="fas fa-brain fa-3x mb-4 text-indigo-600"></i>
                                <h5 class="text-xl font-semibold mb-3 text-gray-800">AI Integration</h5>
                                <p class="text-gray-700">Incorporating artificial intelligence into software solutions to create smarter applications.</p>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-3xl font-bold mb-6 text-gray-800">Professional Goals</h2>

                    <p class="mb-4 text-gray-700">As I continue to grow in my career, I'm focused on expanding my expertise in AI technologies and software architecture. My goal is to combine these disciplines to create innovative, intelligent applications that solve complex problems.</p>

                    <p class="mb-4 text-gray-700">I'm passionate about:</p>

                    <ul class="mb-10 space-y-2 list-disc pl-5 text-gray-700">
                        <li><span class="font-semibold">Building scalable, maintainable software</span> that stands the test of time</li>
                        <li><span class="font-semibold">Creating intuitive user experiences</span> that delight and empower users</li>
                        <li><span class="font-semibold">Integrating AI capabilities</span> into applications to enhance functionality</li>
                        <li><span class="font-semibold">Mentoring and collaborating</span> with other developers to create exceptional products</li>
                    </ul>

                    <h2 class="text-3xl font-bold mb-6 text-gray-800">Let's Connect</h2>

                    <p class="mb-6 text-gray-700">Whether you're looking for a senior developer for your project, need consultation on software architecture, or just want to connect with a fellow tech enthusiast, I'd love to hear from you.</p>

                    <div class="text-center mt-8">
                        <a href="{{ route('contact.index') }}" class="inline-block py-3 px-8 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-lg shadow-md transition duration-300">Get in Touch</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
