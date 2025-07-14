<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Service;
use App\Translation;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $services = Service::with('translations')->get();

        return view('admin.service', compact('services'));
    }

    public function create()
    {
        return view('admin.serviceCreate');
    }

    public function store()
    {
        return view('admin.serviceCreate');
    }

    public function edit($id)
    {
        return view('admin.serviceCreate');
    }

    public function delete($id)
    {
        return view('admin.serviceCreate');
    }
}
