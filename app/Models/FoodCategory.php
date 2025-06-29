<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'food_category_id');
    }
}
