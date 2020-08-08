<?php

namespace App\Providers;

use App\Blog;
use App\Book;
use App\Contract;
use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\ParticipantAssessment;
use App\Models\Quiz\Quiz;
use App\News;
use App\Services\MetaGenerator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        if (!app()->runningInConsole()) {
            View::composer(['front.index.index', 'front.layout.master'], function($view) {
                $id = auth('participant')->id();
                $session = session("participant-$id");


                $assessment = $session ? ParticipantAssessment::query()->find($session['assessment_id']) : null;
                $news = News::query()->latest()->orderBy('id', 'desc')->take(10)->get();
                $joint = '';
                foreach ($news as $key => $item) {
                 ++$key;
                 $l = $item->link ? "$item->link" : '#';
                    $joint .= "{$key}. <a href=$l>$item->title</a> &nbsp;&nbsp;&nbsp;&nbsp;";
                }

                return $view->with([
                    'assessment' => $assessment,
                    'news' => $joint,
                    'news_feed' => Blog::query()->latest()->take(10)->get(),
                    'contacts' => Contract::query()->first(),
                ]);

        });

             View::composer('*', function($view) {
                 return $view->with([
                     'meta' => resolve(MetaGenerator::class)->build()
                 ]);
             });
        }

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
