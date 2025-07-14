<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\SiteSetting;
use App\User;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting = SiteSetting::find(1);
        $users = User::find(1);
        return view('admin.siteSetting', compact('setting', 'users'));
    }

    public function store(Request $request)
    {
        $setting = SiteSetting::firstOrNew(['id' => 1]);

        $setting->fill($request->except(['_token', 'logo', 'favicon', 'partner_logos']));

        $folder = base_path('images/site_assets');
        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        // Logo
        if ($request->hasFile('logo')) {
            if (!empty($setting->logo) && file_exists(base_path($setting->logo))) {
                unlink(base_path($setting->logo));
            }

            $filename = time() . '_logo_' . str_random(12) . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($folder, $filename);
            $setting->logo = 'images/site_assets/' . $filename;
        }

        if ($request->hasFile('favicon')) {
            if (!empty($setting->favicon) && file_exists(base_path($setting->favicon))) {
                unlink(base_path($setting->favicon));
            }

            $filename = time() . '_favicon_' . str_random(12) . '.' . $request->file('favicon')->getClientOriginalExtension();
            $request->file('favicon')->move($folder, $filename);
            $setting->favicon = 'images/site_assets/' . $filename;
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

    public function updateContact(Request $request)
    {
        $setting = SiteSetting::findOrFail(1);

        $setting->fill($request->only([
            'contact_email',
            'contact_phone',
            'office_address',
            'facebook_url',
            'instagram_url',
            'tiktok_url'
        ]));
        $setting->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan.');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);


        if (!password_verify($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
}
