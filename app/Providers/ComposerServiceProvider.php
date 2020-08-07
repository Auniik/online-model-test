<?php

namespace App\Providers;

use App\Blog;
use App\Book;
use App\Contract;
use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\ParticipantAssessment;
use App\Models\Quiz\Quiz;
use App\News;
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

        View::composer(['front.index.index', 'front.layout.master'], function($view) {
            $id = auth('participant')->id();
            $session = session("participant-$id");


            $assessment = $session ? ParticipantAssessment::query()->find($session['assessment_id']) : null;
            $news = News::query()->orderBy('id', 'desc')->take(10)->get();
            $joint = '';
            foreach ($news as $key => $item){
                $joint .= ($key+1).'. '.$item->title.' &nbsp;&nbsp;&nbsp;&nbsp;';
            }

            return $view->with([
                'assessment' => $assessment,
                'news' => $joint,
                'news_feed' => Blog::query()->take(10)->get(),
                'contacts' => Contract::query()->first()
            ]);
        });
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
