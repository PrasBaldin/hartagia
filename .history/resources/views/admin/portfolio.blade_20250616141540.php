@extends('admin.layouts.adminApp')

@section('content')
<h2 class="text-3xl font-extrabold mb-8 text-center text-blue-700">Tambah Portfolio</h2>
<div class="card">
    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data" class="bg-gradient-to-br from-blue-50 to-white p-10 rounded-2xl shadow-xl max-w-xl mx-auto space-y-7 border border-blue-100">
        @csrf
        <div>
            <label class="block mb-2 text-sm font-semibold text-blue-700" for="title_id">Judul (Indonesia)</label>
            <input type="text" name="title_id" id="title_id" placeholder="Judul (Indonesia)" required
                class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
        </div>
        <div>
            <label class="block mb-2 text-sm font-semibold text-blue-700" for="title_en">Title (English)</label>
            <input type="text" name="title_en" id="title_en" placeholder="Title (English)" required
                class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />
        </div>
        <div>
            <label class="block mb-2 text-sm font-semibold text-blue-700" for="description_id">Deskripsi (Indonesia)</label>
            <textarea name="description_id" id="description_id" placeholder="Deskripsi (Indonesia)" required
                class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition resize-none"></textarea>
        </div>
        <div>
            <label class="block mb-2 text-sm font-semibold text-blue-700" for="description_en">Description (English)</label>
            <textarea name="description_en" id="description_en" placeholder="Description (English)" required
                class="w-full px-4 py-2 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition resize-none"></textarea>
        </div>
        <div>
            <label class="block mb-2 text-sm font-semibold text-blue-700" for="image">Gambar Portfolio</label>
            <input type="file" name="image" id="image"
                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 transition" />
        </div>
        <button type="submit"
            class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white py-3 px-4 rounded-lg font-bold shadow hover:from-blue-700 hover:to-blue-500 transition text-lg flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            Simpan
        </button>
    </form>
</div>
@endsection
