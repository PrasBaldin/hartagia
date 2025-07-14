<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Service;
use App\Portfolio;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('auth'); // Pastikan hanya user yang sudah login yang bisa mengakses
    }

    public function index()
    {
        // Hari ini
        $today = Carbon::today();
        $visitorsToday = DB::table('visitors')
            ->select(DB::raw('COUNT(DISTINCT CONCAT(ip_address, user_agent)) as total'))
            ->whereDate('visited_at', $today)
            ->value('total');

        // Minggu ini (Senin - Minggu)
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $visitorsThisWeek = DB::table('visitors')
            ->select(DB::raw('COUNT(DISTINCT CONCAT(ip_address, user_agent)) as total'))
            ->whereBetween('visited_at', [$startOfWeek, $endOfWeek])
            ->value('total');

        // Statistik mingguan per hari (untuk grafik)
        $weeklyStats = DB::table('visitors')
            ->select(
                DB::raw('DATE(visited_at) as date'),
                DB::raw('COUNT(DISTINCT CONCAT(ip_address, user_agent)) as total')
            )
            ->whereBetween('visited_at', [$startOfWeek, $endOfWeek])
            ->groupBy(DB::raw('DATE(visited_at)'))
            ->orderBy('date', 'asc')
            ->get();

        // Bulan ini (1 - 31)
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $visitorsThisMonth = DB::table('visitors')
            ->select(DB::raw('COUNT(DISTINCT CONCAT(ip_address, user_agent)) as total'))
            ->whereBetween('visited_at', [$startOfMonth, $endOfMonth])
            ->value('total');

        // Statistik bulanan per hari (untuk grafik)
        $monthlyStats = DB::table('visitors')
            ->select(
                DB::raw('DATE(visited_at) as date'),
                DB::raw('COUNT(DISTINCT CONCAT(ip_address, user_agent)) as total')
            )
            ->whereBetween('visited_at', [$startOfMonth, $endOfMonth])
            ->groupBy(DB::raw('DATE(visited_at)'))
            ->orderBy('date', 'asc')
            ->get();

        $serviceCount = Service::count();
        $portfolioCount = Portfolio::count();

        dd($weeklyStats);


        return view('admin.dashboard', compact(
            'portfolioCount',
            'serviceCount',
            'visitorsToday',
            'visitorsThisWeek',
            'weeklyStats',
            'visitorsThisMonth',
            'monthlyStats'
        ));
    }
}
