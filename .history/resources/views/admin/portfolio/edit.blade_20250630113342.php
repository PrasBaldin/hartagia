@extends('admin.layouts.app')

@section('breadcrumb')
    <li class="inline-flex items-center">
        <span class="mx-2 text-gray-500">/</span>
        <a href="{{ route('admin.portfolio.index') }}" class="text-gray-500 hover:text-gray-700 transition">Portofolio</a>
        <span class="mx-2 text-gray-500">/</span>
        <span class="text-gray-700">Edit Portofolio</span>
    </li>
@endsection

@section('content')
    <div class="flex flex-col justify-center items-center">
        <div class="w-full bg-white backdrop-blur-md rounded-lg shadow-lg border px-4 py-8 relative overflow-hidden">
            <h2 class="text-2xl font-extrabold mb-10 text-center tracking-tight">Edit Portofolio</h2>

            @include('components.alerts')

            <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-6 p-6">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <!-- Kolom Bahasa Indonesia -->
                <div>
                    <label for="project_name_id" class="block mb-2 text-base font-semibold">Judul (Indonesia)</label>
                    <input type="text" name="project_name_id" id="project_name_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['project_name_id']) ? $translations['project_name_id'] : '' }}">

                    <label for="project_desc_id" class="block mt-4 mb-2 text-base font-semibold">Deskripsi (Indonesia)</label>
                    <textarea name="project_desc_id" id="project_desc_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400 resize-none">{{ isset($translations['project_desc_id']) ? $translations['project_desc_id'] : '' }}</textarea>

                    <label for="project_content_id" class="block mt-4 mb-2 text-base font-semibold">Konten (Indonesia)</label>
                    <textarea name="project_content_id" id="project_content_id" class="w-full min-h-[150px] px-4 py-3 border rounded-lg focus:ring-green-400 resize-none">{{ isset($translations['project_content_id']) ? $translations['project_content_id'] : '' }}</textarea>
                </div>

                <!-- Kolom Bahasa Inggris -->
                <div>
                    <label for="project_name_en" class="block mb-2 text-base font-semibold">Title (English)</label>
                    <input type="text" name="project_name_en" id="project_name_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['project_name_en']) ? $translations['project_name_en'] : '' }}">

                    <label for="project_desc_en" class="block mt-4 mb-2 text-base font-semibold">Description (English)</label>
                    <textarea name="project_desc_en" id="project_desc_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400 resize-none">{{ isset($translations['project_desc_en']) ? $translations['project_desc_en'] : '' }}</textarea>

                    <label for="project_content_en" class="block mt-4 mb-2 text-base font-semibold">Content (English)</label>
                    <textarea name="project_content_en" id="project_content_en" class="w-full min-h-[150px] px-4 py-3 border rounded-lg focus:ring-green-400 resize-none">{{ isset($translations['project_content_en']) ? $translations['project_content_en'] : '' }}</textarea>
                </div>

                <!-- Input Gambar -->
                <div class="col-span-2">
                    <label for="image_1" class="block mb-2 text-base font-semibold">Gambar Portofolio</label>
                    <input type="file" name="image_1" id="image_1" class="w-full border rounded-lg p-3">
                    @if ($portfolio->image_1)
                        <p class="mt-2 mb-6 text-sm">Gambar saat ini: <a href="{{ asset('storage/' . $portfolio->image_1) }}" target="_blank">Lihat</a></p>
                    @endif
                    @for ($i = 2; $i <= 5; $i++)
                        <div class="col-span-2">
                            <label for="image_{{ $i }}" class="block mb-2 text-base font-semibold">Gambar Tambahan {{ $i - 1 }}</label>
                            <input type="file" name="image_{{ $i }}" id="image_{{ $i }}" class="w-full border rounded-lg p-3">

                            @php
                                $field = 'image_' . $i;
                            @endphp

                            @if (!empty($portfolio->$field))
                                <p class="mt-2 mb-6 text-sm">Gambar saat ini:
                                    <a href="{{ asset($portfolio->$field) }}" target="_blank">Lihat</a>
                                </p>
                            @endif
                        </div>
                    @endfor
                </div>

                <!-- Tombol Submit -->
                <div class="col-span-2 text-center">
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
