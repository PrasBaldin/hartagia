<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Portfolio;
use App\Translation;

class PortfolioController extends Controller
{
    public function create()
    {
        return view('admin.portfolio');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_id' => 'required|string',
            'description_en' => 'required|string',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $imagePath = null;
        if ($request->hasFile('image_1')) {
            $imagePath = $request->file('image_1')->store('portfolio_images', 'public');
        }

        // Simpan data utama portfolio
        $portfolio = Portfolio::create([
            'image_1' => $imagePath
        ]);

        // Simpan terjemahan
        Translation::insert([
            ['table_name' => 'portfolios', 'column_name' => 'project_name', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->project_name_id],
            ['table_name' => 'portfolios', 'column_name' => 'project_name', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->project_name_en],
            ['table_name' => 'portfolios', 'column_name' => 'project_description', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->description_id],
            ['table_name' => 'portfolios', 'column_name' => 'project_description', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->description_en],
            ['table_name' => 'portfolios', 'column_name' => 'project_content', 'row_id' => $portfolio->id, 'language' => 'id', 'translated_text' => $request->content_id],
            ['table_name' => 'portfolios', 'column_name' => 'project_content', 'row_id' => $portfolio->id, 'language' => 'en', 'translated_text' => $request->content_en]
        ]);

        return redirect()->route('portfolio.create')->with('success', 'Portfolio berhasil ditambahkan!');
    }
}
