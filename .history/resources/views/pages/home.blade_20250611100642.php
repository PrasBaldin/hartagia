@extends('layouts.app')
@section('content')
<section class="bg-gray-900/50 text-white items-center">
    <!-- Background Image -->
    <div class="absolute inset-0 h-full bg-[url('/images/bg-1.jpg')] bg-cover bg-center z-[-2] max-h-[544px]"></div>
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 h-full bg-gradient-to-br from-gray-900/100 to-transparent z-[-1] max-h-[544px]"></div>

    <div class="container flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-6 md:mb-0 ">
            <div class="flex items-center h-full">
                <div class="py-[4rem] lg:py-[8rem]">
                    <h1 class="lg:text-8xl md:text-6xl text-4xl font-bold leading-tight">
                        {{ __('home.headline') }}
                    </h1>
                    <p class="mt-4">{{ __('home.subheadline') }}</p>
                    <a href="{{ url(app()->getLocale() . '/contact') }}"
                        class="btn button-primary mt-6">
                        {{ __('contact.button') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 lg:pt-[10rem] bg-gray-100">
    <div class="container">
        <div class="flex flex-col md:flex-row gap-4 justify-between items-center py-10 mb-10">
            <div class="w-full md:w-1/2">
                <h2 class="uppercase">{{ __('service.title') }}</h2>
                <p class="text-6xl lg:pr-[10rem] xl:pr-[20rem] mt-4 text-gray-900 font-bold">{{ __('service.subtitle') }}</p>
            </div>
            <div class="w-full md:w-1/2">
                <p class="mb-10">{{ __('service.description') }}</p>
                <a href="{{ url(app()->getLocale() . '/services') }}"
                    class="btn button-secondary">
                    {{ __('service.learn_more') }}
                </a>
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Pengadaan Umum -->
            <a href="#">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('images/service-1.jpg') }}" alt="{{ __('service.service1') }}" class="w-full h-[350px] object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold">{{ __('service.service1') }}</h3>
                    </div>
                </div>
            </a>

            <!-- Konstruksi -->
            <a href="#">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('images/service-2.jpg') }}" alt="{{ __('service.service2') }}" class="w-full h-[350px] object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold">{{ __('service.service2') }}</h3>
                    </div>
                </div>
            </a>

            <!-- Konsultasi Proyek -->
            <a href="#">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('images/service-3.jpg') }}" alt="{{ __('service.service3') }}" class="w-full h-[350px] object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold">{{ __('service.service3') }}</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-gray-100">
    <div class="container">
        <div class="w-full md:w-3/4">
            <h2 class="uppercase">{{ __('about.title') }}</h2>
            <p class="text-6xl md:pr-20 mt-4 font-bold">{{ __('about.subtitle') }}</p>
        </div>
        <div class="flex flex-col md:flex-row gap-20 justify-start py-10 my-10">
            <div class="w-full md:w-1/2">
                <p class="mb-10">{{ __('about.description.1') }}</p>
                <p class="mb-10">{{ __('about.description.2') }}</p>
                <a href="{{ url(app()->getLocale() . '/about') }}"
                    class="btn button-secondary">
                    {{ __('about.learn_more') }}
                </a>
            </div>
            <div class="w-full md:w-1/2">
                <img src="{{ asset('images/about.jpg') }}" alt="about.jpg" class="w-[500px] h-[450px] object-cover rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</section>

<section class="bg-green-800 text-white">
    <div class="container mx-auto py-12">
        <h1 class="text-center text-4xl font-bold mb-8">Keunggulan dalam Keandalan dan Inovasi</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <!-- Keandalan -->
            <div class="p-6 rounded-lg">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 8 4-16 3 8h4"></path>
                    </svg>
                </div>
                <h2 class="text-6xl font-semibold">Keandalan</h2>
                <p class="mt-2">Memberikan hasil yang konsisten dan dapat diandalkan bagi semua klien kami.</p>
            </div>

            <!-- Inovasi -->
            <div class="p-6 rounded-lg">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-6xl font-semibold">Inovasi</h2>
                <p class="mt-2">Menggunakan metode dan teknologi terbaru untuk meningkatkan efisiensi proyek.</p>
            </div>

            <!-- Profesionalisme -->
            <div class="p-6 rounded-lg">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-6 18h6m-6-6h6m-6-6h6m-6 6V9m6 6V9m-6 6V9m6 6V9"></path>
                    </svg>
                </div>
                <h2 class="text-6xl font-semibold">Profesionalisme</h2>
                <p class="mt-2">Tim kami terlatih dan berpengalaman dalam industri untuk memastikan setiap proyek sukses.</p>
            </div>
        </div>
    </div>
</section>

@endsection
