<?php

use App\Models\UserRecipeSortedByDay;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test-telegram');
});
//Route::get('/', [\App\Http\Controllers\Web\Home\IndexController::class, 'index'])->name('index.index');
Route::get('/profile', [\App\Http\Controllers\Web\Home\IndexController::class, 'profile'])->name('index.profile');
Route::get('/generate', [\App\Http\Controllers\Web\Home\GeneratePdfController::class, 'index'])->name('index.generatePdf');
Route::get('/recipe/{questionIn}', [\App\Http\Controllers\Web\Answers\IndexController::class, 'answer'])->name('index.answer');


Route::get('recipes-list', function (\Illuminate\Http\Request $request) {
    $days = [
        1 => 'Понеділок',
        2 => 'Вівторок',
        3 => 'Середа',
        4 => 'Четвер',
        5 => 'Пятниця',
        6 => 'Субота',
        7 => 'Неділя',
    ];

    $recipes = \App\Models\Recipe::query()
        ->with('userRecipeSortedByDay', 'ingredients')
        ->when(request()->get('search'), function (\Illuminate\Database\Eloquent\Builder $builder) {
            return $builder->where('title', 'like', '%' . request()->get('search') . '%');
        })
        ->paginate(5)
        ->each(function ($recipe) {
            $callories = 0;
            foreach ($recipe->ingredients as $ingredient) {

                $result = $ingredient->calories_per_gram * $ingredient->pivot->grams;

                $callories += $result;
            }

            $recipe->setAttribute('calories', $callories);
        });

    $view = view('web.questions.data', compact('recipes', 'days'))->render();
    return response()->json(['html' => $view]);
});

Route::post('/api/recipes/{id}', [\App\Http\Controllers\Api\Profile\RecipeController::class, 'addRecipeToSpecificDay']);
Route::post('/api/recipes/{id}', [\App\Http\Controllers\Api\Profile\RecipeController::class, 'addRecipeToSpecificDay']);
Route::get('/api/profile/recipes', [\App\Http\Controllers\Api\Profile\RecipeController::class, 'profileRecipes']);
Route::post('/day/{id}', function ($day) {
    $userRecipeSortedByDay = UserRecipeSortedByDay::query()
        ->with('recipe')
        ->where('id', $day)
        ->firstOrFail();

    smilify('success', 'Видалено: ' . $userRecipeSortedByDay->recipe->title);

    $userRecipeSortedByDay->delete();

    return redirect(route('index.profile'));
});

Route::get('/auth/google', [\App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);
