@extends('layouts.app')
@section('content')
<section class="bg-gray-900 text-white p-8 items-center">
    <div class="container flex flex-col md:flex-row ">
        <div class="md:w-1/2 mb-6 md:mb-0 md:pr-4">
            <h1 class="lg:text-8xl md:text-6xl text-4xl font-bold leading-tight">
                {{ __('home.headline') }}
            </h1>
            <p class="mt-4">{{ __('home.subheadline') }}</p>
            <a href="{{ url(app()->getLocale() . '/contact') }}"
                class="inline-block mt-2 bg-green-700 hover:bg-green-800 text-white hover:text-gray-200 hover:no-underline py-4 px-6 rounded-full transition">
                {{ __('contact.button') }}
            </a>
        </div>
        <div class="md:w-1/2 md:pl-4">
            <img src="{{ asset('images/img-1.jpg') }}" alt="Skyscraper" class="w-full rounded-lg">
        </div>
    </div>
</section>
@endsection
