@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
    <div class="text-center py-20">
        <h1 class="text-5xl font-bold text-red-600 mb-4">404</h1>
        <p class="text-xl text-gray-700 mb-6">Oops! Halaman yang kamu cari tidak ditemukan.</p>
        <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Kembali ke Beranda</a>
    </div>
@endsection
