<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Translation;

class PortfolioController extends Controller
{
    public function create()
    {
        return view('portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolio_images', 'public');
        }

        // Simpan data utama portfolio
        $portfolio = Portfolio::create([
            'image' => $imagePath
        ]);

        // Simpan terjemahan
        Translation::insert([
            ['table_name' => 'portfolio', 'column_name' => 'title', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->title_id],
            ['table_name' => 'portfolio', 'column_name' => 'title', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->title_en],
            ['table_name' => 'portfolio', 'column_name' => 'description', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->description_id],
            ['table_name' => 'portfolio', 'column_name' => 'description', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->description_en]
        ]);

        return redirect()->route('portfolio.create')->with('success', 'Portfolio berhasil ditambahkan!');
    }
}
