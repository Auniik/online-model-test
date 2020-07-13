<?php


use Illuminate\Support\Facades\Route;

Route::resource('quizzes', 'Quiz\QuizController');

Route::get('quizzes/{quiz}/participants', 'Quiz\QuizParticipantController@index')
    ->name('quiz-participants.index');
Route::get('quizzes/{quiz}/participants/create', 'Quiz\QuizParticipantController@create')
    ->name('quiz-participants.create');
Route::post('quizzes/{quiz}/participants', 'Quiz\QuizParticipantController@store')
    ->name('quiz-participants.store');
Route::DELETE('quiz-participants/{participant}', 'Quiz\QuizParticipantController@destroy')
    ->name('quiz-participants.destroy');

Route::get('quizzes/{quiz}/questions', 'Quiz\QuizQuestionController@index')
    ->name('quiz-questions.index');
Route::post('quizzes/{quiz}/questions', 'Quiz\QuizQuestionController@store')
    ->name('quiz-questions.store');
Route::get('quiz-questions/{question}', 'Quiz\QuizQuestionController@show')
    ->name('quiz-questions.show');
Route::DELETE('quiz-questions/{question}', 'Quiz\QuizQuestionController@destroy')
    ->name('quiz-questions.destroy');


Route::resource('quiz-assessments', 'Quiz\QuizAssessmentController');
