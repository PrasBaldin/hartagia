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
                        $caption = $portfolio->project_name ? $portfolio->project_name->translated_text : null;
                        $delay = 200 + $index * 100; // Delay bertambah 100ms untuk setiap portfolio
                        $anchor = '#portfolio' . $index; // Anchor untuk AOS
                    @endphp
                    <div id="portfolio{{ $index }}" class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" @aos('fade-up', $delay)>
                        <a href="{{ route('portfolio.show', ['lang' => app()->getLocale(), 'slug' => $portfolio->slug]) }}" class="block">
                            <img src="{{ asset($portfolio->image_1) }}" alt="{{ $caption }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110 group-hover:brightness-75">

                            <!-- Hover overlay on desktop -->
                            <div class="absolute inset-0 hidden md:flex p-4 items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/40">
                                <span class="text-white text-xl font-semibold tracking-wide">
                                    {{ $caption }}
                                </span>
                            </div>

                            <!-- Project name for mobile view -->
                            <div class="md:hidden absolute bottom-2 right-3 bg-black/60 px-2 py-1 rounded text-white text-sm font-medium">
                                {{ $caption }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- Pagination --}}
            @include('components.pagination', ['paginator' => $portfolios])
        </div>
    </section>
@endsection

{{-- linguist trigger --}}
