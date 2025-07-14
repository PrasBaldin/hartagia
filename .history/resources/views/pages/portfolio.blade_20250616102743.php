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
                            {{ __('menu.portfolio') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mx-auto py-12">
        <h1 class="py-20 md:w-3/4 lg:text-7xl md:text-6xl text-4xl pr-20 font-bold leading-tight">{{ __('portfolio.headline') }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Portfolio Item 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <a href="#">
                    <img src="{{ asset('images/img-1.jpg') }}" alt="Project 1" class="w-full h-48 object-cover">
                </a>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Project One</h3>
                    <p class="text-gray-700 mb-4">Description for project one. Brief details about the project go here.</p>
                    <a href="#" class="btn button-primary mt-6">
                        {{ __('portfolio.view_details') }}
                    </a>
                </div>
            </div>
            <!-- Portfolio Item 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <a href="#">
                    <img src="{{ asset('images/portfolio2.jpg') }}" alt="Project 2" class="w-full h-48 object-cover">
                </a>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Project Two</h3>
                    <p class="text-gray-700 mb-4">Description for project two. Brief details about the project go here.</p>
                    <a href="#" class="btn button-primary mt-6">
                        {{ __('portfolio.view_details') }}
                    </a>
                </div>
            </div>
            <!-- Portfolio Item 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <a href="#">
                    <img src="{{ asset('images/portfolio3.jpg') }}" alt="Project 3" class="w-full h-48 object-cover">
                </a>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Project Three</h3>
                    <p class="text-gray-700 mb-4">Description for project three. Brief details about the project go here.</p>
                    <a href="#" class="btn button-primary mt-6">
                        {{ __('portfolio.view_details') }}
                    </a>
                </div>
            </div>
            <!-- Portfolio Item 4 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <a href="#">
                    <img src="{{ asset('images/portfolio4.jpg') }}" alt="Project 4" class="w-full h-48 object-cover">
                </a>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Project Four</h3>
                    <p class="text-gray-700 mb-4">Description for project four. Brief details about the project go here.</p>
                    <a href="#" class="btn button-primary mt-6">
                        {{ __('portfolio.view_details') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
