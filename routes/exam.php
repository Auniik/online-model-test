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
    Route::patch('exam-questions/{question}', 'OnlineExam\ExamQuestionController@update')
        ->name('exam-questions.update');

    Route::get('assessments', 'OnlineExam\ParticipantAssessmentController@index')
        ->name('assessments.index');
    Route::get('exams/{exam}/participants', 'OnlineExam\ParticipantAssessmentController@create')
        ->name('exam-participants.create');
    Route::post('exams/{exam}/participants', 'OnlineExam\ParticipantAssessmentController@store')
        ->name('exam-participants.store');
    Route::DELETE('exams-participants/{id}', 'OnlineExam\ParticipantAssessmentController@destroy')
        ->name('exam-participants.destroy');
    Route::get('assessments/{assessment}/examine', 'OnlineExam\ParticipantExamineController@index')
        ->name('assessments-examine.index');
    Route::post('assessments/{assessment}/answers/{answer}', 'OnlineExam\ParticipantExamineController@store')
        ->name('assessments-examine.store');

    Route::get('assessments-answers/{answer}', 'OnlineExam\AssessmentAnswerController@show')
        ->name('assessments-answers.show');


    Route::get('participants', 'OnlineExam\ParticipantController@index')
        ->name('participants.index');
    Route::post('participants', 'OnlineExam\ParticipantController@store')
        ->name('participants.store');
    Route::DELETE('participants/{participant}', 'OnlineExam\ParticipantController@destroy')
        ->name('participants.destroy');

    Route::resource('exams', 'OnlineExam\ExamController');

    Route::resource('subjects', 'OnlineExam\SubjectController');
});
