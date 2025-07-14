<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = DB::table('site_settings')->where('id', 1)->first();
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'logo', 'favicon', 'partner_logos']);

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/uploads');
            $data['logo'] = str_replace('public/', 'storage/', $logoPath);
        }

        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('public/uploads');
            $data['favicon'] = str_replace('public/', 'storage/', $faviconPath);
        }

        if ($request->hasFile('partner_logos')) {
            $paths = [];
            foreach ($request->file('partner_logos') as $file) {
                $path = $file->store('public/uploads');
                $paths[] = str_replace('public/', 'storage/', $path);
            }
            $data['partner_logos'] = json_encode($paths);
        }

        DB::table('site_settings')->updateOrInsert(
            ['id' => 1],
            array_merge($data, ['updated_at' => now()])
        );

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
