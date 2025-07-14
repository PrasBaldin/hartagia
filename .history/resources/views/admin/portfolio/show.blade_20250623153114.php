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
                <div class="w-full h-[400px] rounded-lg overflow-hidden bg-gray-100 shadow">
                    <img id="mainImage" src="{{ asset('storage/' . $portfolio->image_1) }}" alt="main_image.jpg" class="w-full object-cover rounded-lg transition-opacity duration-500 opacity-100">
                </div>
                <!-- image tambahan -->
                <div class="flex flex-row gap-4 justify-start items-center mt-4 scrollbar-x overflow-x-auto">
                    @for ($i = 1; $i <= 5; $i++)
                        @php $key = 'image_' . $i; @endphp
                        @if (!empty($portfolio->image_2))
                            <div class="flex-shrink-0 w-auto h-24 max-w-[165px] lg:h-28 mb-4 rounded-lg overflow-hidden bg-gray-100 shadow cursor-pointer thumbnail-container">
                                @if (!empty($portfolio->$key))
                                    <img src="{{ asset('storage/' . $portfolio->$key) }}" alt="image_{{ $i }}.jpg" class="thumbnail-img w-full h-full object-cover rounded-lg transition hover:scale-105 duration-300 border-4 border-transparent" onclick="document.getElementById('mainImage').src = this.src">
                                @endif
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const mainImage = document.getElementById('mainImage');
                    const thumbnails = document.querySelectorAll('.thumbnail-container');

                    // Highlight awal
                    if (thumbnails.length) {
                        thumbnails[0].querySelector('img').classList.add('border-green-500');
                    }

                    thumbnails.forEach(container => {
                        const img = container.querySelector('img');
                        container.addEventListener('click', () => {
                            // Hindari reload jika klik gambar yang sama
                            if (mainImage.src === img.src) return;

                            // Fade out
                            mainImage.classList.add('opacity-0');

                            // Setelah 300ms, ganti src lalu fade-in
                            setTimeout(() => {
                                mainImage.src = img.src;

                                // Fade-in kembali setelah src diganti
                                mainImage.classList.remove('opacity-0');
                            }, 300);

                            // Highlight border aktif
                            document.querySelectorAll('.thumbnail-img').forEach(thumb => {
                                thumb.classList.remove('border-green-500');
                            });
                            img.classList.add('border-green-500');
                        });
                    });
                });
            </script>

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
