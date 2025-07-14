@extends('admin.layouts.app')

@section('content')
    <div class="flex items-center justify-between p-6 bg-white shadow-md rounded-lg mb-6">
        <div class="text-xl font-semibold">Dashboard</div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.service.index') }}" class="text-gray-600 hover:text-gray-800 transition">Layanan</a>
            <a href="{{ route('admin.portfolio.index') }}" class="text-gray-600 hover:text-gray-800 transition">Portofolio</a>
            <a href="{{ route('admin.setting.index') }}" class="text-gray-600 hover:text-gray-800 transition">Pengaturan</a>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <h1 class="text-5xl font-bold mb-2">Dashboard</h1>
        <p class="text-xl text-gray-500 mb-10">Welcome to the admin panel.</p>
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Layanan -->
            <div class="bg-white rounded-lg shadow-md px-12 py-8 flex flex-col items-center w-72">
                <i class="fas fa-cog text-4xl text-teal-500 mb-4"></i>
                <div class="text-2xl font-semibold mb-1">Layanan</div>
                <div class="text-xl font-bold">3</div>
            </div>
            <!-- Portofolio -->
            <div class="bg-white rounded-lg shadow-md px-12 py-8 flex flex-col items-center w-72">
                <i class="fas fa-briefcase text-4xl text-teal-500 mb-4"></i>
                <div class="text-2xl font-semibold mb-1">Portofolio</div>
                <div class="text-xl font-bold">8</div>
            </div>
            <!-- Pengaturan Website -->
            <div class="bg-white rounded-lg shadow-md px-12 py-8 flex flex-col items-center w-72">
                <i class="fas fa-cog text-4xl text-teal-500 mb-4"></i>
                <div class="text-2xl font-semibold mb-1">Pengaturan</div>
            </div>
        </div>
    </div>
@endsection
