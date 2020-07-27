<?php


use Illuminate\Support\Facades\Route;

Route::post('participants/quiz-register', 'Website\QuizRegisterController@store')
    ->name('participants.quiz-register');

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


//Participant Auth
Route::post('participants/logout', 'Website\ParticipantLoginController@logout')
        ->name('participants.logout');

Route::get('participants/login', 'Website\ParticipantLoginController@login')
        ->name('participants.login');
Route::post('participants/login', 'Website\ParticipantLoginController@attempt')
        ->name('participants.attempt');

Route::get('participants/register', 'Website\ParticipantRegisterController@index')
        ->name('participants.register.index');
Route::post('participants/register', 'Website\ParticipantRegisterController@register')
        ->name('participants.register.store');

Route::get('participants/profile', 'Website\ParticipantProfileController@show')
        ->name('participants.profile');


//Online Exam

Route::get('exams/{exam}/start', 'Website\ExamFormController@index')
    ->name('exams.form');

Route::post('exams/{assessment}/start', 'Website\ExamFormController@store')
    ->name('exams.start');

Route::get('exam-hall', 'Website\ExamControlController@index')
    ->name('exams.ground');

Route::post('exam-hall/finish', 'Website\ExamControlController@finish')
    ->name('exams.finish');


Route::post('assessments/{assessment}/{question}/answer', 'Website\ExamAnswerController@store')
    ->name('assessment-answer.store');

Route::post('answer-attachments/{attachment}/delete', 'Website\AnswerAttachmentController@destroy')
    ->name('attachments.destroy');

