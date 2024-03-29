<?php

namespace App\Listeners;

use App\Events\ObserveAnswerView;
use App\Events\ObserveArticleView;
use App\Models\AnswerView;
use App\Models\ArticleView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ObserveArticleViewListener
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

    public function handle(ObserveArticleView $event)
    {
        $ip = request()->ip();

        $articleView = ArticleView::query()
            ->where('ip', $ip)
            ->where('article_id', $event->getArticleId())
            ->first();
        if (!$articleView) {
            ArticleView::query()->create([
                'ip' => $ip,
                'article_id' => $event->getArticleId()
            ]);
        }
    }
}
