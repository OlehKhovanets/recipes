<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';

    protected $fillable = [
        'name',
        'is_approved',
        'slug',
        'calories_per_gram',
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_ingredient', 'ingredient_id', 'recipe_id');
    }
}
