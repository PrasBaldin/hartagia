@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.services')])

    <section class="py-20">
        <div class="container">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="image.jpg" class="w-full object-cover rounded-lg mb-6">
                        <h2 class="text-4xl font-bold mb-4">{{ $service->service_name ? $service->service_name->translated_text : 'title' }}</h2>
                        <p class="text-gray-600 mb-4">{{ $service->service_desc ? $service->service_desc->translated_text : 'description' }}</p>
                        <div class="text-gray-700">
                            @php
                                $content = isset($service->service_content) ? $service->service_content->translated_text : '';
                                $lines = explode("\n", $content);
                            @endphp

                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($lines as $line)
                                    <li>{{ trim($line) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex flex-col gap-4">
                            <a href="{{ route('admin.service.edit', $service->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300">
                                <i class="fas fa-edit"></i>
                                <span>Edit</span>
                            </a>
                            <form id="delete-form-{{ $service->id }}" action="{{ route('admin.service.destroy', $service->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="button" class="w-full bg-red-500 hover:bg-red-700 text-white text-sm font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300" onclick="confirmDelete({{ $service->id }})">
                                    <i class="fas fa-trash"></i>
                                    <span>{{ __('service.delete') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
