@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.portfolio')])

    <section>
        <div class="container mx-auto py-12">
            <h1 class="py-20 md:w-3/4 lg:text-7xl md:text-6xl text-4xl pr-20 font-bold leading-tight">{{ __('portfolio.headline') }}</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Portfolio Item 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-shadow duration-300 hover:shadow-2xl group">
                    <a href="#">
                        <img src="{{ asset('images/img-1.jpg') }}" alt="Project 1" class="w-full h-[200px] object-cover transition-transform duration-300 group-hover:scale-110">
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
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-shadow duration-300 hover:shadow-2xl group">
                    <a href="#">
                        <img src="{{ asset('images/portfolio2.jpg') }}" alt="Project 2" class="w-full h-[200px] object-cover transition-transform duration-300 group-hover:scale-110">
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
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-shadow duration-300 hover:shadow-2xl group">
                    <a href="#">
                        <img src="{{ asset('images/portfolio3.jpg') }}" alt="Project 3" class="w-full h-[200px] object-cover transition-transform duration-300 group-hover:scale-110">
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
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-shadow duration-300 hover:shadow-2xl group">
                    <a href="#">
                        <img src="{{ asset('images/portfolio4.jpg') }}" alt="Project 4" class="w-full h-[200px] object-cover transition-transform duration-300 group-hover:scale-110">
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
