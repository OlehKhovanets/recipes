<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Web\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\UserRecipeSortedByDay;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GeneratePdfController extends Controller
{

    public function index()
    {
        $ingredientsToBuy = [];
        $userHasRecipes = UserRecipeSortedByDay::query()->with('recipe.ingredients')->where('author_id', Auth::user()->id)->get();
        foreach ($userHasRecipes as $userHasRecipe) {
            foreach ($userHasRecipe->recipe->ingredients as $ingredient) {
                $ingredientsToBuy[] = [
                    'name' => $ingredient->name,
                    'grams' => $ingredient->pivot->grams
                ];
            }
        }

        $collection = Collection::make($ingredientsToBuy);

        $ingredients = $collection->groupBy('name')->map(function ($items) {
            return $items->sum('grams');
        });

        return view('web.pdf.ingredients')->with(['ingredients' => $ingredients]);
    }
}
