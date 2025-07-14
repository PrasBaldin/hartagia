@extends('admin.layouts.adminApp')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-100 via-white to-blue-50 py-10">
    <div class="w-full max-w-2xl bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl border border-blue-100 p-10 relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-200 opacity-30 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-blue-400 opacity-20 rounded-full blur-2xl"></div>
        <h2 class="text-4xl font-extrabold mb-10 text-center text-blue-700 drop-shadow-lg tracking-tight">Tambah Portfolio</h2>
        <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            <div>
                <label class="block mb-2 text-base font-semibold text-blue-700" for="title_id">Judul (Indonesia)</label>
                <input type="text" name="title_id" id="title_id" placeholder="Judul (Indonesia)" required
                    class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition bg-blue-50/50 shadow-inner" />
            </div>
            <div>
                <label class="block mb-2 text-base font-semibold text-blue-700" for="title_en">Title (English)</label>
                <input type="text" name="title_en" id="title_en" placeholder="Title (English)" required
                    class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition bg-blue-50/50 shadow-inner" />
            </div>
            <div>
                <label class="block mb-2 text-base font-semibold text-blue-700" for="description_id">Deskripsi (Indonesia)</label>
                <textarea name="description_id" id="description_id" placeholder="Deskripsi (Indonesia)" required
                    class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition bg-blue-50/50 shadow-inner resize-none min-h-[80px]"></textarea>
            </div>
            <div>
                <label class="block mb-2 text-base font-semibold text-blue-700" for="description_en">Description (English)</label>
                <textarea name="description_en" id="description_en" placeholder="Description (English)" required
                    class="w-full px-5 py-3 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition bg-blue-50/50 shadow-inner resize-none min-h-[80px]"></textarea>
            </div>
            <div>
                <label class="block mb-2 text-base font-semibold text-blue-700" for="image">Gambar Portfolio</label>
                <input type="file" name="image" id="image"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-base file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 transition" />
            </div>
            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white py-4 px-6 rounded-xl font-bold shadow-lg hover:from-blue-700 hover:to-blue-500 transition text-xl flex items-center justify-center gap-3 ring-2 ring-blue-200 hover:ring-blue-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Simpan
            </button>
        </form>
    </div>
</div>
@endsection
