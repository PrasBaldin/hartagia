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

<!-- Gallery Section -->
<section class="py-20 bg-white relative">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row gap-4 justify-between items-center py-10 mb-10">
            <div class="w-full md:w-1/2">
                <h2 class="uppercase">{{ __('gallery.title') }}</h2>
                <p class="text-6xl lg:pr-[10rem] xl:pr-[20rem] mt-4 text-gray-900 font-bold">{{ __('gallery.subtitle') }}</p>
            </div>
            <div class="w-full md:w-1/2">
                <p class="mb-10">{{ __('gallery.description') }}</p>
                <a href="{{ url(app()->getLocale() . '/galleries') }}"
                    class="btn button-secondary">
                    {{ __('gallery.view_all') }}
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/gallery-1.jpg') }}" alt="Gallery Image 1" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('gallery.captions.1') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/gallery-2.jpg') }}" alt="Gallery Image 2" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('gallery.captions.2') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/gallery-3.jpg') }}" alt="Gallery Image 3" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('gallery.captions.3') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/gallery-4.jpg') }}" alt="Gallery Image 4" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('gallery.captions.4') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/gallery-5.jpg') }}" alt="Gallery Image 5" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('gallery.captions.5') }}
                    </span>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                <img src="{{ asset('images/gallery-6.jpg') }}" alt="Gallery Image 6" class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                    <span class="text-white text-xl font-semibold tracking-wide">
                        {{ __('gallery.captions.6') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Decorative shapes -->
    <div class="absolute top-20 left-20 w-32 h-32 bg-green-800 rounded-full z-10"></div>
    <div class="absolute bottom-20 right-20 w-40 h-40 bg-green-900 rounded-full z-10"></div>
</section>


@endsection
