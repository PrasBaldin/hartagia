<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Portfolio;
use App\Translation;
use Carbon\Carbon;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $locale = app()->getLocale();

        $portfolios = Portfolio::with(['translations' => function ($query) use ($locale) {
            $query->where('language', $locale);
        }])->paginate(9);

        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function show($id)
    {
        // Validasi apakah portfolio dengan ID tersebut ada
        $portfolio = Portfolio::with('translations')->findOrFail($id);

        // Ambil terjemahan terkait portofolio ini
        $translations = Translation::where('table_name', 'portfolios')
            ->where('row_id', $id)
            ->get();

        // Buat array untuk menyimpan terjemahan dengan key 'column_name_language'
        $translationMap = [];
        foreach ($translations as $translation) {
            $key = $translation->column_name . '_' . $translation->language;
            $translationMap[$key] = $translation->translated_text;
        }

        return view('admin.portfolio.show', [
            'portfolio' => $portfolio,
            'translations' => $translationMap
        ]);
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name_id' => 'required|string|max:255',
            'project_name_en' => 'required|string|max:255',
            'project_desc_id' => 'required|string',
            'project_desc_en' => 'required|string',
            'image_1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Tambah validasi untuk input multiple
        if ($request->hasFile('image_extra')) {
            foreach ($request->file('image_extra') as $index => $file) {
                $validator->addRules([
                    "image_extra.$index" => 'image|mimes:jpeg,png,jpg|max:2048',
                ]);
            }
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $images = [];

        try {
            DB::beginTransaction(); // Memulai transaksi database

            // Generate slug dari service_name_en
            $slug = str_slug($request->project_name_en);
            $originalSlug = $slug;
            $counter = 1;

            while (Portfolio::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            // Simpan gambar utama
            if ($request->hasFile('image_1')) {
                $filename = time() . "_1_" . Str::random(12) . '.' . $request->file('image_1')->getClientOriginalExtension();
                $destination = base_path('images/portfolio_images');
                $request->file('image_1')->move($destination, $filename);
                $images['image_1'] = 'images/portfolio_images/' . $filename;

                // Pastikan direktori tujuan ada
                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }
            }

            // Simpan gambar tambahan dari image_extra[]
            if ($request->hasFile('image_extra')) {
                foreach ($request->file('image_extra') as $index => $file) {
                    if ($index >= 4) break;
                    $filename = time() . "_extra_" . $index . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $destination = base_path('images/portfolio_images');
                    $file->move($destination, $filename);
                    $images['image_' . ($index + 2)] = 'images/portfolio_images/' . $filename;
                }
            }

            // Pastikan setiap image_2 hingga image_5 selalu ada (meskipun null)
            for ($i = 2; $i <= 5; $i++) {
                $key = 'image_' . $i;
                if (!isset($images[$key])) {
                    $images[$key] = null;
                }
            }

            // Simpan data utama portfolio
            $portfolio = Portfolio::create([
                'image_1' => $images['image_1'],
                'image_2' => $images['image_2'],
                'image_3' => $images['image_3'],
                'image_4' => $images['image_4'],
                'image_5' => $images['image_5'],
                'slug' => $slug
            ]);

            // Simpan terjemahan ke tabel translations
            Translation::insert([
                ['table_name' => 'portfolios', 'column_name' => 'project_name', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->project_name_id, 'created_at' => Carbon::now()],
                ['table_name' => 'portfolios', 'column_name' => 'project_name', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->project_name_en, 'created_at' => Carbon::now()],
                ['table_name' => 'portfolios', 'column_name' => 'project_desc', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->project_desc_id, 'created_at' => Carbon::now()],
                ['table_name' => 'portfolios', 'column_name' => 'project_desc', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->project_desc_en, 'created_at' => Carbon::now()],
            ]);

            DB::commit(); // Commit transaksi jika semua operasi berhasil

            return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaksi jika terjadi error
            \Log::error('Error saat menyimpan portfolio: ' . $e->getMessage());

            // Jika terjadi error, hapus semua gambar yang sempat terupload
            foreach ($images as $path) {
                if ($path) {
                    Storage::disk('public')->delete($path);
                }
            }

            return back()->withErrors(['error' => 'Gagal menyimpan data.'])->withInput();
        }
    }

    public function edit($id)
    {
        // Validasi apakah portfolio dengan ID tersebut ada
        $portfolio = Portfolio::with('translations')->findOrFail($id);

        // Ambil terjemahan terkait portofolio ini
        $translations = Translation::where('table_name', 'portfolios')
            ->where('row_id', $id)
            ->get();

        // Buat array untuk menyimpan terjemahan dengan key 'column_name_language'
        $translationMap = [];
        foreach ($translations as $translation) {
            $key = $translation->column_name . '_' . $translation->language;
            $translationMap[$key] = $translation->translated_text;
        }

        return view('admin.portfolio.edit', [
            'portfolio' => $portfolio,
            'translations' => $translationMap
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'project_name_id' => 'required|string|max:255',
            'project_name_en' => 'required|string|max:255',
            'project_desc_id' => 'required|string',
            'project_desc_en' => 'required|string',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Ambil path gambar lama
        $imagePath = $portfolio->image_1;

        try {
            DB::beginTransaction(); // Memulai transaksi database

            // Generate slug dari service_name_en
            $slug = str_slug($request->project_name_en);
            $originalSlug = $slug;
            $counter = 1;

            while (
                Portfolio::where('slug', $slug)
                ->where('id', '!=', $portfolio->id)
                ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter++;
            }

            // Validasi apakah portfolio dengan ID tersebut ada
            $portfolio = Portfolio::findOrFail($id);

            /// Simpan gambar (image_1 sampai image_5) ke public/images/portfolio_images/
            $folder = base_path('images/portfolio_images');
            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            for ($i = 1; $i <= 5; $i++) {
                $field = 'image_' . $i;
                if ($request->hasFile($field)) {
                    // Hapus file lama jika ada
                    if (!empty($portfolio->$field) && file_exists(base_path($portfolio->$field))) {
                        unlink(base_path($portfolio->$field));
                    }

                    $filename = time() . "_{$i}_" . Str::random(12) . '.' . $request->file($field)->getClientOriginalExtension();
                    $request->file($field)->move($folder, $filename);
                    $portfolio->$field = 'images/portfolio_images/' . $filename;
                }
            }

            // Update data utama portfolio
            $portfolio->slug = $slug;
            $portfolio->save();

            $columns = [
                'project_name' => ['id' => $request->input('project_name_id'), 'en' => $request->input('project_name_en')],
                'project_desc' => ['id' => $request->input('project_desc_id'), 'en' => $request->input('project_desc_en')],
            ];

            // Loop melalui setiap kolom dan bahasa
            foreach ($columns as $column => $langs) {
                foreach ($langs as $lang => $text) {
                    $translation = Translation::where([
                        'table_name' => 'portfolios',
                        'column_name' => $column,
                        'row_id' => $portfolio->id,
                        'language' => $lang,
                    ])->first();

                    if ($translation) {
                        $translation->translated_text = $text;
                        $translation->updated_at = Carbon::now();
                        $translation->save();
                    } else {
                        Translation::create([
                            'table_name' => 'portfolios',
                            'column_name' => $column,
                            'row_id' => $portfolio->id,
                            'language' => $lang,
                            'translated_text' => $text,
                            'created_at' => Carbon::now(),
                        ]);
                    }
                }
            }

            DB::commit(); // Commit transaksi jika semua operasi berhasil

            return redirect()->route('admin.portfolio.show', $portfolio->id)->with('success', 'Portofolio berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaksi jika terjadi error

            // Log error untuk debugging
            \Log::error('Update error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Gagal memperbarui data.'])->withInput();
        }
    }

    public function destroy($id)
    {
        // Validasi apakah portfolio dengan ID tersebut ada
        $portfolio = Portfolio::findOrFail($id);

        // Hapus semua gambar dari storage (image_1 - image_5)
        for ($i = 1; $i <= 5; $i++) {
            $key = 'image_' . $i;
            if (!empty($portfolio->$key)) {
                Storage::disk('public')->delete($portfolio->$key);
            }
        }

        // Hapus semua translation yang terkait
        Translation::where('row_id', $portfolio->id)
            ->where('table_name', 'portfolios')
            ->delete();

        // Hapus data utama
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil dihapus!');
    }
}
