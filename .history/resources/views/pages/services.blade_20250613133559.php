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

<section class="py-20">
    <div class="container py-20">
        <h2 class="mb-4 text-3xl font-bold text-center">Our Services</h2>
        <p class="mb-8 text-center text-lg text-gray-600 dark:text-gray-300">
            Discover how we can help your business grow with our comprehensive digital solutions. Click on a service to learn more!
        </p>
        <div class="flex flex-col gap-8">
            <!-- Pengadaan -->
            <div class="flex flex-col md:flex-row items-center gap-6 py-10">
                <div class="flex-shrink-0 p-6 md:p-8 border-2 border-gray-200 dark:border-gray-700 w-full md:w-1/2">
                    <img src="" alt="img" class="w-full h-[200px] md:h-[250px] text-blue-500">
                </div>
                <div class="flex-1 p-6">
                    <h5 class="text-2xl font-semibold flex items-center gap-2">
                        Pengadaan
                    </h5>
                    <p class="mt-2 text-gray-700 dark:text-gray-200">
                        Custom web applications, e-commerce platforms, and responsive websites built with the latest technologies to drive your business forward.
                    </p>
                    <ul class="mt-3 text-sm text-gray-500 dark:text-gray-400 list-disc list-inside">
                        <li>Laravel, React, Vue.js expertise</li>
                        <li>SEO & performance optimization</li>
                        <li>Secure & scalable solutions</li>
                    </ul>
                    <a href="#" class="inline-block mt-4 text-green-600 hover:text-green-800 transition">Learn more &rarr;</a>
                </div>
            </div>
            <!-- Konstruksi -->
            <div class="flex flex-col md:flex-row items-center gap-6 py-10">
                <div class="flex-shrink-0 p-6 md:p-8 border-2 border-gray-200 dark:border-gray-700">
                    <img src="" alt="img" class="w-[300px] h-[250px] text-blue-500">
                </div>
                <div class="flex-1 p-6">
                    <h5 class="text-2xl font-semibold flex items-center gap-2">
                        Konstruksi
                    </h5>
                    <p class="mt-2 text-gray-700 dark:text-gray-200">
                        Custom web applications, e-commerce platforms, and responsive websites built with the latest technologies to drive your business forward.
                    </p>
                    <ul class="mt-3 text-sm text-gray-500 dark:text-gray-400 list-disc list-inside">
                        <li>Laravel, React, Vue.js expertise</li>
                        <li>SEO & performance optimization</li>
                        <li>Secure & scalable solutions</li>
                    </ul>
                    <a href="#" class="inline-block mt-4 text-green-600 hover:text-green-800 transition">Learn more &rarr;</a>
                </div>
            </div>
            <!-- Consultant -->
            <div class="flex flex-col md:flex-row items-center gap-6 py-10">
                <div class="flex-shrink-0 p-6 md:p-8 border-2 border-gray-200 dark:border-gray-700">
                    <img src="" alt="img" class="w-[300px] h-[250px] text-blue-500">
                </div>
                <div class="flex-1 p-6">
                    <h5 class="text-2xl font-semibold flex items-center gap-2">
                        Consultant
                    </h5>
                    <p class="mt-2 text-gray-700 dark:text-gray-200">
                        Custom web applications, e-commerce platforms, and responsive websites built with the latest technologies to drive your business forward.
                    </p>
                    <ul class="mt-3 text-sm text-gray-500 dark:text-gray-400 list-disc list-inside">
                        <li>Laravel, React, Vue.js expertise</li>
                        <li>SEO & performance optimization</li>
                        <li>Secure & scalable solutions</li>
                    </ul>
                    <a href="#" class="inline-block mt-4 text-green-600 hover:text-green-800 transition">Learn more &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
