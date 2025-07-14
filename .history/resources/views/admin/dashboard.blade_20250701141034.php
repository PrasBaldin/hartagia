@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <h1 class="text-5xl font-bold mb-2">Dashboard</h1>
        <p class="text-xl text-gray-500 mb-10">Selamat datang di halaman admin.</p>
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Layanan -->
            <a href="{{ route('admin.service.index') }}" class="bg-white rounded-lg shadow-md px-12 py-8 flex flex-col items-center w-72 hover:shadow-lg transition-shadow">
                <i class="fas fa-cog text-4xl text-teal-500 mb-4"></i>
                <div class="text-2xl font-semibold mb-1">Layanan</div>
                <span class="text-xl font-bold">
                    ${{ $serviceCount ?? 0 }} <!-- Assuming $serviceCount is passed from the controller -->
                </span>
            </a>
            <!-- Portofolio -->
            <a href="{{ route('admin.portfolio.index') }}" class="bg-white rounded-lg shadow-md px-12 py-8 flex flex-col items-center w-72 hover:shadow-lg transition-shadow">
                <i class="fas fa-briefcase text-4xl text-teal-500 mb-4"></i>
                <div class="text-2xl font-semibold mb-1">Portofolio</div>
                <div class="text-xl font-bold">8</div>
            </a>
            <!-- Pengaturan Website -->
            <a href="{{ route('admin.setting.index') }}" class="bg-white rounded-lg shadow-md px-12 py-8 flex flex-col items-center w-72 hover:shadow-lg transition-shadow">
                <i class="fas fa-cog text-4xl text-teal-500 mb-4"></i>
                <div class="text-2xl font-semibold mb-1">Pengaturan</div>
            </a>
        </div>
    </div>
@endsection
