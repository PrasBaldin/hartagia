@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <h1 class="text-5xl font-bold mb-2">Dashboard</h1>
        <p class="text-xl text-gray-500 mb-10">Selamat datang di halaman admin.</p>

        {{-- Weekly Stats --}}
        <div class="w-full max-w-4xl mb-10">
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-2xl font-semibold mb-4">Statistik Mingguan</h2>

                @if (count($weeklyStats) > 0)
                    <canvas id="weeklyStatsChart" width="400" height="200"></canvas>
                @else
                    <p class="text-gray-500">Belum ada data pengunjung minggu ini.</p>
                @endif
            </div>
        </div>

        @stack('scripts')

        {{-- Total Visitor --}}
        <div class="flex flex-col md:flex-row gap-6 mb-16">
            <div class="w-72 bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Visitor Hari Ini</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $visitorsToday }}</p>
            </div>
            <div class="w-72 bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Visitor Minggu Ini</h2>
                <p class="text-2xl font-bold text-green-600">{{ $visitorsThisWeek }}</p>
            </div>
            <div class="w-72 bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Visitor Bulan Ini</h2>
                <p class="text-2xl font-bold text-green-600">{{ $visitorsThisMonth }}</p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-6">
            {{-- Layanan --}}
            <a href="{{ route('admin.service.index') }}" class="bg-white rounded-lg shadow-md px-12 py-8 flex flex-col items-center w-72 hover:shadow-lg transition-shadow">
                <i class="fas fa-cog text-4xl text-teal-500 mb-4"></i>
                <div class="text-2xl font-semibold mb-1">Layanan</div>
                <span class="text-xl font-bold">
                    {{ $serviceCount ? $serviceCount : 0 }}
                </span>
            </a>
            {{-- Portofolio --}}
            <a href="{{ route('admin.portfolio.index') }}" class="bg-white rounded-lg shadow-md px-12 py-8 flex flex-col items-center w-72 hover:shadow-lg transition-shadow">
                <i class="fas fa-briefcase text-4xl text-teal-500 mb-4"></i>
                <div class="text-2xl font-semibold mb-1">Portofolio</div>
                <div class="text-xl font-bold">
                    {{ $portfolioCount ? $portfolioCount : 0 }}
                </div>
            </a>
            {{-- Pengaturan Website --}}
            <a href="{{ route('admin.setting.index') }}" class="bg-white rounded-lg shadow-md px-12 py-8 flex flex-col items-center w-72 hover:shadow-lg transition-shadow">
                <i class="fas fa-cog text-4xl text-teal-500 mb-4"></i>
                <div class="text-2xl font-semibold mb-1">Pengaturan</div>
            </a>
        </div>
    </div>
@endsection
