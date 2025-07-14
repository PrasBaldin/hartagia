<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
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
        $portfolios = Portfolio::with('translations')->get();

        return view('admin.portfolio.index', compact('portfolios'));
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
            'project_content_id' => 'required|string',
            'project_content_en' => 'required|string',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $imagePath = null;

        try {
            // Simpan gambar hanya jika validasi berhasil
            if ($request->hasFile('image_1')) {
                $filename = time() . '_' . $request->file('image_1')->getClientOriginalName();
                $imagePath = $request->file('image_1')->storeAs('portfolio_images', $filename, 'public');
            }

            // Simpan data utama portfolio
            $portfolio = Portfolio::create([
                'image_1' => $imagePath
            ]);

            // Simpan terjemahan ke tabel translations
            Translation::insert([
                ['table_name' => 'portfolios', 'column_name' => 'project_name', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->project_name_id, 'created_at' => Carbon::now()],
                ['table_name' => 'portfolios', 'column_name' => 'project_name', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->project_name_en, 'created_at' => Carbon::now()],
                ['table_name' => 'portfolios', 'column_name' => 'project_desc', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->project_desc_id, 'created_at' => Carbon::now()],
                ['table_name' => 'portfolios', 'column_name' => 'project_desc', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->project_desc_en, 'created_at' => Carbon::now()],
                ['table_name' => 'portfolios', 'column_name' => 'project_content', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->project_content_id, 'created_at' => Carbon::now()],
                ['table_name' => 'portfolios', 'column_name' => 'project_content', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->project_content_en, 'created_at' => Carbon::now()]
            ]);

            return redirect()->route('portfolio')->with('success', 'Portfolio berhasil ditambahkan!');
        } catch (\Exception $e) {
            \Log::error('Error saat menyimpan portfolio: ' . $e->getMessage());

            // Jika terjadi error, hapus gambar yang sudah terupload
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            return back()->withErrors(['error' => 'Gagal menyimpan data.'])->withInput();
        }
    }

    public function edit($id)
    {
        $portfolio = Portfolio::with('translations')->findOrFail($id);

        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function destroy($id)
    {
        // Validasi apakah portfolio dengan ID tersebut ada
        $portfolio = Portfolio::findOrFail($id);

        // Hapus gambar dari storage
        if ($portfolio->image_1) {
            Storage::disk('public')->delete('portfolio_images/' . $portfolio->image_1);
        }

        // Hapus terjemahan terkait
        Translation::where('row_id', $portfolio->id)->where('table_name', 'portfolios')->delete();

        // Hapus portfolio
        $portfolio->delete();

        return redirect()->route('portfolio')->with('success', 'Portfolio berhasil dihapus!');
    }
}
