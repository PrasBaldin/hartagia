@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => $service->service_name ? $service->service_name->translated_text : 'Service'])

    <section class="py-20">
        <div class="container">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <div id="serviceContent" class="w-full md:w-2/3 bg-white p-8 rounded-lg shadow-lg" @aos('fade-up', 200, '#serviceContent')>
                        <img src="{{ asset($service->image) }}" alt="image.jpg" class="w-full object-cover rounded-lg mb-6" @aos('fade-up', 300, '#serviceContent')>

                        {{-- Judul Layanan --}}
                        <h2 class="text-4xl font-bold mb-4" @aos('fade-up', 400, '#serviceContent')>
                            {{ $service->service_name ? $service->service_name->translated_text : 'title' }}
                        </h2>
                        @php
                            $content = isset($service->service_content) ? $service->service_content->translated_text : '';
                            $lines = explode("\n", $content);
                        @endphp
                        <div class="text-gray-700">
                            @foreach ($lines as $index => $line)
                                @php
                                    $delay = 400 + $index * 100; // Delay bertambah 100ms untuk setiap baris
                                @endphp
                                <p class="mb-6" @aos('fade-up', $delay, '#serviceContent')>
                                    {{ trim($line) }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 md:p-8">
                        {{-- Lihat Layanan Lainnya --}}
                        <h3 class="text-2xl font-semibold mb-4" @aos('fade-up', 200)>
                            {{ __('service.other_services') }}
                        </h3>
                        <div class="flex flex-col gap-6">
                            @foreach ($otherServices as $index => $otherService)
                                @php
                                    $delay = 200 + $index * 100; // Delay bertambah 100ms untuk setiap layanan
                                @endphp
                                <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" @aos('fade-up', $delay)>
                                    <a href="{{ route('service.show', ['lang' => app()->getLocale(), 'slug' => $otherService->slug]) }}" class="block">
                                        <img src="{{ asset($otherService->image) }}" alt="{{ $otherService->service_name ? $otherService->service_name->translated_text : 'title' }}" class="w-full object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">

                                        <!-- Hover overlay on desktop -->
                                        <div class="absolute inset-0 hidden md:flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                                            <span class="text-white text-sm lg:text-xl font-semibold tracking-wide p-4">
                                                {{ $otherService->service_name ? $otherService->service_name->translated_text : 'Untitled' }}
                                            </span>
                                        </div>

                                        <!-- Project name for mobile view -->
                                        <div class="md:hidden absolute bottom-2 right-3 bg-black/60 px-2 py-1 rounded text-white text-sm font-medium">
                                            {{ $otherService->service_name ? $otherService->service_name->translated_text : 'Untitled' }}
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
