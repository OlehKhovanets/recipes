<?php

namespace App\Http\Controllers\Web\Answers;

use App\Events\ObserveAnswerView;
use App\Http\Controllers\Web\Controller;
use App\Models\AnswerIsReadByUser;
use App\Models\AnswerStar;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Services\QuestionsBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class IndexController extends Controller
{
    public function answer(string $slug)
    {
        $answer = Recipe::query()
            ->with('ingredients')
            ->where('slug', $slug)
            ->firstOrFail();

        $callories = 0;

        foreach ($answer->ingredients as $ingredient) {

            $result = $ingredient->calories_per_gram *  $ingredient->pivot->grams;

            $callories += $result;
        }

        return view('web.answers.index_new')->with([
            'answer' => $answer,
            'callories' => $callories
        ]);
    }

    public function isDone($id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => __('swal.login_please')], 403);
        }

        $questionAndAnswer = Recipe::query()->where('id', $id)->first();

        if ($questionAndAnswer) {
            AnswerIsReadByUser::query()->updateOrCreate([
                'user_id' => Auth::user()->id,
                'answer_id' => $id
            ]);
        }
    }

    public function isStar($id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => __('swal.login_please')], 403);
        }

        $questionAndAnswer = Recipe::query()->where('id', $id)->firstOrFail();

        if ($questionAndAnswer) {
            try {
                DB::beginTransaction();
                $questionAndAnswer->increment('stars_count');
                AnswerStar::query()->updateOrCreate([
                    'user_id' => Auth::user()->id,
                    'answer_id' => $id
                ]);

                DB::commit();

                return response()->json('created', 201);
            } catch (\Exception $e) {
                DB::rollback();
            }
        }
    }
}
