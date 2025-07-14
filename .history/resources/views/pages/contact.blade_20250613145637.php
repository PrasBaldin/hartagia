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
                            {{ __('menu.contact') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="flex items-center justify-between flex-col md:flex-row gap-10 py-20">
            <div class="mb-6 md:mb-0 max-w-full w-[400px] h-[300px] overflow-hidden relative">
                <img src="{{ asset('images/img-1.jpg') }}" alt="Logo" class="w-full h-full object-cover">
            </div>
            <div class="md:w-1/2">
                <h2 class="uppercase tracking-widest text-green-700 mb-6">{{ __('contact.title') }}</h2>
                <h2 class="text-6xl font-semibold mb-6">{{ __('contact.subtitle') }}</h2>
                <p class="text-gray-700 mb-4">{{ __('contact.description.1') }}</p>
                <p class="text-gray-700 mb-4">{{ __('contact.description.2') }}</p>
            </div>
        </div>
    </div>
</section>

@endsection
