<?php

namespace App\Http\Controllers\Api\Recipes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\Questions\IndexController;
use App\Http\Requests\Recipes\CreateRecipeRequest;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function create(CreateRecipeRequest $request)
    {
        $ingredients = Ingredient::query()->whereIn('id', collect($request->get('ingredients'))->pluck('ingredient'))->get();
        $recipe = Recipe::query()->create([
            'title' => $request->get('title'),
            'description' => json_encode($request->get('blocks')),
//            'author_id' => Auth::user()->id,
            'author_id' => 1,
            'is_approved' => true,
            'number_of_servings' => $request->input('numberOfServings'),
            'type_of_meal' => $request->input('typeOfMeal'),
            'image_path' => ''//use AI for it
        ]);

        foreach ($request->get('ingredients') as $ingredient) {
            RecipeIngredient::query()->create([
                'recipe_id' => $recipe->id,
                'ingredient_id' => $ingredient['ingredient'],
                'grams' => $ingredient['mass']
            ]);
        }

        Session::flash('message', 'Рецепт створено успішно!');

        return response()->noContent();
    }

    public function update(Request $request, int $id)
    {
        if (!Auth::check()) {
            abort('403');
        }

        $questionAndAnswer = Recipe::query()
            ->where('id', $id)
            ->firstOrFail();

        $questionAndAnswer->update([
            'title' => $request->get('title'),
            'description' => json_encode($request->get('blocks')),
        ]);

        return response()->noContent();
    }
}
