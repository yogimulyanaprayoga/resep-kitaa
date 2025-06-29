<?php

namespace App\Models;

use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($recipe) {
            $recipe->slug = Str::slug($recipe->title);
        });
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient')
            ->withPivot('quantity')
            ->withTimestamps()
            ->using(RecipeIngredient::class);
    }

    public function mainIngredient()
    {
        return $this->belongsTo(Ingredient::class, 'main_ingredient_id');
    }

    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class, 'food_category_id');
    }
}
