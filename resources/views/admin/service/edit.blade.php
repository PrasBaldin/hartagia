@extends('admin.layouts.app')

@section('breadcrumb')
    <li class="inline-flex items-center">
        <span class="mx-2 text-gray-500">/</span>
        <a href="{{ route('admin.service.index') }}" class="text-gray-500 hover:text-gray-700 transition">Layanan</a>
        <span class="mx-2 text-gray-500">/</span>
        <span class="text-gray-700">Edit Layanan</span>
    </li>
@endsection

@section('content')
    <div class="flex flex-col justify-center items-center">
        <div class="w-full bg-white backdrop-blur-md rounded-lg shadow-lg border px-4 py-8 relative overflow-hidden">
            <h2 class="text-2xl font-extrabold mb-10 text-center tracking-tight">Edit Layanan</h2>

            @include('components.alerts')

            <form action="{{ route('admin.service.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-6 p-6">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <!-- Kolom Bahasa Indonesia -->
                <div>
                    <label for="service_name_id" class="block mb-2 text-base font-semibold">Judul (Indonesia)</label>
                    <input type="text" name="service_name_id" id="service_name_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_name_id']) ? $translations['service_name_id'] : '' }}">

                    <label for="service_desc_id" class="block mt-4 mb-2 text-base font-semibold">Deskripsi (Indonesia)</label>
                    <input name="service_desc_id" id="service_desc_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_desc_id']) ? $translations['service_desc_id'] : '' }}">

                    <label for="service_point_id" class="block mt-4 mb-2 text-base font-semibold">Poin Penting (Indonesia)</label>
                    <input name="service_point_1_id" id="service_point_1_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_point_1_id']) ? $translations['service_point_1_id'] : '' }}">
                    <input name="service_point_2_id" id="service_point_2_id" class="w-full px-4 py-3 my-4 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_point_2_id']) ? $translations['service_point_2_id'] : '' }}">
                    <input name="service_point_3_id" id="service_point_3_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_point_3_id']) ? $translations['service_point_3_id'] : '' }}">

                    <label for="service_content_id" class="block mt-4 mb-2 text-base font-semibold">Konten (Indonesia)</label>
                    <textarea name="service_content_id" id="service_content_id" class="w-full min-h-[350px] px-4 py-3 border rounded-lg focus:ring-green-400">{{ isset($translations['service_content_id']) ? $translations['service_content_id'] : '' }}</textarea>
                </div>

                <!-- Kolom Bahasa Inggris -->
                <div>
                    <label for="service_name_en" class="block mb-2 text-base font-semibold">Title (English)</label>
                    <input type="text" name="service_name_en" id="service_name_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_name_en']) ? $translations['service_name_en'] : '' }}">

                    <label for="service_desc_en" class="block mt-4 mb-2 text-base font-semibold">Description (English)</label>
                    <input name="service_desc_en" id="service_desc_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_desc_en']) ? $translations['service_desc_en'] : '' }}">

                    <label for="service_point_en" class="block mt-4 mb-2 text-base font-semibold">Important Points (English)</label>
                    <input name="service_point_1_en" id="service_point_1_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_point_1_en']) ? $translations['service_point_1_en'] : '' }}">
                    <input name="service_point_2_en" id="service_point_2_en" class="w-full px-4 py-3 my-4 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_point_2_en']) ? $translations['service_point_2_en'] : '' }}">
                    <input name="service_point_3_en" id="service_point_3_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" value="{{ isset($translations['service_point_3_en']) ? $translations['service_point_3_en'] : '' }}">

                    <label for="service_content_en" class="block mt-4 mb-2 text-base font-semibold">Content (English)</label>
                    <textarea name="service_content_en" id="service_content_en" class="w-full min-h-[350px] px-4 py-3 border rounded-lg focus:ring-green-400">{{ isset($translations['service_content_en']) ? $translations['service_content_en'] : '' }}</textarea>
                </div>

                <!-- Input Gambar -->
                <div class="col-span-2">
                    <label for="image" class="block mb-2 text-base font-semibold">Gambar Layanan</label>
                    @if ($service->image)
                        <p class="my-2 text-sm">Gambar saat ini:</p>
                        <img src="{{ asset($service->image) }}" alt="Gambar Layanan" class="mt-2 mb-4 w-40 h-auto rounded-lg">
                    @endif
                    <input type="file" name="image" id="image" class="w-full border rounded-lg p-3 cursor-pointer">
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
