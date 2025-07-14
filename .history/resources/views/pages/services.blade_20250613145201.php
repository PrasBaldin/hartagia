@extends('layouts.app')
@section('content')
<section class="bg-gray-900/50 text-white items-center md:pb-0 min-h-[180px]">
    <!-- Background Image -->
    <div class="absolute inset-0 h-full bg-[url('/images/bg-1.jpg')] bg-cover bg-center z-[-2] max-h-[270px] sm:max-h-[282.5px] lg:max-h-[325px]"></div>
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 h-full bg-gradient-to-br from-gray-900/100 to-transparent z-[-1] max-h-[270px] sm:max-h-[282.5px] lg:max-h-[325px]"></div>

    <div class="container flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-6 md:mb-0 ">
            <div class="flex items-center h-full">
                <div class="py-[4rem] lg:py-[8rem]">
                    <div class="flex items-center text-4xl text-gray-300 space-x-2 md:pt-10 pb-10" aria-label="Breadcrumb">
                        <a href="{{ url(app()->getLocale() . '/') }}" class="hover:underline hover:text-white">
                            {{ __('menu.home') }}
                        </a>
                        <span>/</span>
                        <span class="text-white font-semibold">
                            {{ __('menu.services') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20">
    <div class="container">
        <h1 class="py-20 md:w-3/4 lg:text-7xl md:text-6xl text-4xl pr-20 font-bold leading-tight">{{ __('service.headline') }}</h1>
        <div class="flex flex-col gap-8">
            <!-- Pengadaan -->
            <div class="flex flex-col md:flex-row items-center gap-6 py-10">
                <div class="flex-shrink-0 w-full md:w-1/2 rounded-lg shadow-lg hover:shadow-xl transition duration-300 overflow-hidden">
                    <img src="{{ asset('images/service-11.jpg') }}" alt="proc.jpg" class="w-full h-[200px] md:h-[250px] object-cover hover:scale-110 transition-transform duration-500">
                </div>
                <div class="flex-1 p-6">
                    <h5 class="text-2xl font-semibold uppercase tracking-widest text-green-700 flex items-center gap-2">
                        {{ __('service.procurement.title') }}
                    </h5>
                    <p class="mt-2">
                        {{ __('service.procurement.description') }}
                    </p>
                    <ul class="mt-3 list-disc list-inside">
                        <li>{{ __('service.procurement.points.1') }}</li>
                        <li>{{ __('service.procurement.points.2') }}</li>
                        <li>{{ __('service.procurement.points.3') }}</li>
                    </ul>
                    <a href="{{ url(app()->getLocale() . '/services/#') }}"
                        class="btn button-secondary mt-6 items-center gap-2 hover:scale-105 transition-transform duration-200">
                        <span>{{ __('service.learn_more') }}</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- Konstruksi -->
            <div class="flex flex-col md:flex-row items-center gap-6 py-10">
                <div class="flex-shrink-0 w-full md:w-1/2 rounded-lg shadow-lg hover:shadow-xl transition duration-300 overflow-hidden">
                    <img src="{{ asset('images/service-21.jpg') }}" alt="construction.jpg" class="w-full h-[200px] md:h-[250px] object-cover hover:scale-110 transition-transform duration-500">
                </div>
                <div class="flex-1 p-6">
                    <h5 class="text-2xl font-semibold uppercase tracking-widest text-green-700 flex items-center gap-2">
                        {{ __('service.construction.title') }}
                    </h5>
                    <p class="mt-2">
                        {{ __('service.construction.description') }}
                    </p>
                    <ul class="mt-3 list-disc list-inside">
                        <li>{{ __('service.construction.points.1') }}</li>
                        <li>{{ __('service.construction.points.2') }}</li>
                        <li>{{ __('service.construction.points.3') }}</li>
                    </ul>
                    <a href="{{ url(app()->getLocale() . '/services/#') }}"
                        class="btn button-secondary mt-6 items-center gap-2 hover:scale-105 transition-transform duration-200">
                        <span>{{ __('service.learn_more') }}</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <!-- Consultant -->
            <div class="flex flex-col md:flex-row items-center gap-6 py-10">
                <div class="flex-shrink-0 w-full md:w-1/2 rounded-lg shadow-lg hover:shadow-xl transition duration-300 overflow-hidden">
                    <img src="{{ asset('images/service-3.jpg') }}" alt="consultant.jpg" class="w-full h-[200px] md:h-[250px] object-cover hover:scale-110 transition-transform duration-500">
                </div>
                <div class="flex-1 p-6">
                    <h5 class="text-2xl font-semibold uppercase tracking-widest text-green-700 flex items-center gap-2">
                        {{ __('service.consultation.title') }}
                    </h5>
                    <p class="mt-2">
                        {{ __('service.consultation.description') }}
                    </p>
                    <ul class="mt-3 list-disc list-inside">
                        <li>{{ __('service.consultation.points.1') }}</li>
                        <li>{{ __('service.consultation.points.2') }}</li>
                        <li>{{ __('service.consultation.points.3') }}</li>
                    </ul>
                    <a href="{{ url(app()->getLocale() . '/services/#') }}"
                        class="btn button-secondary mt-6 items-center gap-2 hover:scale-105 transition-transform duration-200">
                        <span>{{ __('service.learn_more') }}</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
