@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => $service->service_name ? $service->service_name->translated_text : 'Test Service'])

    <section class="py-20">
        <div class="container">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-2/3 bg-white p-8 rounded-lg shadow-lg">
                        <img src="{{ asset($service->image) }}" alt="image.jpg" class="w-full object-cover rounded-lg mb-6">
                        <h2 class="text-4xl font-bold mb-4">{{ $service->service_name ? $service->service_name->translated_text : 'title' }}</h2>
                        @php
                            $content = isset($service->service_content) ? $service->service_content->translated_text : '';
                            $lines = explode("\n", $content);
                        @endphp
                        <div class="text-gray-700">
                            @foreach ($lines as $line)
                                <p class="mb-6">{{ trim($line) }}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 md:p-8">
                        {{-- Lihat Layanan Lainnya --}}
                        <h3 class="text-2xl font-semibold mb-4">{{ __('service.other_services') }}</h3>
                        <div class="flex flex-col gap-6">
                            @foreach ($otherServices as $otherService)
                                <a href="{{ route('service.show', ['lang' => app()->getLocale(), 'slug' => $otherService->slug]) }}" class="bg-white p-4 lg:p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                                    <div class="w-full h-48 overflow-hidden rounded mb-4">
                                        <img src="{{ asset($otherService->image) }}" alt="{{ $otherService->service_name ? $otherService->service_name->translated_text : 'title' }}" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <h4 class="text-xl font-semibold mb-2">{{ $otherService->service_name ? $otherService->service_name->translated_text : 'title' }}</h4>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
