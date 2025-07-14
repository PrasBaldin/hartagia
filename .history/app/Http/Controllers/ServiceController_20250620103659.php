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

        return view('admin.services', compact('services'));
    }

    public function create()
    {
        return view('admin.serviceCreate');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_name_id' => 'required|string|max:255',
            'service_name_en' => 'required|string|max:255',
            'service_desc_id' => 'required|string',
            'service_desc_en' => 'required|string',
            'service_content_id' => 'required|string',
            'service_content_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $imagePath = null;

        try {
            // Simpan gambar hanya jika validasi berhasil
            if ($request->hasFile('image')) {
                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs('service_images', $filename, 'public');
            }

            // Simpan data utama layanan
            $service = Service::create([
                'image' => $imagePath
            ]);

            // Simpan terjemahan ke tabel translations
            Translation::insert([
                ['table_name' => 'services', 'column_name' => 'service_name', 'row_id' => $service->id, 'language' => 'id', 'translated_text' => $request->service_name_id],
                ['table_name' => 'services', 'column_name' => 'service_name', 'row_id' => $service->id, 'language' => 'en', 'translated_text' => $request->service_name_en],
                ['table_name' => 'services', 'column_name' => 'service_desc', 'row_id' => $service->id, 'language' => 'id', 'translated_text' => $request->service_desc_id],
                ['table_name' => 'services', 'column_name' => 'service_desc', 'row_id' => $service->id, 'language' => 'en', 'translated_text' => $request->service_desc_en],
                ['table_name' => 'services', 'column_name' => 'service_content', 'row_id' => $service->id, 'language' => 'id', 'translated_text' => $request->service_content_id],
                ['table_name' => 'services', 'column_name' => 'service_content', 'row_id' => $service->id, 'language' => 'en', 'translated_text' => $request->service_content_en]
            ]);

            return redirect()->route('admin.service')->with('success', 'Layanan berhasil ditambahkan!');
        } catch (\Exception $e) {
            \Log::error('Error saat menyimpan layanan: ' . $e->getMessage());

            // Jika terjadi error, hapus gambar yang sudah terupload
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            return back()->withErrors(['error' => 'Gagal menyimpan data.'])->withInput();
        }
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
