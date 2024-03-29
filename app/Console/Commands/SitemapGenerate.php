<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Services\QuestionsBuilder;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapGenerate extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Command description';

    public function handle()
    {
        $languages = collect(config('languages.languages'));
        $enLangId = $languages->where('locale', 'en')->first()['id'];
        $uaLangId = $languages->where('locale', 'ua')->first()['id'];
        $path = public_path('sitemap.xml');
        $sitemap = Sitemap::create();

        /**
         * index page
         */
        $sitemap->add(Url::create('/ua')->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        $sitemap->add(Url::create('/en')->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));
        /**
         * end of index page
         */

        /**
         * blog page
         */
        $sitemap->add(Url::create('/ua/articles')->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        $sitemap->add(Url::create('/en/articles')->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        /**
         * end of blog page
         */

        /**
         * blog item page
         */
        $enArticles = Article::query()->where('type', Article::BLOG)->where('language_id', $enLangId)->get();
        $uaArticles = Article::query()->where('type', Article::BLOG)->where('language_id', $uaLangId)->get();

        if ($enArticles->isNotEmpty()) {
            $enArticlesLastModified = $enArticles->sortByDesc('id')->first()->updated_at;
            foreach ($enArticles as $enArticle) {
                $sitemap->add(Url::create('/en/articles/' . $enArticle->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate($enArticlesLastModified));
            }
        }

        if ($uaArticles->isNotEmpty()) {
            $uaArticlesLastModified = $uaArticles->sortByDesc('id')->first()->updated_at;
            foreach ($uaArticles as $uaArticle) {
                $sitemap->add(Url::create('/ua/articles/' . $uaArticle->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate($uaArticlesLastModified));
            }
        }
        /**
         * end of blog item page
         */

        /**
         * clue page
         */
        $sitemap->add(Url::create('/ua/clues')->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        $sitemap->add(Url::create('/en/clues')->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        /**
         * end of blog page
         */

        /**
         * blog item page
         */
        $enClues = Article::query()->where('type', Article::CLUE)->where('language_id', $enLangId)->get();
        $uaClues = Article::query()->where('type', Article::CLUE)->where('language_id', $uaLangId)->get();

        if ($enClues->isNotEmpty()) {
            $enCluesLastModified = $enClues->sortByDesc('id')->first()->updated_at;
            foreach ($enClues as $enClue) {
                $sitemap->add(Url::create('/en/clues/' . $enClue->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate($enCluesLastModified));
            }
        }

        if ($uaClues->isNotEmpty()) {
            $uaCluesLastModified = $uaClues->sortByDesc('id')->first()->updated_at;
            foreach ($uaClues as $uaClue) {
                $sitemap->add(Url::create('/ua/clues/' . $uaClue->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setLastModificationDate($uaCluesLastModified));
            }
        }
        /**
         * end of clue item page
         */

        /**
         * pwa page
         */
//        $sitemap->add(Url::create('/ua/pages/pwa')->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.1));
//        $sitemap->add(Url::create('/en/pages/pwa')->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.1));
        /**
         * end of pwa page
         */

        /**
         * recipes page
         */
        foreach (Ingredient::query()->get() as $branch) {

            $questionsAndAnswersEn = Recipe::query()
                ->select('id', 'language_id', 'question')
                ->where('language_id', $enLangId)
                ->whereHas('ingredients', function ($query) use ($branch) {
                    return $query->where('id', $branch->id);
                })
            ->get();

            if (count($questionsAndAnswersEn) > 0) {

                $pages = count($questionsAndAnswersEn) / QuestionsBuilder::QUESTIONS_PAGINATION < 1 ? 0 : count($questionsAndAnswersEn) / QuestionsBuilder::QUESTIONS_PAGINATION;
                if ($pages == 0) {
                    $sitemap->add(Url::create('/en/recipes/' . $branch->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)->setPriority(1));
                } else {
                    $counter = $pages + 1;
                    for ($i = 1; $i <= $counter; $i++) {
                        $sitemap->add(Url::create('/en/recipes/' . $branch->slug . '?page=' . $i)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)->setPriority(1));
                    }
                }
            }

            $questionsAndAnswersUa = Recipe::query()
                ->select('id', 'language_id', 'question')
                ->where('language_id', $uaLangId)
                ->whereHas('ingredients', function ($query) use ($branch) {
                    return $query->where('id', $branch->id);
                })
                ->get();

            if (count($questionsAndAnswersUa) > 0) {

                $pages = count($questionsAndAnswersUa) / QuestionsBuilder::QUESTIONS_PAGINATION < 1 ? 0 : count($questionsAndAnswersUa) / QuestionsBuilder::QUESTIONS_PAGINATION;
                if ($pages == 0) {
                    $sitemap->add(Url::create('/ua/recipes/' . $branch->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)->setPriority(1));
                } else {
                    $counter = $pages + 1;
                    for ($i = 1; $i <= $counter; $i++) {
                        $sitemap->add(Url::create('/ua/recipes/' . $branch->slug . '?page=' . $i)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)->setPriority(1));
                    }
                }
            }
        }
        /**
         * end of recipes page
         */

        /**
         * answer page
         */
        $enAnswers = Recipe::query()->where('language_id', $enLangId)->get();
        $uaAnswers = Recipe::query()->where('language_id', $uaLangId)->get();

        foreach ($enAnswers as $enAnswer) {
            $sitemap->add(Url::create('/en/answer/' . $enAnswer->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(1)->setLastModificationDate($enAnswer->updated_at));
        }

        foreach ($uaAnswers as $uaAnswer) {
            $sitemap->add(Url::create('/ua/answer/' . $uaAnswer->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(1)->setLastModificationDate($uaAnswer->updated_at));
        }
        /**
         * end of answer page
         */

        /**
         * roadmap page
         */
        $sitemap->add(Url::create('/ua/roadmap')->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.1));
        $sitemap->add(Url::create('/en/roadmap')->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.1));


        $enAnswersRoadMap = Recipe::query()
            ->withoutGlobalScope('isApproved')
            ->withoutGlobalScope('isRoadMap')
            ->where('is_road_map', true)
            ->where('language_id', $enLangId)->get();

        $uaAnswersRoadMap = Recipe::query()
            ->withoutGlobalScope('isApproved')
            ->withoutGlobalScope('isRoadMap')
            ->where('is_road_map', true)
            ->where('language_id', $uaLangId)
            ->get();

        foreach ($enAnswersRoadMap as $enAnswerRoadMap) {
            $sitemap->add(Url::create('/en/roadmap/' . $enAnswerRoadMap->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(1)->setLastModificationDate($enAnswerRoadMap->updated_at));
        }

        foreach ($uaAnswersRoadMap as $uaAnswerRoadMap) {
            $sitemap->add(Url::create('/ua/roadmap/' . $uaAnswerRoadMap->slug)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(1)->setLastModificationDate($uaAnswerRoadMap->updated_at));
        }
        /**
         * end of roadmap page
         */

//            ->add(Url::create('/page3')->setLastModificationDate(Carbon::create('2016', '1', '1')))
        $sitemap->writeToFile($path);
        $this->info('sitemap generated');
    }
}
