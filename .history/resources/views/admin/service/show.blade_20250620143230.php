@extends('admin.layouts.app')

@section('breadcrumb')
<li class="inline-flex items-center">
    <span class="mx-2 text-gray-500">/</span>
    <a href="{{ route('service.index') }}" class="text-gray-500 hover:text-gray-700 transition">Layanan</a>
    <span class="mx-2 text-gray-500">/</span>
    <span class="text-gray-700">{{ $service->service_name ? $service->service_name->translated_text : '-' }}</span>
</li>
@endsection

@section('content')
<div class="p-8 bg-white rounded-lg shadow-md">
    <img src="{{ asset('storage/' . $service->image) }}" alt="image.jpg" class="w-full max-w-lg h-64 object-cover rounded-lg mb-6">
    <h2 class="mb-4">{{ $service->service_name ? $service->service_name->translated_text : 'title' }}</h2>
    <p class="text-gray-600 mb-4">{{ $service->service_desc ? $service->service_desc->translated_text : 'description' }}</p>
    <div class="text-gray-700">
        @php
        $content = isset($service->service_content) ? $service->service_content->translated_text : '';
        $lines = explode("\n", $content);
        @endphp

        <ul class="list-disc pl-5 space-y-1">
            @foreach($lines as $line)
            <li>{{ trim($line) }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
