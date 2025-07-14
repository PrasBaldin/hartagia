@extends('admin.layouts.adminApp')

@section('content')
<h2>Tambah Portfolio</h2>
<form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title_id" placeholder="Judul (Indonesia)" required>
    <input type="text" name="title_en" placeholder="Title (English)" required>
    <textarea name="description_id" placeholder="Deskripsi (Indonesia)" required></textarea>
    <textarea name="description_en" placeholder="Description (English)" required></textarea>
    <input type="file" name="image">
    <button type="submit">Simpan</button>
</form>
@endsection
