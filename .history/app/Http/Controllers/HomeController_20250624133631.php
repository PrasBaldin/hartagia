<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Service;

class HomeController extends Controller
{
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

    public function contact()
    {
        return view('pages.contact');
    }

    public function services()
    {
        $locale = app()->getLocale();

        $services = Service::with(['translations' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])->get();

        return view('pages.services.index', compact('services'));
    }

    // View for single service
    public function service($id)
    {
        $locale = app()->getLocale();

        $service = Service::with(['translations' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])->findOrFail($id);

        return view('pages.serviceDetail', compact('service'));
    }

    public function portfolio()
    {
        $locale = app()->getLocale();

        $portfolios = Portfolio::with(['translations' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])->paginate(1);

        return view('pages.portfolio', compact('portfolios'));
    }
}
