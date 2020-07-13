<?php

namespace App\Providers;

use App\Models\OnlineExam\Exam;
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
