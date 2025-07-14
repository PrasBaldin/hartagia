@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => $portfolio->project_name ? $portfolio->project_name->translated_text : 'Portfolio'])

    <section class="py-20">
        <div class="container">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-2/3 bg-white p-8 rounded-lg shadow-lg">
                        <div class="flex flex-col mb-6">
                            <!-- image utama -->
                            <div class="w-full rounded-lg overflow-hidden bg-gray-100 shadow" @aos('fade-up', 200)>
                                <img id="mainImage" src="{{ asset($portfolio->image_1) }}" alt="main_image.jpg" class="w-full object-cover rounded-lg transition-opacity duration-500 opacity-100">
                            </div>
                            <!-- image tambahan -->
                            <div class="flex flex-row gap-4 justify-start items-center mt-4 scrollbar-x overflow-x-auto overflow-y-hidden">
                                {{-- Loop through images --}}
                                @for ($i = 1; $i <= 5; $i++)
                                    @php $key = 'image_' . $i; @endphp
                                    @if (!empty($portfolio->image_2))
                                        <div class="flex-shrink-0 w-auto h-24 max-w-[165px] lg:h-28 mb-4 rounded-lg overflow-hidden bg-gray-100 shadow cursor-pointer thumbnail-container" @aos('fade-up', 200 + $i * 100)>
                                            @if (!empty($portfolio->$key))
                                                <img src="{{ asset($portfolio->$key) }}" alt="image_{{ $i }}.jpg" class="thumbnail-img w-full h-full object-cover rounded-lg transition hover:scale-105 duration-300 border-4 border-transparent" onclick="document.getElementById('mainImage').src = this.src">
                                            @endif
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        <h2 class="text-4xl font-bold mb-4" @aos('fade-up', 300)>
                            {{ $portfolio->project_name ? $portfolio->project_name->translated_text : 'title' }}
                        </h2>
                        <p class="text-gray-600 mb-4" @aos('fade-up', 400)>
                            {{ $portfolio->project_desc ? $portfolio->project_desc->translated_text : 'description' }}
                        </p>
                    </div>
                    <div class="w-full md:w-1/3 md:p-8">
                        <h3 class="text-2xl font-semibold mb-4">
                            {{ __('portfolio.other_portfolios') }}
                        </h3>
                        <div class="flex flex-col gap-6">
                            @foreach ($otherPortfolios as $index => $otherPortfolio)
                                <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" @aos('fade-up', 200 + $index * 100)>
                                    <a href="{{ route('portfolio.show', ['lang' => app()->getLocale(), 'slug' => $otherPortfolio->slug]) }}" class="block">
                                        <img src="{{ asset($otherPortfolio->image_1) }}" alt="{{ $otherPortfolio->project_name ? $otherPortfolio->project_name->translated_text : 'Untitled' }}" class="w-full object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">

                                        <!-- Hover overlay on desktop -->
                                        <div class="absolute inset-0 hidden md:flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                                            <span class="text-white text-xl font-semibold tracking-wide px-2">
                                                {{ $otherPortfolio->project_name ? $otherPortfolio->project_name->translated_text : 'Untitled' }}
                                            </span>
                                        </div>

                                        <!-- Project name for mobile view -->
                                        <div class="md:hidden absolute bottom-2 right-3 bg-black/60 px-2 py-1 rounded text-white text-sm font-medium">
                                            {{ $otherPortfolio->project_name ? $otherPortfolio->project_name->translated_text : 'Untitled' }}
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
