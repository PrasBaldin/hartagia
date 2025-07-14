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
    <div class="w-full max-w-2xl bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl border border-green-100 p-10 relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-green-200 opacity-30 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-green-400 opacity-20 rounded-full blur-2xl"></div>
        <h2 class="text-4xl font-extrabold mb-10 text-center text-green-700 drop-shadow-lg tracking-tight">Tambah Portfolio</h2>
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-xl shadow">
            <strong>Berhasil!</strong> {{ session('success') }}
        </div>
        @endif

        @if(session('warning'))
        <div class="mb-6 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded-xl shadow">
            <strong>Peringatan!</strong> {{ session('warning') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-xl shadow">
            <strong>Kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h2 class="text-3xl font-bold text-green-700 mb-6">Tambah Portfolio</h2>

        <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-6 p-6 bg-white rounded-lg shadow-md">
            {{ csrf_field() }}

            <!-- Kolom Bahasa Indonesia -->
            <div>
                <label for="project_name_id" class="block mb-2 text-base font-semibold text-green-700">Judul (Indonesia)</label>
                <input type="text" name="project_name_id" id="project_name_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400">

                <label for="project_desc_id" class="block mt-4 mb-2 text-base font-semibold text-green-700">Deskripsi (Indonesia)</label>
                <textarea name="project_desc_id" id="project_desc_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400 resize-none"></textarea>

                <label for="project_content_id" class="block mt-4 mb-2 text-base font-semibold text-green-700">Konten (Indonesia)</label>
                <textarea name="project_content_id" id="project_content_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400 resize-none"></textarea>
            </div>

            <!-- Kolom Bahasa Inggris -->
            <div>
                <label for="project_name_en" class="block mb-2 text-base font-semibold text-green-700">Title (English)</label>
                <input type="text" name="project_name_en" id="project_name_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400">

                <label for="project_desc_en" class="block mt-4 mb-2 text-base font-semibold text-green-700">Description (English)</label>
                <textarea name="project_desc_en" id="project_desc_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400 resize-none"></textarea>

                <label for="project_content_en" class="block mt-4 mb-2 text-base font-semibold text-green-700">Content (English)</label>
                <textarea name="project_content_en" id="project_content_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400 resize-none"></textarea>
            </div>

            <!-- Input Gambar -->
            <div class="col-span-2">
                <label for="image_1" class="block mb-2 text-base font-semibold text-green-700">Gambar Portfolio</label>
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
