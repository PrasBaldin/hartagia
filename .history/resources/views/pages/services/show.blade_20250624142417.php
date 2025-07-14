@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.services')])

    <section class="py-20">
        <div class="container">
            <h1 class="py-10 lg:py-20 md:w-3/4 text-4xl lg:text-6xl pr-20 font-bold leading-tight">{{ __('service.headline') }}</h1>
            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-8">
                    <div class="p-8 bg-white rounded-lg shadow-md w-3/4">
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
                </div>
            </div>
        </div>
    </section>
@endsection
