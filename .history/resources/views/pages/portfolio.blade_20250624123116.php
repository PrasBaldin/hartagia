@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.portfolio')])

    <section>
        <div class="container mx-auto py-12">
            <h1 class="py-20 md:w-3/4 lg:text-7xl md:text-6xl text-4xl pr-20 font-bold leading-tight">{{ __('portfolio.headline') }}</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($portfolios as $item)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-shadow duration-300 hover:shadow-2xl group">
                        <a href="#">
                            <img src="{{ asset('storage/' . $item->image_1) }}" alt="{{ $item->project_name?->value }}" class="w-full h-[200px] object-cover transition-transform duration-300 group-hover:scale-110">
                        </a>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900">{{ $item->project_name?->value }}</h3>
                            <p class="text-gray-700 mb-4">{{ $item->project_desc?->value }}</p>
                            <a href="#" class="btn button-primary mt-6">
                                {{ __('portfolio.view_details') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
