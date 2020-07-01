<?php


use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '', 'middleware' => ['auth']], function () {
    Route::resource('exams', ExamController::class);
});
