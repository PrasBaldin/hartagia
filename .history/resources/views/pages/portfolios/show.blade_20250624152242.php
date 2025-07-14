@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.services')])

    <section class="py-20">
        <div class="container">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-8">
                    <div class="shadow-md w-full md:w-3/4">
                        <div class="flex flex-col mb-6">
                            <!-- image utama -->
                            <div class="w-full rounded-lg overflow-hidden bg-gray-100 shadow">
                                <img id="mainImage" src="{{ asset('storage/' . $portfolio->image_1) }}" alt="main_image.jpg" class="w-full object-cover rounded-lg transition-opacity duration-500 opacity-100">
                            </div>
                            <!-- image tambahan -->
                            <div class="flex flex-row gap-4 justify-start items-center mt-4 scrollbar-x overflow-x-auto">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php $key = 'image_' . $i; @endphp
                                    @if (!empty($portfolio->image_2))
                                        <div class="flex-shrink-0 w-auto h-24 max-w-[165px] lg:h-28 mb-4 rounded-lg overflow-hidden bg-gray-100 shadow cursor-pointer thumbnail-container">
                                            @if (!empty($portfolio->$key))
                                                <img src="{{ asset('storage/' . $portfolio->$key) }}" alt="image_{{ $i }}.jpg" class="thumbnail-img w-full h-full object-cover rounded-lg transition hover:scale-105 duration-300 border-4 border-transparent" onclick="document.getElementById('mainImage').src = this.src">
                                            @endif
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <h2 class="text-4xl font-bold mb-4">{{ $portfolio->project_name ? $portfolio->project_name->translated_text : 'title' }}</h2>
                        <p class="text-gray-600 mb-4">{{ $portfolio->project_desc ? $portfolio->project_desc->translated_text : 'description' }}</p>
                        <div class="text-gray-700">
                            @php
                                $content = isset($portfolio->project_content) ? $portfolio->project_content->translated_text : '';
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
