<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            ->whereDate('visited_at', $today)
            ->count();

        // Minggu ini (mulai Senin)
        $startOfWeek = Carbon::now()->startOfWeek(); // default: Senin
        $endOfWeek = Carbon::now()->endOfWeek();     // sampai Minggu

        $visitorsThisWeek = DB::table('visitors')
            ->whereBetween('visited_at', [$startOfWeek, $endOfWeek])
            ->count();

        return view('admin.dashboard', compact('visitorsToday', 'visitorsThisWeek'));
    }
}
