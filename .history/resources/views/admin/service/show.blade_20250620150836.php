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
@include('components.alerts')
<div class="flex flex-col md:flex-row justify-center items-start gap-6">
    <div class="p-8 bg-white rounded-lg shadow-md w-3/4">
        <img src="{{ asset('storage/' . $service->image) }}" alt="image.jpg" class="w-full max-w-xl h-64 object-cover rounded-lg mb-6">
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
    <div class="p-8 bg-white rounded-lg shadow-md w-1/4">
        <div class="flex flex-col gap-4">
            <a href="{{ route('service.edit', $service->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300">
                <i class="fas fa-edit"></i>
                <span>Edit</span>
            </a>
            <form id="delete-form-{{ $service->id }}" action="{{ route('service.destroy', $service->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="button" class="w-full bg-red-500 hover:bg-red-700 text-white text-sm font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300" onclick="confirmDelete({{ $service->id }})">
                    <i class="fas fa-trash"></i>
                    <span>Hapus</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
