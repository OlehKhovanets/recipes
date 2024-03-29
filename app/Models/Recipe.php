<?php

namespace App\Models;


use App\Traits\SearchableExtended;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Recipe extends Model
{
    use Sluggable;

    protected $table = 'recipes';

    protected $fillable = [
        'title',
        'description',
        'author_id',
        'is_approved',
        'slug',
        'image_path',
        'number_of_servings',
        'type_of_meal'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $casts = [
        'body' => 'array'
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient', 'recipe_id', 'ingredient_id')->withPivot('grams');
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function userRecipeSortedByDay()
    {
        return $this->hasOne(UserRecipeSortedByDay::class);
    }
}
