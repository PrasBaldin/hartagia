@extends('admin.layouts.adminApp')

@section('content')
<h2 class="text-2xl font-bold mb-6">Tambah Portfolio</h2>
<form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded shadow-md max-w-lg mx-auto space-y-5">
    @csrf
    <div>
        <input type="text" name="title_id" placeholder="Judul (Indonesia)" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>
    <div>
        <input type="text" name="title_en" placeholder="Title (English)" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>
    <div>
        <textarea name="description_id" placeholder="Deskripsi (Indonesia)" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div>
    <div>
        <textarea name="description_en" placeholder="Description (English)" required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div>
    <div>
        <input type="file" name="image"
            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
    </div>
    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Simpan</button>
</form>
@endsection
