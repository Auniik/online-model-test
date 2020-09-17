<?php


use App\Http\Controllers\Website\AnswerAttachmentController;
use App\Http\Controllers\Website\ExamAnswerController;
use App\Http\Controllers\Website\ExamControlController;
use App\Http\Controllers\Website\ExamFormController;
use App\Http\Controllers\Website\ParticipantLoginController;
use App\Http\Controllers\Website\ParticipantProfileController;
use App\Http\Controllers\Website\ParticipantRegisterController;
use App\Http\Controllers\Website\QuizControlController;
use App\Http\Controllers\Website\QuizRegisterController;
use App\Http\Controllers\Website\RenderQuestionController;
use Illuminate\Support\Facades\Route;

Route::post('participants/quiz-register', [QuizRegisterController::class, 'store'])
    ->name('participants.quiz-register');

Route::get('start-quiz', [QuizControlController::class, 'create'])
    ->name('quiz-assessment.create');

Route::post('play-quiz', [QuizControlController::class, 'start'])
        ->name('quiz-assessment.start');

Route::get('render-question/{assessment}', [RenderQuestionController::class, 'show'])
        ->name('render-question.show');

Route::post('save-answer', [RenderQuestionController::class, 'store'])
        ->name('save-answer.store');

Route::get('complete-quiz/{assessment}', [RenderQuestionController::class, 'complete'])
        ->name('complete-quiz.render');


//Participant Auth
Route::post('participants/logout', [ParticipantLoginController::class, 'logout'])
        ->name('participants.logout');

Route::get('participants/login', [ParticipantLoginController::class, 'login'])
        ->name('participants.login');
Route::post('participants/login', [ParticipantLoginController::class, 'attempt'])
        ->name('participants.attempt');

Route::get('participants/register', [ParticipantRegisterController::class, 'index'])
        ->name('participants.register.index');
Route::post('participants/register', [ParticipantRegisterController::class, 'register'])
        ->name('participants.register.store');

Route::get('participants/profile', [ParticipantProfileController::class, 'show'])
        ->name('participants.profile');
Route::get('participants/{participant}/profile', [ParticipantProfileController::class, 'show'])
        ->name('participants.show');

Route::get('participant/edit', [ParticipantProfileController::class, 'edit'])
        ->name('participant-profile.edit');
Route::patch('participant/{participant}/update', [ParticipantProfileController::class, 'update'])
        ->name('participant-profile.update');
Route::post('participant/{participant}/password-change', [ParticipantProfileController::class, 'passwordChange'])
        ->name('participant-password.update');


//Online Exam

Route::get('exams/{exam}/start', [ExamFormController::class, 'index'])
    ->name('exams.form');

Route::post('exams/{assessment}/start', [ExamFormController::class, 'store'])
    ->name('exams.start');

Route::get('exam-hall', [ExamControlController::class, 'index'])
    ->name('exams.ground');

Route::post('exam-hall/finish', [ExamControlController::class, 'finish'])
    ->name('exams.finish');


Route::post('assessments/{assessment}/{question}/answer', [ExamAnswerController::class, 'store'])
    ->name('assessment-answer.store');

Route::post('answer-attachments/{attachment}/delete', [AnswerAttachmentController::class, 'destroy'])
    ->name('attachments.destroy');

