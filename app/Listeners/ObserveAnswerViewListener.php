<?php

namespace App\Listeners;

use App\Events\ObserveAnswerView;
use App\Models\AnswerView;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;

class ObserveAnswerViewListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ObserveAnswerView  $event
     * @return void
     */
    public function handle(ObserveAnswerView $event)
    {
        $answer = Recipe::query()->where('id', $event->getAnswerId())->first();

        if ($answer) {
            $ip = request()->ip();

            $answerView = AnswerView::query()
                ->where('ip', $ip)
                ->where('answer_id', $event->getAnswerId())
                ->first();

            if (!$answerView) {
                try {
                    DB::beginTransaction();
                    $answer->increment('views_count');
                    AnswerView::query()->create([
                        'ip' => $ip,
                        'answer_id' => $event->getAnswerId()
                    ]);

                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollback();
                }
            }
        }
    }
}
