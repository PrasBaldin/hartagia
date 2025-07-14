@extends('layouts.app')
@section('content')
<section class="parallax-container !static bg-gray-900/50 text-white items-center">
    <!-- Background Image -->
    <div class="parallax-bg absolute inset-0 w-[200%] h-full bg-[url('/images/bg-1.jpg')] bg-cover bg-center z-[-2] max-h-[544px]"></div>
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 h-full bg-gradient-to-br from-gray-900/100 to-transparent z-[-1] max-h-[544px]"></div>

    <div class="container flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-6 md:mb-0 ">
            <div class="flex items-center h-full">
                <div class="py-[4rem] lg:py-[8rem]">
                    <h1 class="lg:text-8xl md:text-6xl text-4xl font-bold leading-tight">
                        {{ __('home.headline') }}
                    </h1>
                    <p class="mt-4 tracking-widest">{{ __('home.subheadline') }}</p>
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
                <h2 class="uppercase tracking-widest text-green-700">{{ __('service.title') }}</h2>
                <p class="text-6xl lg:pr-[10rem] xl:pr-[20rem] mt-4 text-gray-900 font-bold">{{ __('service.subtitle') }}</p>
            </div>
            <div class="w-full md:w-1/2">
                <p class="mb-10 text-gray-700">{{ __('service.description') }}</p>
                <a href="{{ url(app()->getLocale() . '/services') }}"
                    class="btn button-secondary inline-flex items-center gap-2 hover:scale-105 transition-transform duration-200">
                    <span>{{ __('service.learn_more') }}</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Pengadaan Umum -->
            <a href="#" class="group relative block rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/service-1.jpg') }}" alt="{{ __('service.service1') }}" class="w-full h-[350px] object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-green-900/70 via-transparent to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h3 class="text-2xl font-semibold text-white drop-shadow-lg">{{ __('service.service1') }}</h3>
                    <p class="mt-2 text-white/80 hidden group-hover:block transition-all duration-300">{{ __('service.service1_desc') }}</p>
                </div>
                <span class="absolute top-4 right-4 bg-green-700 text-white px-3 py-1 rounded-full text-xs font-bold shadow">01</span>
            </a>

            <!-- Konstruksi -->
            <a href="#" class="group relative block rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/service-2.jpg') }}" alt="{{ __('service.service2') }}" class="w-full h-[350px] object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-green-900/70 via-transparent to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h3 class="text-2xl font-semibold text-white drop-shadow-lg">{{ __('service.service2') }}</h3>
                    <p class="mt-2 text-white/80 hidden group-hover:block transition-all duration-300">{{ __('service.service2_desc') }}</p>
                </div>
                <span class="absolute top-4 right-4 bg-green-700 text-white px-3 py-1 rounded-full text-xs font-bold shadow">02</span>
            </a>

            <!-- Konsultasi Proyek -->
            <a href="#" class="group relative block rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/service-3.jpg') }}" alt="{{ __('service.service3') }}" class="w-full h-[350px] object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-green-900/70 via-transparent to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h3 class="text-2xl font-semibold text-white drop-shadow-lg">{{ __('service.service3') }}</h3>
                    <p class="mt-2 text-white/80 hidden group-hover:block transition-all duration-300">{{ __('service.service3_desc') }}</p>
                </div>
                <span class="absolute top-4 right-4 bg-green-700 text-white px-3 py-1 rounded-full text-xs font-bold shadow">03</span>
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-gray-100">
    <div class="container">
        <div class="w-full md:w-3/4">
            <h2 class="uppercase tracking-widest text-green-700">{{ __('about.title') }}</h2>
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

<section class="bg-gradient-to-br from-green-900 to-green-700 text-white py-20">
    <div class="container mx-auto py-10">
        <h1 class="text-center text-6xl font-bold mb-8">{{ __('about.benefits.title') }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="p-6 rounded-lg">
                <div class="mb-4">
                    <i class="fas fa-check-circle text-4xl"></i>
                </div>
                <h2 class="text-4xl font-semibold py-4">{{ __('about.benefits.reliability_title') }}</h2>
                <p class="mt-2">{{ __('about.benefits.reliability_desc') }}</p>
            </div>
            <div class="p-6 rounded-lg">
                <div class="mb-4">
                    <i class="fas fa-lightbulb text-4xl"></i>
                </div>
                <h2 class="text-4xl font-semibold py-4">{{ __('about.benefits.innovation_title') }}</h2>
                <p class="mt-2">{{ __('about.benefits.innovation_desc') }}</p>
            </div>
            <div class="p-6 rounded-lg">
                <div class="mb-4">
                    <i class="fas fa-user-tie text-4xl"></i>
                </div>
                <h2 class="text-4xl font-semibold py-4">{{ __('about.benefits.professional_title') }}</h2>
                <p class="mt-2">{{ __('about.benefits.professional_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="py-20 bg-white relative">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row gap-4 justify-between items-center py-10 mb-10">
            <div class="w-full md:w-1/2">
                <h2 class="uppercase tracking-widest text-green-700">{{ __('portfolio.title') }}</h2>
                <p class="text-6xl lg:pr-[10rem] xl:pr-[20rem] mt-4 text-gray-900 font-bold">{{ __('portfolio.subtitle') }}</p>
            </div>
            <div class="w-full md:w-1/2">
                <p class="mb-10">{{ __('portfolio.description') }}</p>
                <a href="{{ url(app()->getLocale() . '/galleries') }}"
                    class="btn button-secondary">
                    {{ __('portfolio.view_all') }}
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/portfolio-1.jpg') }}" alt="portfolio Image 1" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('portfolio.captions.1') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/portfolio-2.jpg') }}" alt="portfolio Image 2" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('portfolio.captions.2') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/portfolio-3.jpg') }}" alt="portfolio Image 3" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('portfolio.captions.3') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/portfolio-4.jpg') }}" alt="portfolio Image 4" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('portfolio.captions.4') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/portfolio-5.jpg') }}" alt="portfolio Image 5" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('portfolio.captions.5') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/portfolio-6.jpg') }}" alt="portfolio Image 6" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('portfolio.captions.6') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Decorative shapes -->
    <div class="hidden xl:!block absolute top-20 left-20 w-32 h-32 bg-green-800/60 rounded-full z-10"></div>
    <div class="hidden xl:!block absolute top-10 left-10 w-20 h-20 bg-green-600/40 rounded-full z-10"></div>
    <div class="hidden xl:!block absolute bottom-20 right-20 w-40 h-40 bg-green-900/60 rounded-full z-10"></div>
    <div class="hidden xl:!block absolute bottom-10 right-10 w-24 h-24 bg-green-700/40 rounded-full z-10"></div>
</section>


@endsection
