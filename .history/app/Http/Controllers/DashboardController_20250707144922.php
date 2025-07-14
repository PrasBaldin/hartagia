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
            ->whereBetween('visited_at', [$startOfMonth, $endOfMonth])
            ->get()
            ->map(function ($item) {
                return $item->ip_address . '|' . $item->user_agent;
            })
            ->unique()
            ->count();


        // Statistik bulanan per hari
        $monthlyStats = DB::table('visitors')
            ->select(
                DB::raw('DATE(visited_at) as date'),
                DB::raw('COUNT(DISTINCT CONCAT(ip_address, user_agent)) as total')
            )
            ->whereBetween('visited_at', [$startOfMonth, $endOfMonth])
            ->groupBy(DB::raw('DATE(visited_at)'))
            ->orderBy('date', 'asc')
            ->get();

        // Kelompokkan statistik bulanan berdasarkan minggu ke-n
        $groupedMonthlyStats = [];

        foreach ($monthlyStats as $stat) {
            $date = Carbon::parse($stat->date);
            $weekOfMonth = ceil($date->day / 7);

            $startOfWeek = $date->copy()->startOfWeek(Carbon::MONDAY);
            $endOfWeek = $date->copy()->endOfWeek(Carbon::SUNDAY);

            $label = $startOfWeek->format('j M') . ' – ' . $endOfWeek->format('j M');

            if (!isset($groupedMonthlyStats[$label])) {
                $groupedMonthlyStats[$label] = 0;
            }

            $groupedMonthlyStats[$label] += $stat->total;
        }

        $monthlyStatsByWeek = [];

        foreach ($groupedMonthlyStats as $label => $total) {
            $monthlyStatsByWeek[] = [
                'week' => $label,
                'total' => $total
            ];
        }

        // hitung seluruh total pengunjung
        // jika di tanggal yang sama, maka hanya dihitung sekali
        $totalVisitors = DB::table('visitors')
            ->get()
            ->map(function ($item) {
                return $item->ip_address . '|' . $item->user_agent;
            })
            ->unique()
            ->count();

        // total unique visitor per hari yang dihitung bulanan
        $totalVisitorPerDay = DB::table('visitors')
            ->select(
                DB::raw('DATE(visited_at) as date'),
                DB::raw('COUNT(DISTINCT CONCAT(ip_address, user_agent)) as total')
            )
            ->groupBy(DB::raw('DATE(visited_at)'))
            ->orderBy('date', 'asc')
            ->get();

        $totalVisitorCount = $totalVisitorPerDay->sum('total');

        // Data untuk jumlah layanan dan portofolio
        $serviceCount = Service::count();
        $portfolioCount = Portfolio::count();

        return view('admin.dashboard', compact(
            'portfolioCount',
            'serviceCount',
            'visitorsToday',
            'visitorsThisWeek',
            'visitorsThisMonth',
            'weeklyStats',
            'monthlyStats',
            'totalVisitors',
            'totalVisitorCount'
        ))->with('monthlyStatsByWeek', $monthlyStatsByWeek);
    }
}
