<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
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
