<?php


use Illuminate\Support\Facades\Route;

Route::post('participants/register', 'Website\QuizRegisterController@store')
    ->name('participants.register');

Route::get('start-quiz', 'Website\QuizControlController@create')
    ->name('quiz-assessment.create');

Route::post('play-quiz', 'Website\QuizControlController@start')
        ->name('quiz-assessment.start');

Route::get('render-question/{assessment}', 'Website\RenderQuestionController@show')
        ->name('render-question.show');

Route::post('save-answer', 'Website\RenderQuestionController@store')
        ->name('save-answer.store');

Route::get('complete-quiz/{assessment}', 'Website\RenderQuestionController@complete')
        ->name('complete-quiz.render');
