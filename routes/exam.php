<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '', 'middleware' => ['auth']], function () {


    Route::get('exams/{exam}/questions', 'OnlineExam\ExamQuestionController@index')
        ->name('exam-questions.index');
    Route::post('exams/{exam}/questions', 'OnlineExam\ExamQuestionController@store')
        ->name('exam-questions.store');
    Route::DELETE('exam-questions/{question}', 'OnlineExam\ExamQuestionController@destroy')
        ->name('exam-questions.destroy');
    Route::get('exam-questions/{question}', 'OnlineExam\ExamQuestionController@show')
        ->name('exam-questions.show');

    Route::post('exams/{exam}/participants/create', 'OnlineExam\ExamParticipantController@create')
        ->name('exam-participants.create');
    Route::post('exams/{exam}/participants', 'OnlineExam\ExamParticipantController@store')
        ->name('exam-participants.store');

    Route::resource('exams', 'OnlineExam\ExamController');

    Route::resource('subjects', 'OnlineExam\SubjectController');
});
