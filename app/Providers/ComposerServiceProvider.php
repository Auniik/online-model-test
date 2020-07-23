<?php

namespace App\Providers;

use App\Models\OnlineExam\Exam;
use App\Models\Quiz\Quiz;
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
        View::composer('front.index.index', function($view) {
            return $view->with([
                'exams' => Exam::query()->where('in_homepage', true)->take(6)->get(),
                'current_quiz' => Quiz::query()->where('is_default', 1)->first(),
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
