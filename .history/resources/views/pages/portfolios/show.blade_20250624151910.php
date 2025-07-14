@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.services')])

    <section class="py-20">
        <div class="container">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-8">
                    <div class="">
                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="image.jpg" class="w-full object-cover rounded-lg mb-6">
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
