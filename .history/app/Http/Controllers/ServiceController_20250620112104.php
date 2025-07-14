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

            return redirect()->route('admin.services')->with('success', 'Layanan berhasil ditambahkan!');
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
        $service = Service::findOrFail($id);

        $translations = Translation::where('table_name', 'services')
            ->where('row_id', $id)
            ->get();

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

        $service = Service::findOrFail($id);
        $imagePath = $service->image;

        try {
            // Replace image jika ada yang baru diunggah
            if ($request->hasFile('image')) {
                if ($imagePath) {
                    Storage::disk('public')->delete($imagePath); // delete lama
                }

                $filename = time() . '_' . $request->file('image')->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs('service_images', $filename, 'public');
            }

            // Update image path
            $service->update(['image' => $imagePath]);

            // Update translations
            $columns = [
                'service_name' => ['id' => $request->service_name_id, 'en' => $request->service_name_en],
                'service_desc' => ['id' => $request->service_desc_id, 'en' => $request->service_desc_en],
                'service_content' => ['id' => $request->service_content_id, 'en' => $request->service_content_en],
            ];

            foreach ($columns as $column => $langs) {
                foreach ($langs as $lang => $text) {
                    Translation::updateOrCreate(
                        ['table_name' => 'services', 'column_name' => $column, 'row_id' => $service->id, 'language' => $lang],
                        ['translated_text' => $text]
                    );
                }
            }

            return redirect()->route('admin.service')->with('success', 'Layanan berhasil diperbarui!');
        } catch (\Exception $e) {
            \Log::error('Error saat update layanan: ' . $e->getMessage());

            if ($imagePath && $imagePath !== $service->image) {
                Storage::disk('public')->delete($imagePath);
            }

            return back()->withErrors(['error' => 'Gagal memperbarui data.'])->withInput();
        }
    }


    public function delete($id)
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

        return redirect()->route('admin.services')->with('success', 'Layanan berhasil dihapus!');
    }
}
