<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $recipes = Recipe::select('title', 'slug', 'cook_minutes', 'servings', 'image')
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%$query%");
            })
            ->latest()
            ->get();

        // dd($recipes);

        return view('recipes', compact('recipes'));
    }

    public function show($slug)
    {
        $recipe = Recipe::where('slug', $slug)->with('ingredients')->firstOrFail();
        return view('recipes.show', compact('recipe'));
    }

    public function deteksiMakanan(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $image = $request->file('image');
        $imageData = base64_encode(file_get_contents($image));

        // Kirim ke Flask API
        $response = Http::post('http://localhost:5000/predict', [
            'image' => $imageData,
        ]);

        if ($response->failed()) {
            return back()->withErrors(['error' => 'Gagal memproses gambar']);
        }

        $result = $response->json();
        $label = $result['label'] ?? null;

        if (!$label) {
            return back()->withErrors(['error' => 'Label tidak ditemukan']);
        }

        // Bersihkan label dari prefix
        $namaMakanan = str_replace('makanan___', '', $label);

        // Cari di database resep berdasarkan nama
        $recipes = Recipe::where('title', 'like', '%' . str_replace('_', ' ', $namaMakanan) . '%')->get();

        return view('recipes.detected', compact('recipes', 'namaMakanan'));
    }

    public function uploadForm(Request $request)
    {
        $query = $request->query('query');

        $recipes = Recipe::when($query, fn($q) => $q->where('title', 'like', "%$query%"))
            ->select('id', 'title', 'slug', 'image', 'cook_minutes', 'servings')
            ->latest()
            ->get();

        return view('recipes', compact('recipes'));
    }
}
