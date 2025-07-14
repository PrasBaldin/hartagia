@extends('admin.layouts.app')

@section('breadcrumb')
    <li class="inline-flex items-center">
        <span class="mx-2 text-gray-500">/</span>
        <a href="{{ route('portfolio.index') }}" class="text-gray-500 hover:text-gray-700 transition">Portfolio</a>
        <span class="mx-2 text-gray-500">/</span>
        <span class="text-gray-700">{{ $portfolio->project_name ? $portfolio->project_name->translated_text : '-' }}</span>
    </li>
@endsection

@section('content')
    @include('components.alerts')
    <div class="flex flex-col md:flex-row justify-center items-start gap-6">
        <div class="p-8 bg-white rounded-lg shadow-md w-3/4">
            <div class="flex flex-col mb-6">
                <!-- image utama -->
                <div class="">
                    <img src="{{ asset('storage/' . $portfolio->image_1) }}" alt="image_1.jpg" class="w-full object-cover rounded-lg">
                </div>
                <!-- image tambahan -->
                <div class="flex flex-row gap-6 justify-between items-center mt-4 scrollbar-x overflow-x-auto">
                    @for ($i = 1; $i <= 5; $i++)
                        @php $key = 'image_' . $i; @endphp
                        @if (!empty($portfolio->image_2))
                            @if (!empty($portfolio->$key))
                                <img src="{{ asset('storage/' . $portfolio->$key) }}" alt="image_{{ $i }}.jpg" class="w-1/3 min-h-[100px] object-cover rounded-lg bg-gray-200">
                            @endif
                        @endif
                    @endfor
                </div>
            </div>
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
        <div class="p-8 bg-white rounded-lg shadow-md w-1/4">
            <div class="flex flex-col gap-4">
                <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300">
                    <i class="fas fa-edit"></i>
                    <span>Edit</span>
                </a>
                <form id="delete-form-{{ $portfolio->id }}" action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="button" class="w-full bg-red-500 hover:bg-red-700 text-white text-sm font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300" onclick="confirmDelete({{ $portfolio->id }})">
                        <i class="fas fa-trash"></i>
                        <span>Hapus</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
