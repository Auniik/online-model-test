<?php

namespace App\Providers;

use App\Blog;
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
                'exams' => Exam::query()->where('in_homepage', true)->take(6)->get(),
                'current_quiz' => Quiz::query()->where('is_default', 1)->first(),
                'news' => $joint,
                'news_feed' => Blog::query()->take(10)->get()
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
