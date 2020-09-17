<?php


use App\Http\Controllers\OnlineExam\AssessmentAnswerController;
use App\Http\Controllers\OnlineExam\ExamController;
use App\Http\Controllers\OnlineExam\ExamQuestionController;
use App\Http\Controllers\OnlineExam\ParticipantAssessmentController;
use App\Http\Controllers\OnlineExam\ParticipantController;
use App\Http\Controllers\OnlineExam\ParticipantExamineController;
use App\Http\Controllers\OnlineExam\SubjectController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '', 'middleware' => ['auth']], function () {


    Route::get('exams/{exam}/questions', [ExamQuestionController::class, 'index'])
        ->name('exam-questions.index');
    Route::post('exams/{exam}/questions', [ExamQuestionController::class, 'store'])
        ->name('exam-questions.store');
    Route::DELETE('exam-questions/{question}', [ExamQuestionController::class, 'destroy'])
        ->name('exam-questions.destroy');
    Route::get('exam-questions/{question}', [ExamQuestionController::class, 'show'])
        ->name('exam-questions.show');
    Route::patch('exam-questions/{question}', [ExamQuestionController::class, 'update'])
        ->name('exam-questions.update');

    Route::get('assessments', [ParticipantAssessmentController::class, 'index'])
        ->name('assessments.index');
    Route::get('exams/{exam}/participants', [ParticipantAssessmentController::class, 'create'])
        ->name('exam-participants.create');
    Route::post('exams/{exam}/participants', [ParticipantAssessmentController::class, 'store'])
        ->name('exam-participants.store');
    Route::DELETE('exams-participants/{id}', [ParticipantAssessmentController::class, 'destroy'])
        ->name('exam-participants.destroy');
    Route::get('assessments/{assessment}/examine', [ParticipantExamineController::class, 'index'])
        ->name('assessments-examine.index');
    Route::post('assessments/{assessment}/answers/{answer}', [ParticipantExamineController::class, 'store'])
        ->name('assessments-examine.store');

    Route::get('assessments-answers/{answer}', [AssessmentAnswerController::class, 'show'])
        ->name('assessments-answers.show');

    Route::post('answers/{answer}/remark', [AssessmentAnswerController::class, 'store'])
        ->name('answers-remark.store');

    Route::get('participants', [ParticipantController::class, 'index'])
        ->name('participants.index');
    Route::post('participants', [ParticipantController::class, 'store'])
        ->name('participants.store');
    Route::DELETE('participants/{participant}', [ParticipantController::class, 'destroy'])
        ->name('participants.destroy');



    Route::resource('subjects', SubjectController::class);

    Route::resource('exams', ExamController::class);
});
