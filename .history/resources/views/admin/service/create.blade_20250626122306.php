@extends('admin.layouts.app')

@section('breadcrumb')
    <li class="inline-flex items-center">
        <span class="mx-2 text-gray-500">/</span>
        <a href="{{ route('admin.service.index') }}" class="text-gray-500 hover:text-gray-700 transition">Layanan</a>
        <span class="mx-2 text-gray-500">/</span>
        <span class="text-gray-700">Tambah Layanan</span>
    </li>
@endsection

@section('content')
    <div class="flex flex-col justify-center items-center">
        <div class="w-full bg-white backdrop-blur-md rounded-lg shadow-lg border px-4 py-8 relative overflow-hidden">
            <h2 class="text-2xl font-extrabold mb-10 text-center tracking-tight">Tambah Layanan</h2>

            @include('components.alerts')

            <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-6 p-6">
                {{ csrf_field() }}
                <!-- Kolom Bahasa Indonesia -->
                <div>
                    <label for="service_name_id" class="block mb-2 text-base font-semibold">Judul (Indonesia)</label>
                    <input type="text" name="service_name_id" id="service_name_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Nama Layanan ...">

                    <label for="service_desc_id" class="block mt-4 mb-2 text-base font-semibold">Deskripsi (Indonesia)</label>
                    <input name="service_desc_id" id="service_desc_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Deskripsi Layanan ...">

                    <label for="service_point_id" class="block mt-4 mb-2 text-base font-semibold">Poin Penting (Indonesia)</label>
                    <input name="service_point_1_id" id="service_point_1_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Poin 1 ...">
                    <input name="service_point_2_id" id="service_point_2_id" class="w-full px-4 py-3 my-4 border rounded-lg focus:ring-green-400" placeholder="Poin 2 ...">
                    <input name="service_point_3_id" id="service_point_3_id" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Poin 3 ...">

                    <label for="service_content_id" class="block mt-4 mb-2 text-base font-semibold">Konten (Indonesia)</label>
                    <textarea name="service_content_id" id="service_content_id" class="w-full min-h-[350px] px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Tulis isi konten di sini ..."></textarea>
                </div>

                <!-- Kolom Bahasa Inggris -->
                <div>
                    <label for="service_name_en" class="block mb-2 text-base font-semibold">Title (English)</label>
                    <input type="text" name="service_name_en" id="service_name_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Service Name ...">

                    <label for="service_desc_en" class="block mt-4 mb-2 text-base font-semibold">Description (English)</label>
                    <input name="service_desc_en" id="service_desc_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Service Description ...">

                    <label for="service_point_en" class="block mt-4 mb-2 text-base font-semibold">Important Points (English)</label>
                    <input name="service_point_1_en" id="service_point_1_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Point 1 ...">
                    <input name="service_point_2_en" id="service_point_2_en" class="w-full px-4 py-3 my-4 border rounded-lg focus:ring-green-400" placeholder="Point 2 ...">
                    <input name="service_point_3_en" id="service_point_3_en" class="w-full px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Point 3 ...">

                    <label for="service_content_en" class="block mt-4 mb-2 text-base font-semibold">Content (English)</label>
                    <textarea name="service_content_en" id="service_content_en" class="w-full min-h-[350px] px-4 py-3 border rounded-lg focus:ring-green-400" placeholder="Write content here ..."></textarea>
                </div>

                <!-- Input Gambar -->
                <div class="col-span-2">
                    <label for="image" class="block mb-2 text-base font-semibold">Gambar Layanan</label>
                    <input type="file" name="image" id="image" class="w-full border rounded-lg p-3">
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
