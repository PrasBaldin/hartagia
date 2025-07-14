@extends('admin.layouts.app')

@section('breadcrumb')
<li class="inline-flex items-center">
    <span class="mx-2 text-gray-500">/</span>
    <a href="{{ route('portfolio.index') }}" class="text-gray-500 hover:text-gray-700 transition">Portofolio</a>
    <span class="mx-2 text-gray-500">/</span>
    <span class="text-gray-700">Edit Portofolio</span>
</li>
@endsection

@section('content')
<div class="flex flex-col justify-center items-center">
    <div class="w-full bg-white backdrop-blur-md rounded-lg shadow-lg border px-4 py-8 relative overflow-hidden">
        <h2 class="text-2xl font-extrabold mb-10 text-center tracking-tight">Edit Portofolio</h2>

        @include('components.alerts')
