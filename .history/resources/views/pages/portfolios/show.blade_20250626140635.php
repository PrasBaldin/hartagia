@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.services')])

    <section class="py-20">
        <div class="container">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-2/3 bg-white p-8 rounded-lg shadow-lg">
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
                    <div class="w-full md:w-1/3 p-8">
                        <h3 class="text-2xl font-semibold mb-4">{{ __('portfolio.other_portfolios') }}</h3>
                        <div class="flex flex-col gap-6">
                            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                                <a href="{{ route('portfolio.show', ['lang' => $lang, 'slug' => $portfolio->slug]) }}" class="block">
                                    <img src="{{ asset('storage/' . $portfolio->image_1) }}" alt="{{ $caption->translated_text ? $caption->translated_text : 'Untitled' }}" class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">
                                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                                        <span class="text-white text-xl font-semibold tracking-wide">
                                            {{ $caption->translated_text ? $caption->translated_text : 'Untitled' }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                            @foreach ($otherPortfolios as $otherPortfolio)
                                <a href="{{ route('portfolio.show', ['lang' => app()->getLocale(), 'slug' => $otherPortfolio->slug]) }}" class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
                                    <div class="w-full overflow-hidden rounded mb-4">
                                        <img src="{{ asset('storage/' . $otherPortfolio->image_1) }}" alt="{{ $otherPortfolio->project_name ? $otherPortfolio->project_name->translated_text : 'title' }}" class="w-full object-cover hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <div class="p-4">
                                        <h4 class="text-xl font-semibold mb-2">{{ $otherPortfolio->project_name ? $otherPortfolio->project_name->translated_text : 'title' }}</h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
