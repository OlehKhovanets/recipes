<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Models\UserRecipeSortedByDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function addRecipeToSpecificDay(Request $request, int $id)
    {
        $days = [
            1 => 'Понеділок',
            2 => 'Вівторок',
            3 => 'Середа',
            4 => 'Четвер',
            5 => 'Пятниця',
            6 => 'Субота',
            7 => 'Неділя',
        ];

        UserRecipeSortedByDay::query()->updateOrCreate([
            'recipe_id' => $id,
//            'author_id' => 1,
            'author_id' => Auth::user()->id,
            'day_id' => $request->get('day_id')
        ]);

        return response()->json(['data' => [
            'dayName' => $days[$request->get('day_id')]
        ]]);
//        dump($id);
//        dd($request->all());
    }

    public function profileRecipes()
    {
        $days = [
            1 => 'Понеділок',
            2 => 'Вівторок',
            3 => 'Середа',
            4 => 'Четвер',
            5 => 'Пятниця',
            6 => 'Субота',
            7 => 'Неділя',
        ];

        $userRecipeSortedByDays = UserRecipeSortedByDay::query()
            ->with('recipe')
//            ->where('author_id', 1)
            ->where('author_id', auth()->user()->id)
            ->orderBy('day_id')
            ->get()
            ->each(function ($recipe) {
                $callories = 0;
                foreach ($recipe->recipe->ingredients as $ingredient) {

                    $result = $ingredient->calories_per_gram * $ingredient->pivot->grams;

                    $callories += $result;
                }

                $recipe->recipe->setAttribute('calories', $callories);
            })
            ->groupBy('day_id')
        ;



//        dd($userRecipeSortedByDays->first()[0]->recipe->title);

//        return view('web.profile.data', compact('userRecipeSortedByDays', 'days'));
        $view = view('web.profile.data', compact('userRecipeSortedByDays', 'days'))->render();
        return response()->json(['html' => $view]);
    }
}
