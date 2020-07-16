<?php


use Illuminate\Support\Facades\Route;

Route::post('participants/register', 'Website\QuizRegisterController@store')
    ->name('participants.register');

Route::post('play-quiz', 'Website\QuizControlController@start')
        ->name('quiz-assessment.start');

Route::get('render-question/{assessment}', 'Website\RenderQuestionController@show')
        ->name('render-question.show');
Route::post('save-answer', 'Website\RenderQuestionController@store')
        ->name('save-answer.store');
