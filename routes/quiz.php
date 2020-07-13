<?php


use Illuminate\Support\Facades\Route;

Route::resource('quizzes', 'Quiz\QuizController');
Route::resource('quiz-questions', 'Quiz\QuizQuestionController');
Route::resource('quiz-assessments', 'Quiz\QuizAssessmentController');
