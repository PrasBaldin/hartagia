@extends('layouts.app')
@section('content')
<section class="bg-gray-900 text-white p-8 items-center">
    <div class="container flex flex-col md:flex-row ">
        <div class="md:w-1/2 mb-6 md:mb-0 md:pr-[6rem] lg:pr-[10rem]">
            <div class="flex items-center h-full">
                <div class="py-[4rem] lg:py-[8rem]">
                    <h1 class="lg:text-8xl md:text-6xl text-4xl font-bold leading-tight">
                        {{ __('home.headline') }}
                    </h1>
                    <p class="mt-4">{{ __('home.subheadline') }}</p>
                    <a href="{{ url(app()->getLocale() . '/contact') }}"
                        class="inline-block mt-2 bg-green-700 hover:bg-green-800 text-white hover:text-gray-200 hover:no-underline py-4 px-6 rounded-full transition">
                        {{ __('contact.button') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="relative md:w-1/2 md:pl-[6rem] lg:pl-[10rem]">
            <div class="flex items-center h-full relative">
                <div class="rounded-lg overflow-hidden w-full h-full md:h-[400px] lg:h-[500px] absolute top-0 z-[1]">
                    <img src="{{ asset('images/img-1.jpg') }}" alt="Skyscraper" class="w-full h-full object-cover absolute top-0">
                </div>
            </div>
        </div>



        <!-- <div class="md:w-1/2 md:pl-4">
            <img src="{{ asset('images/img-1.jpg') }}" alt="Skyscraper" class="w-full rounded-lg">
        </div> -->
    </div>
</section>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold">{{ __('home.featured_services') }}</h2>
            <p class="mt-4 text-gray-600">{{ __('home.services_description') }}</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Pengadaan Umum -->
            <div class="bg-white p-6 shadow rounded-lg">
                <img src="{{ asset('images/procurement.jpg') }}" alt="Pengadaan Umum" class="w-full h-48 object-cover rounded-lg">
                <h3 class="text-2xl font-semibold mt-4">{{ __('home.procurement') }}</h3>
            </div>

            <!-- Konstruksi -->
            <div class="bg-white p-6 shadow rounded-lg">
                <img src="{{ asset('images/construction.jpg') }}" alt="Konstruksi" class="w-full h-48 object-cover rounded-lg">
                <h3 class="text-2xl font-semibold mt-4">{{ __('home.construction') }}</h3>
            </div>

            <!-- Konsultasi Proyek -->
            <div class="bg-white p-6 shadow rounded-lg">
                <img src="{{ asset('images/consultation.jpg') }}" alt="Konsultasi Proyek" class="w-full h-48 object-cover rounded-lg">
                <h3 class="text-2xl font-semibold mt-4">{{ __('home.consultation') }}</h3>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ url(app()->getLocale() . '/services') }}"
                class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-full transition">
                {{ __('home.learn_more') }}
            </a>
        </div>
    </div>
</section>

@endsection
