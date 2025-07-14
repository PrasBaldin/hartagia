@extends('admin.layouts.app')

@section('breadcrumb')
<li class="inline-flex items-center">
    <span class="mx-2 text-gray-500">/</span>
    <a href="{{ route('admin.portfolio') }}" class="text-gray-500 hover:text-gray-700 transition">Portofolio</a>
    <span class="mx-2 text-gray-500">/</span>
    <span class="text-gray-700">Tambah Portofolio</span>
</li>
@endsection

@section('content')
<div class="flex flex-col justify-center items-center">
    <div class="w-full bg-white backdrop-blur-md rounded-lg shadow-lg border px-4 py-8 relative overflow-hidden">
        <h2 class="text-2xl font-extrabold mb-10 text-center tracking-tight">Tambah Portfolio</h2>

        @include('components.alerts')

        <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-6 p-6">
            {{ csrf_field() }}
            <!-- Kolom Bahasa Indonesia -->
            <div>
                <label for="project_name_id" class="block mb-2 text-base font-semibold">Judul (Indonesia)</label>
                <input type="text" name="project_name_id" id="project_name_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400">

                <label for="project_desc_id" class="block mt-4 mb-2 text-base font-semibold">Deskripsi (Indonesia)</label>
                <textarea name="project_desc_id" id="project_desc_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400 resize-none"></textarea>

                <label for="project_content_id" class="block mt-4 mb-2 text-base font-semibold">Konten (Indonesia)</label>
                <textarea name="project_content_id" id="project_content_id" class="w-full min-h-[150px] px-4 py-3 border rounded-lg focus:ring-green-400 resize-none"></textarea>
            </div>

            <!-- Kolom Bahasa Inggris -->
            <div>
                <label for="project_name_en" class="block mb-2 text-base font-semibold">Title (English)</label>
                <input type="text" name="project_name_en" id="project_name_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400">

                <label for="project_desc_en" class="block mt-4 mb-2 text-base font-semibold">Description (English)</label>
                <textarea name="project_desc_en" id="project_desc_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400 resize-none"></textarea>

                <label for="project_content_en" class="block mt-4 mb-2 text-base font-semibold">Content (English)</label>
                <textarea name="project_content_en" id="project_content_en" class="w-full min-h-[150px] px-4 py-3 border rounded-lg focus:ring-green-400 resize-none"></textarea>
            </div>

            <!-- Input Gambar -->
            <div class="col-span-2">
                <label for="image_1" class="block mb-2 text-base font-semibold">Gambar Portfolio</label>
                <input type="file" name="image_1" id="image_1" class="w-full border rounded-lg p-3">
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
