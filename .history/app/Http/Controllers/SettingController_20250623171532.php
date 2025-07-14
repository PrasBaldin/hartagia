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

    public function updateContact()
    {
        $setting = SiteSetting::find(1);
        return view('admin.siteSetting', compact('setting'));
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required|min:8',
        ]);

        if (!password_verify($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
}
