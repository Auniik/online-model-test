<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '', 'middleware' => ['auth']], function () {
    Route::resource('quizzes', 'Quiz\QuizController');


    Route::get('quizzes/{quiz}/current', 'Quiz\QuizController@current')
        ->name('quizzes.current');
    Route::get('quizzes/{quiz}/publish', 'Quiz\QuizController@publish')
        ->name('quizzes.publish');

    Route::get('quizzes/{quiz}/participants', 'Quiz\QuizParticipantController@index')
        ->name('quiz-participants.index');
    Route::get('quizzes/{quiz}/participants/create', 'Quiz\QuizParticipantController@create')
        ->name('quiz-participants.create');
    Route::post('quizzes/{quiz}/participants', 'Quiz\QuizParticipantController@store')
        ->name('quiz-participants.store');
    Route::DELETE('quiz-participants/{id}', 'Quiz\QuizParticipantController@destroy')
        ->name('quiz-participants.destroy');

    Route::get('quizzes/{quiz}/questions', 'Quiz\QuizQuestionController@index')
        ->name('quiz-questions.index');
    Route::post('quizzes/{quiz}/questions', 'Quiz\QuizQuestionController@store')
        ->name('quiz-questions.store');
    Route::get('quiz-questions/{question}', 'Quiz\QuizQuestionController@show')
        ->name('quiz-questions.show');
    Route::DELETE('quiz-questions/{question}', 'Quiz\QuizQuestionController@destroy')
        ->name('quiz-questions.destroy');


    Route::get('quizzes/{quiz}/assessments/', 'Quiz\QuizAssessmentController@index')
        ->name('quiz-assessment.index');
    Route::get('quiz-assessments/{assessment}', 'Quiz\QuizAssessmentController@show')
        ->name('quiz-assessment.show');
});
