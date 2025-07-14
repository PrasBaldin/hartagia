@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
    <div class="text-center py-20">
        <h1 class="text-5xl font-bold text-red-600 mb-4">
            {{ __('errors404.404') }}
        </h1>
        <p class="text-xl text-gray-700 mb-6">
            {{ __('errors404.title') }}
        </p>
        <p class="text-xl text-gray-700 mb-6">
            {{ __('errors404.message') }}
        </p>
        <a href="{{ url('/') }}" class="text-blue-500 hover:underline">
            {{ __('errors404.back_to_home') }}
        </a>
    </div>
@endsection
