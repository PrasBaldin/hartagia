@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.portfolio')])

    <section>
        <div class="container mx-auto py-12 pb-20">
            <h1 class="py-20 md:w-3/4 text-4xl lg:text-6xl pr-20 font-bold leading-tight" @aos('fade-down', 200)>
                {{ __('portfolio.headline') }}
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($portfolios as $index => $portfolio)
                    @php
                        $delay = 200 + $index * 100; // Delay bertambah 100ms untuk setiap portfolio
                        $anchor = '#portfolio' . $index; // Anchor untuk AOS
                    @endphp
                    <div id="portfolio{{ $index }}">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-shadow duration-300 hover:shadow-2xl group" @aos('fade-up', $delay, $anchor, 250)>
                            <a href="{{ route('portfolio.show', ['lang' => app()->getLocale(), 'slug' => $portfolio->slug]) }}">
                                <img src="{{ asset($portfolio->image_1) }}" alt="{{ $portfolio->project_name ? $portfolio->project_name->translated_text : 'value' }}" class="w-full h-[200px] object-cover transition-transform duration-300 group-hover:scale-110">
                            </a>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2 text-gray-900">
                                    {{ $portfolio->project_name ? $portfolio->project_name->translated_text : 'value' }}
                                </h3>
                                <p class="text-gray-700 mb-4">
                                    {{ $portfolio->project_desc ? $portfolio->project_name->translated_text : 'value' }}
                                </p>
                                <a href="{{ route('portfolio.show', ['lang' => app()->getLocale(), 'slug' => $portfolio->slug]) }}" class="btn button-primary mt-6 hover:scale-105 transition-transform duration-300">
                                    {{ __('portfolio.view_details') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('components.pagination', ['paginator' => $portfolios])
        </div>
    </section>
@endsection
