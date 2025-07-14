@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.about')])

    <section>
        <div class="container mx-auto py-20">
            <div class="flex items-center justify-between flex-col md:flex-row gap-10">
                <div class="mb-6 md:mb-0 max-w-full w-[400px] h-[300px] overflow-hidden relative">
                    <img src="{{ asset('images/img-1.jpg') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
                <div class="md:w-1/2">
                    <h2 class="uppercase tracking-widest text-green-700 mb-6">
                        {{ __('about.title') }}
                    </h2>
                    <h2 class="text-2xl md:text-4xl font-semibold mb-6">
                        {{ __('about.subtitle') }}
                    </h2>
                    <p class="text-gray-700 mb-4">
                        {{ __('about.description.1') }}
                    </p>
                    <p class="text-gray-700 mb-4">
                        {{ __('about.description.2') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 pb-[15rem]">
        <div class="container mx-auto">
            <div class="flex flex-col items-center text-center gap-8">
                <h3 class="uppercase tracking-widest text-green-700 mb-2">
                    {{ __('about.mission.title') }}
                </h3>
                <h2 class="text-2xl md:text-4xl font-semibold mb-4">
                    {{ __('about.mission.headline') }}
                </h2>
                <p class="text-gray-700 max-w-2xl mx-auto mb-8">
                    {{ __('about.mission.description') }}
                </p>
                <div class="flex flex-col md:flex-row gap-6 justify-center">
                    <div class="bg-green-50 rounded-lg p-6 shadow hover:shadow-lg transition">
                        <span class="text-green-700 text-2xl mb-2 inline-block">
                            <i class="fas fa-shield-alt"></i>
                        </span>
                        <h4 class="font-bold mb-2">
                            {{ __('about.mission.1.title') }}
                        </h4>
                        <p class="text-gray-600">
                            {{ __('about.mission.1.description') }}
                        </p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-6 shadow hover:shadow-lg transition">
                        <span class="text-green-700 text-2xl mb-2 inline-block">
                            <i class="fas fa-smile"></i>
                        </span>
                        <h4 class="font-bold mb-2">
                            {{ __('about.mission.2.title') }}
                        </h4>
                        <p class="text-gray-600">
                            {{ __('about.mission.2.description') }}
                        </p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-6 shadow hover:shadow-lg transition">
                        <span class="text-green-700 text-2xl mb-2 inline-block">
                            <i class="fas fa-seedling"></i>
                        </span>
                        <h4 class="font-bold mb-2">
                            {{ __('about.mission.3.title') }}
                        </h4>
                        <p class="text-gray-600">
                            {{ __('about.mission.3.description') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-green-50 py-20">
        <div class="container mx-auto py-20">
            <div class="relative">
                <img src="{{ asset('images/img-2.jpg') }}" alt="img.jpg" class="w-full h-[300px] object-cover rounded-lg absolute inset-0 -top-[300px]">
            </div>
            <div class="flex flex-col items-center my-16">
                <h3 class="uppercase tracking-widest text-green-700 mb-2 w-full">
                    {{ __('about.superiority.title') }}
                </h3>
                <h2 class="text-2xl md:text-4xl font-bold mb-4 w-full">
                    {{ __('about.superiority.subtitle') }}
                </h2>
            </div>
            <div class="flex flex-col md:flex-row gap-10 justify-center">
                <div class="flex-1 bg-white rounded-lg shadow p-8 border-t-4 border-green-600">
                    <div class="flex items-center mb-4">
                        <span class="text-green-600 mr-2">
                            <i class="fas fa-check-circle"></i>
                        </span>
                        <span class="font-semibold">
                            {{ __('about.superiority.1.title') }}
                        </span>
                    </div>
                    <span class="text-4xl font-bold mb-2">
                        10+
                    </span>
                    <p class="text-gray-700 text-base">
                        {{ __('about.superiority.1.description') }}
                    </p>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow p-8 border-t-4 border-green-600">
                    <div class="flex items-center mb-4">
                        <span class="text-green-600 mr-2">
                            <i class="fas fa-check-circle"></i>
                        </span>
                        <span class="font-semibold">
                            {{ __('about.superiority.2.title') }}
                        </span>
                    </div>
                    <span class="text-4xl font-bold mb-2">
                        98%
                    </span>
                    <p class="text-gray-700 text-base">
                        {{ __('about.superiority.2.description') }}
                    </p>
                </div>
                <div class="flex-1 bg-white rounded-lg shadow p-8 border-t-4 border-green-600">
                    <div class="flex items-center mb-4">
                        <span class="text-green-600 mr-2">
                            <i class="fas fa-check-circle"></i>
                        </span>
                        <span class="font-semibold">
                            {{ __('about.superiority.3.title') }}
                        </span>
                    </div>
                    <span class="text-4xl font-bold mb-2">Profesional</span>
                    <p class="text-gray-700 text-base">
                        {{ __('about.superiority.3.description') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
