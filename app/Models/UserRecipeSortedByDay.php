<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserRecipeSortedByDay extends Model
{
    protected $table = 'user_recipes_sorted_by_days';

    protected $fillable = [
        'recipe_id',
        'author_id',
        'day_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

}
