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
                            {{ __('menu.about') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mx-auto py-12">
        <h2 class="text-3xl font-bold mb-8 text-center">{{ __('menu.portfolio') }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">{{ $project->title }}</h3>
                    <p class="text-gray-700 mb-4">{{ $project->description }}</p>
                    @if($project->url)
                    <a href="{{ $project->url }}" target="_blank" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        {{ __('View Project') }}
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
