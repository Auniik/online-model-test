<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '', 'middleware' => ['auth']], function () {
    Route::resource('exams', 'OnlineExam\ExamController');
    Route::resource('subjects', 'OnlineExam\SubjectController');
});
