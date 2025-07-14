@extends('layouts.app')
@section('content')
<section class="bg-gray-900/50 text-white items-center sm:pb-[7rem] md:pb-0 min-h-[180px]">
    <!-- Background Image -->
    <div class="absolute inset-0 h-full bg-[url('/images/bg-1.jpg')] bg-cover bg-center z-[-2] max-h-[270px] sm:max-h-[282.5px] lg:max-h-[385px]"></div>
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 h-full bg-gradient-to-br from-gray-900/100 to-transparent z-[-1] max-h-[270px] sm:max-h-[282.5px] lg:max-h-[385px]"></div>

    <div class="container flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-6 md:mb-0 ">
            <div class="flex items-center h-full">
                <div class="py-[4rem] lg:py-[8rem]">
                    <h1 class="lg:text-7xl md:text-6xl text-4xl pr-20 font-bold leading-tight">
                        {{ __('service.headline') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-5">
        <h2 class="mb-4 text-3xl font-bold text-center">Our Services</h2>
        <p class="mb-8 text-center text-lg text-gray-600 dark:text-gray-300">
            Discover how we can help your business grow with our comprehensive digital solutions. Click on a service to learn more!
        </p>
        <div class="flex flex-col gap-8">
            <!-- Web Development -->
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="flex-shrink-0 p-6 md:p-8 border-2 border-gray-200 dark:border-gray-700">
                    <img src="" alt="img" class="w-[300px] h-[300px] text-blue-500">
                </div>
                <div class="flex-1 p-6">
                    <h5 class="text-2xl font-semibold flex items-center gap-2">
                        Web Development
                    </h5>
                    <p class="mt-2 text-gray-700 dark:text-gray-200">
                        Custom web applications, e-commerce platforms, and responsive websites built with the latest technologies to drive your business forward.
                    </p>
                    <ul class="mt-3 text-sm text-gray-500 dark:text-gray-400 list-disc list-inside">
                        <li>Laravel, React, Vue.js expertise</li>
                        <li>SEO & performance optimization</li>
                        <li>Secure & scalable solutions</li>
                    </ul>
                    <a href="#" class="inline-block mt-4 text-green-600 hover:text-green-700">Learn more &rarr;</a>
                </div>
            </div>
            <!-- Mobile App Development -->
            <a href="#" class="block group">
                <div class="w-full shadow-lg transition-transform group-hover:-translate-y-2 group-hover:shadow-2xl flex flex-col md:flex-row items-center">
                    <div class="flex-shrink-0 p-6 md:p-8">
                        <svg class="w-20 h-20 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="7" y="4" width="10" height="16" />
                        </svg>
                    </div>
                    <div class="flex-1 p-6">
                        <h5 class="text-2xl font-semibold flex items-center gap-2">
                            Mobile App Development
                        </h5>
                        <p class="mt-2 text-gray-700 dark:text-gray-200">
                            Native and cross-platform mobile apps for Android & iOS, designed to engage your customers and streamline your business processes.
                        </p>
                        <ul class="mt-3 text-sm text-gray-500 dark:text-gray-400 list-disc list-inside">
                            <li>Flutter, React Native, Swift, Kotlin</li>
                            <li>App Store & Google Play deployment</li>
                            <li>API integration & push notifications</li>
                        </ul>
                        <span class="inline-block mt-4 text-green-600 group-hover:underline">Learn more &rarr;</span>
                    </div>
                </div>
            </a>
            <!-- UI/UX Design -->
            <a href="#" class="block group">
                <div class="w-full shadow-lg transition-transform group-hover:-translate-y-2 group-hover:shadow-2xl flex flex-col md:flex-row items-center">
                    <div class="flex-shrink-0 p-6 md:p-8">
                        <svg class="w-20 h-20 text-pink-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M8 15h8M8 12h8M8 9h8" />
                        </svg>
                    </div>
                    <div class="flex-1 p-6">
                        <h5 class="text-2xl font-semibold flex items-center gap-2">
                            UI/UX Design
                        </h5>
                        <p class="mt-2 text-gray-700 dark:text-gray-200">
                            Intuitive, engaging, and accessible user interfaces that delight your audience and boost conversion rates.
                        </p>
                        <ul class="mt-3 text-sm text-gray-500 dark:text-gray-400 list-disc list-inside">
                            <li>User research & wireframing</li>
                            <li>Prototyping & usability testing</li>
                            <li>Brand-consistent visual design</li>
                        </ul>
                        <span class="inline-block mt-4 text-pink-600 group-hover:underline">Learn more &rarr;</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection
