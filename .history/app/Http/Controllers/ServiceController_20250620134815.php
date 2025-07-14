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

        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
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

            return redirect()->route('service.index')->with('success', 'Layanan berhasil ditambahkan!');
        } catch (\Exception $e) {
            // \Log::error('Error saat menyimpan layanan: ' . $e->getMessage());
            \Log::error("Exception: {$e->getMessage()} \nTrace: {$e->getTraceAsString()}");


            // Jika terjadi error, hapus gambar yang sudah terupload
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            return back()->withErrors(['error' => 'Gagal menyimpan data.'])->withInput();
        }
    }

    public function edit($id)
    {
        // Validasi apakah layanan dengan ID tersebut ada
        $service = Service::findOrFail($id);

        // Ambil terjemahan terkait layanan ini
        $translations = Translation::where('table_name', 'services')
            ->where('row_id', $id)
            ->get();

        // Buat array untuk menyimpan terjemahan dengan key 'column_name_language'
        $translationMap = [];
        foreach ($translations as $t) {
            $key = $t->column_name . '_' . $t->language;
            $translationMap[$key] = $t->translated_text;
        }

        return view('admin.service.edit', [
            'service' => $service,
            'translations' => $translationMap
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'service_name_id' => 'required|string|max:255',
            'service_name_en' => 'required|string|max:255',
            'service_desc_id' => 'required|string',
            'service_desc_en' => 'required|string',
            'service_content_id' => 'required|string',
            'service_content_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Validasi apakah layanan dengan ID tersebut ada
        $service = Service::findOrFail($id);
        // Ambil path gambar lama
        $imagePath = $service->image;

        try {
            // Jika ada gambar baru yang diupload, hapus gambar lama dan simpan yang baru
            if ($request->hasFile('image')) {
                if ($imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }

                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs('service_images', $filename, 'public');
            }

            $service->update(['image' => $imagePath]);

            $columns = [
                'service_name' => ['id' => $request->input('service_name_id'), 'en' => $request->input('service_name_en')],
                'service_desc' => ['id' => $request->input('service_desc_id'), 'en' => $request->input('service_desc_en')],
                'service_content' => ['id' => $request->input('service_content_id'), 'en' => $request->input('service_content_en')],
            ];

            // Loop melalui setiap kolom dan bahasa
            foreach ($columns as $column => $langs) {
                foreach ($langs as $lang => $text) {
                    $existing = Translation::where('table_name', 'services')
                        ->where('column_name', $column)
                        ->where('row_id', $service->id)
                        ->where('language', $lang)
                        ->first();

                    if ($existing) {
                        $existing->translated_text = $text;
                        $existing->save();
                    } else {
                        Translation::create([
                            'table_name' => 'services',
                            'column_name' => $column,
                            'row_id' => $service->id,
                            'language' => $lang,
                            'translated_text' => $text
                        ]);
                    }
                }
            }

            return redirect()->route('service.index')->with('success', 'Layanan berhasil diperbarui!');
        } catch (\Exception $e) {
            \Log::error('Update error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal memperbarui data.'])->withInput();
        }
    }



    public function destroy($id)
    {
        // Validasi apakah layanan dengan ID tersebut ada
        $service = Service::findOrFail($id);

        // Hapus gambar dari storage
        if ($service->image) {
            Storage::disk('public')->delete('service_images/' . $service->image);
        }

        // Hapus terjemahan terkait
        Translation::where('row_id', $service->id)->where('table_name', 'services')->delete();

        // Hapus layanan
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Layanan berhasil dihapus!');
    }
}
