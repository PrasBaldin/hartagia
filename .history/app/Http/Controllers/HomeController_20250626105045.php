<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Service;

class HomeController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();

        $services = Service::with(['translations' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])->get();

        $portfolios = Portfolio::with(['translations' => function ($query) {
            $query->whereIn('column_name', ['project_name']);
        }])->latest()->take(6)->get();

        return view('pages.home', compact('portfolios', 'services'));
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
    public function serviceShow($lang, $slug)
    {
        $locale = app()->getLocale();

        $service = Service::with(['translations' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])->where('slug', $slug)->firstOrFail();

        // other services
        $otherServices = Service::with(['translations' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])->where('slug', '!=', $slug)->latest()->take(3)->get();

        return view('pages.services.show', compact('service', 'otherServices'));
    }

    public function portfolio()
    {
        $locale = app()->getLocale();

        $portfolios = Portfolio::with(['translations' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])->paginate(9);

        return view('pages.portfolios.index', compact('portfolios'));
    }

    public function portfolioShow($lang, $slug)
    {
        $locale = app()->getLocale();

        $portfolio = Portfolio::with(['translations' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])->where('slug', $slug)->firstOrFail();

        return view('pages.portfolios.show', compact('portfolio'));
    }
}
