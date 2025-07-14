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
                        {{ __('about.headline') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mx-auto py-20">
        <div class="flex items-center justify-between flex-col md:flex-row py-20">
            <div class="mb-6 md:mb-0 max-w-full w-[400px] h-[300px] overflow-hidden relative">
                <img src="{{ asset('images/img-1.jpg') }}" alt="Logo" class="w-full h-full object-cover">
            </div>
            <div class="md:w-1/2">
                <h2 class="uppercase tracking-widest text-green-700 mb-6">{{ __('about.title') }}</h2>
                <h2 class="text-3xl font-semibold mb-6">{{ __('about.subtitle') }}</h2>
                <p class="text-lg text-gray-700 mb-4">{{ __('about.description.1') }}</p>
                <p class="text-lg text-gray-700 mb-4">{{ __('about.description.2') }}</p>
            </div>
        </div>
        <!-- <p class="text-lg text-gray-700">{{ __('about.mission') }}</p> -->
    </div>
</section>
@endsection
