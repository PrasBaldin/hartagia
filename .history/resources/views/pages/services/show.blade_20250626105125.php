@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.services')])

    <section class="py-20">
        <div class="container">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="image.jpg" class="w-full object-cover rounded-lg mb-6">
                        <h2 class="text-4xl font-bold mb-4">{{ $service->service_name ? $service->service_name->translated_text : 'title' }}</h2>
                        <p class="text-gray-600 mb-4">{{ $service->service_desc ? $service->service_desc->translated_text : 'description' }}</p>
                        <div class="text-gray-700">
                            @php
                                $content = isset($service->service_content) ? $service->service_content->translated_text : '';
                                $lines = explode("\n", $content);
                            @endphp

                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($lines as $line)
                                    <li>{{ trim($line) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="w-full">
                        {{-- Lihat Layanan Lainnya --}}
                        <h3 class="text-2xl font-semibold mb-4">{{ __('services.other_services') }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($otherServices as $otherService)
                                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                                    <img src="{{ asset('storage/' . $otherService->image) }}" alt="{{ $otherService->service_name ? $otherService->service_name->translated_text : 'title' }}" class="w-full h-48 object-cover rounded mb-4">
                                    <h4 class="text-xl font-semibold mb-2">{{ $otherService->service_name ? $otherService->service_name->translated_text : 'title' }}</h4>
                                    <p class="text-gray-600 mb-4">{{ $otherService->service_desc ? $otherService->service_desc->translated_text : 'description' }}</p>
                                    <a href="{{ route('service.show', ['id' => $otherService->id]) }}" class="text-green-700 hover:text-green-500 font-bold">{{ __('services.view_details') }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
