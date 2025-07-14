@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <h1 class="text-5xl font-bold mb-2">Dashboard</h1>
        <p class="text-xl text-gray-500 mb-10">Selamat datang di halaman admin.</p>

        {{-- Total Visitor --}}

        <p class="text-lg text-gray-600 mb-4">Total Pengunjung Seluruh Waktu: <span class="font-bold text-green-600">{{ $totalVisitorCount }}</span></p>

        <div class="flex flex-col md:flex-row gap-6 w-full max-w-4xl mb-4">
            <div class="w-72 bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Pengunjung Hari Ini</h2>
                <p class="text-2xl font-bold text-green-600">{{ $visitorsToday }}</p>
            </div>
            <div class="w-72 bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Pengunjung Minggu Ini</h2>
                <p class="text-2xl font-bold text-green-600">{{ $visitorsThisWeek }}</p>
            </div>
            <div class="w-72 bg-white p-4 rounded shadow">
                <h2 class="text-lg font-semibold">Pengunjung Bulan Ini</h2>
                <p class="text-2xl font-bold text-green-600">{{ $visitorsThisMonth }}</p>
            </div>
        </div>

        {{-- Weekly Stats --}}
        <div x-data="{ open: true }" class="w-full max-w-4xl mb-4">
            <div class="bg-white p-6 rounded shadow">
                <button @click="open = !open" class="text-left w-full text-2xl font-semibold mb-4 flex justify-between items-center">
                    Statistik Mingguan
                    <span x-text="open ? '−' : '+'"></span>
                </button>

                <div x-show="open" x-transition>
                    @if (count($weeklyStats) > 0)
                        <canvas id="weeklyStatsChart" width="400" height="200"></canvas>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var weeklyStats = {!! json_encode($weeklyStats) !!};
                                const ctx = document.getElementById('weeklyStatsChart').getContext('2d');

                                new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: weeklyStats.map(stat => {
                                            const date = new Date(stat.date);
                                            return date.toLocaleDateString('id-ID', {
                                                weekday: 'short',
                                                day: 'numeric',
                                                month: 'short'
                                            });
                                        }),
                                        datasets: [{
                                            label: 'Jumlah Pengunjung',
                                            data: weeklyStats.map(stat => stat.total),
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderWidth: 2,
                                            tension: 0.3,
                                            pointRadius: 4,
                                            pointHoverRadius: 6
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        plugins: {
                                            legend: {
                                                display: true,
                                                position: 'top'
                                            },
                                            tooltip: {
                                                mode: 'index',
                                                intersect: false
                                            }
                                        },
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                min: 0,
                                                max: 10,
                                                ticks: {
                                                    stepSize: 1,
                                                    callback: function(value) {
                                                        return Number.isInteger(value) ? value : null;
                                                    }
                                                },
                                                title: {
                                                    display: true,
                                                    text: 'Jumlah Pengunjung'
                                                }
                                            },
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Tanggal'
                                                }
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    @else
                        <p class="text-gray-500">Belum ada data pengunjung minggu ini.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Monthly Stats --}}
        <div x-data="{ open: true }" class="w-full max-w-4xl mb-10">
            <div class="bg-white p-6 rounded shadow">
                <button @click="open = !open" class="text-left w-full text-2xl font-semibold mb-4 flex justify-between items-center">
                    Statistik Bulanan
                    <span x-text="open ? '−' : '+'"></span>
                </button>

                <div x-show="open" x-transition>
                    @if (count($monthlyStatsByWeek) > 0)
                        <canvas id="monthlyStatsChart" width="400" height="200"></canvas>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var monthlyStats = {!! json_encode($monthlyStatsByWeek) !!};
                                const ctx = document.getElementById('monthlyStatsChart').getContext('2d');

                                new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: monthlyStats.map(stat => stat.week),
                                        datasets: [{
                                            label: 'Jumlah Pengunjung',
                                            data: monthlyStats.map(stat => stat.total),
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderWidth: 2,
                                            tension: 0.3,
                                            pointRadius: 4,
                                            pointHoverRadius: 6
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        plugins: {
                                            legend: {
                                                display: true,
                                                position: 'top'
                                            },
                                            tooltip: {
                                                mode: 'index',
                                                intersect: false
                                            }
                                        },
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                min: 0,
                                                max: 10,
                                                ticks: {
                                                    stepSize: 1,
                                                    callback: function(value) {
                                                        return Number.isInteger(value) ? value : null;
                                                    }
                                                },
                                                title: {
                                                    display: true,
                                                    text: 'Jumlah Pengunjung'
                                                }
                                            },
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Tanggal'
                                                }
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    @else
                        <p class="text-gray-500">Belum ada data pengunjung Bulan ini.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Subtitle --}}
        <div class="mb-4 w-full max-w-4xl">
            <h2 class="text-3xl font-bold mb-0">Kelola Konten Website</h2>
            <p class="text-lg text-gray-600">Akses berbagai fitur untuk mengelola website Anda.</p>
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
