<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\BlogPost;
use App\Models\Carousel;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = FoodCategory::with('recipes')->get();
        $recipes = Recipe::select('title', 'image', 'cook_minutes', 'servings')
            ->take(4)
            ->get();
        $posts = BlogPost::select('title', 'image', 'slug', 'author_id', 'short_description', 'content', 'created_at')
            ->take(2)
            ->get();

        $recipeImages = Recipe::inRandomOrder()
            ->select('image')
            ->take(4)
            ->get();

        $carousels = Carousel::where('is_active', true)
            ->orderBy('order')
            ->take(4)
            ->get();

        return view('welcome', compact('categories', 'recipes', 'posts', 'recipeImages', 'carousels'));
    }
}
