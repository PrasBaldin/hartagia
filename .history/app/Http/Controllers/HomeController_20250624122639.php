<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $portfolios = Portfolio::with(['translations' => function ($query) {
            $query->whereIn('column_name', ['project_name']);
        }])->latest()->take(6)->get();

        return view('pages.home', compact('portfolios'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function portfolio()
    {
        $locale = app()->getLocale();

        $portfolios = Portfolio::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }])->paginate(9);

        return view('portfolio.index', compact('portfolios'));
    }
}
