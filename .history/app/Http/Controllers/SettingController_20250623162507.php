<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\SiteSetting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting = SiteSetting::find(1);
        return view('setting', compact('setting'));
    }

    public function edit()
    {
        $setting = SiteSetting::find(1);
        return view('setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SiteSetting::firstOrNew(['id' => 1]);

        $setting->fill($request->except(['_token', 'logo', 'favicon', 'partner_logos']));

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/uploads');
            $setting->logo = str_replace('public/', 'storage/', $path);
        }

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('public/uploads');
            $setting->favicon = str_replace('public/', 'storage/', $path);
        }

        if ($request->hasFile('partner_logos')) {
            $paths = [];
            foreach ($request->file('partner_logos') as $file) {
                $paths[] = str_replace('public/', 'storage/', $file->store('public/uploads'));
            }
            $setting->partner_logos = $paths;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
