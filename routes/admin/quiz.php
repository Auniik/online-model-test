<?php


use App\Http\Controllers\Quiz\QuizAssessmentController;
use App\Http\Controllers\Quiz\QuizController;
use App\Http\Controllers\Quiz\QuizDiscussionController;
use App\Http\Controllers\Quiz\QuizParticipantController;
use App\Http\Controllers\Quiz\QuizQuestionController;
use App\Http\Controllers\Quiz\QuizResultsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '', 'middleware' => ['auth']], function () {



    Route::get('quizzes/{quiz}/current', [QuizController::class, 'current'])
        ->name('quizzes.current');
    Route::get('quizzes/{quiz}/publish', [QuizController::class, 'publish'])
        ->name('quizzes.publish');

    Route::get('quizzes/{quiz}/participants', [QuizParticipantController::class, 'index'])
        ->name('quiz-participants.index');
    Route::get('quizzes/{quiz}/participants/create', [QuizParticipantController::class, 'create'])
        ->name('quiz-participants.create');
    Route::post('quizzes/{quiz}/participants', [QuizParticipantController::class, 'store'])
        ->name('quiz-participants.store');
    Route::DELETE('quiz-participants/{id}', [QuizParticipantController::class, 'destroy'])
        ->name('quiz-participants.destroy');

    Route::get('quizzes/{quiz}/questions', [QuizQuestionController::class, 'index'])
        ->name('quiz-questions.index');
    Route::post('quizzes/{quiz}/questions', [QuizQuestionController::class, 'store'])
        ->name('quiz-questions.store');
    Route::get('quiz-questions/{question}', [QuizQuestionController::class, 'show'])
        ->name('quiz-questions.show');
    Route::DELETE('quiz-questions/{question}', [QuizQuestionController::class, 'destroy'])
        ->name('quiz-questions.destroy');

    Route::get('quiz-questions/{question}/discussion', [QuizDiscussionController::class, 'index'])
        ->name('quiz-discussion.index');
    Route::post('quiz-questions/{question}/discussion', [QuizDiscussionController::class, 'update'])
        ->name('quiz-discussion.update');


    Route::get('quizzes/{quiz}/assessments/', [QuizAssessmentController::class, 'index'])
        ->name('quiz-assessment.index');
    Route::get('quiz-assessments/{assessment}', [QuizAssessmentController::class, 'show'])
        ->name('quiz-assessment.show');



    Route::get('/quizzes/results', [QuizResultsController::class, 'index'])->name('quizzes.results.index');
    Route::resource('quizzes', QuizController::class);
});
