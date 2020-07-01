<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*admin*/

auth()->loginUsingId(1);

Route::get('/add-event',[
    'uses' => 'EventController@addEvent',
    'as'   => 'add-event'
]);
Route::get('/edit-event/{id}','EventController@editEvent')->name('edit.event');
Route::post('/edit-event/{id}','EventController@updateEvent')->name('update.event');
Route::post('/new-event',[
    'uses' => 'EventController@newEvent',
    'as'   => 'new-event'
]);
Route::get('/delete-event/{id}',[
    'uses' => 'EventController@deleteEvent',
    'as'   => 'delete-event'
]);


Route::get('/add-player',[
    'uses' => 'PlayerController@addPlayer',
    'as'   => 'add-player'
]);

Route::get('/admin/new-player','AdminController@addPlayer')->name('admin.player.add');
Route::post('/admin/new-player','AdminController@addPlayerPost')->name('admin.player.add.post');

Route::post('/new-player',[
    'uses' => 'PlayerController@newPlayer',
    'as'   => 'new-player'
]);

Route::get('/quiz/new-quiz', [
    'uses' => 'QuizController@index',
    'as'   => 'new-quiz'
]);

Route::get('quiz/start','QuizController@startQuiz')->name('start.quiz');

Route::get('/quiz/get-new-question/{data1}/{data2}/{data3}/{data4}/', [
    'uses' => 'QuizController@getNewQuestion',
    'as'   => 'get-new-question'
]);

Route::get('/quiz/new-quiz-question','QuizController@nextQuestion')->name('next.question');
Route::get('/quiz/complete','QuizController@complete')->name('quiz.complete');
Route::post('/quiz/submit-answer','QuizController@submitAnswer')->name('quiz.submit.answer');


Route::get('/add-question', [
    'uses' => 'QuestionController@addQuestion',
    'as'   => 'add-question'
]);
Route::post('/new-question',[
    'uses' => 'QuestionController@newQuestion',
    'as'   => 'new-question'
]);
Route::get('/edit-question/{id}','QuestionController@edit')->name('question.edit');
Route::post('/edit-question/{id}','QuestionController@update')->name('question.update');
Route::get('/get-event-by-question-id/{id}',[
    'uses'   =>'QuestionController@getEventByQuestionId',
    'as'     =>'get-event-by-question-id',
]);
Route::get('/delete-question/{id}',[
    'uses' => 'QuestionController@deleteQuestion',
    'as'   => 'delete-question'
]);


Route::get('results','ResultController@index')->name('admin.results');
Route::get('book/question','Admin\BookQuestionController@index')->name('admin.book.question');
Route::get('book/question/create','Admin\BookQuestionController@create')->name('admin.book.question.create');
Route::post('book/question/create','Admin\BookQuestionController@store')->name('admin.book.question.store');
Route::get('book/question/edit/{id}','Admin\BookQuestionController@edit')->name('admin.book.question.edit');
Route::post('book/question/edit/{id}','Admin\BookQuestionController@update')->name('admin.book.question.update');
Route::get('book/question/delete/{id}','Admin\BookQuestionController@delete')->name('admin.book.question.delete');



Route::get('/add-slider', [
    'uses' => 'SliderController@addSlider',
    'as'   => 'add-slider'
]);
Route::Post('/new-slider', [
    'uses' => 'SliderController@newSlider',
    'as'   => 'new-slider'
]);
Route::get('/edit-slider/{id}', [
    'uses' => 'SliderController@editSlider',
    'as'   => 'edit-slider'
]);
Route::Post('/update-slider', [
    'uses' => 'SliderController@updateSlider',
    'as'   => 'update-slider'
]);
Route::get('/delete-slider/{id}', [
    'uses' => 'SliderController@deleteSlider',
    'as'   => 'delete-slider'
]);


Route::get('/add-event-video', [
    'uses' => 'EventVideoController@addEventViedo',
    'as'   => 'add-event-video'
]);
Route::Post('/new-event-video', [
    'uses' => 'EventVideoController@newEventVideo',
    'as'   => 'new-event-video'
]);
Route::get('/edit-event-video/{id}', [
    'uses' => 'EventVideoController@editEventVideo',
    'as'   => 'edit-event-video'
]);
Route::post('/update-event-video', [
    'uses' => 'EventVideoController@updateEventVideo',
    'as'   => 'update-event-video'
]);

Route::get('/add-about', [
    'uses' => 'AboutController@addAbout',
    'as'   => 'add-about'
]);
Route::Post('/new-about', [
    'uses' => 'AboutController@newAbout',
    'as'   => 'new-about'
]);
Route::get('/edit-about/{id}', [
    'uses' => 'AboutController@editAbout',
    'as'   => 'edit-about'
]);
Route::post('/update-about', [
    'uses' => 'AboutController@updateAbout',
    'as'   => 'update-about'
]);



Route::get('/add-gallery', [
    'uses' => 'GalleryController@addGallery',
    'as'   => 'add-gallery'
]);
Route::Post('/new-gallery', [
    'uses' => 'GalleryController@newGallery',
    'as'   => 'new-gallery'
]);
Route::get('/edit-gallery/{id}', [
    'uses' => 'GalleryController@editGallery',
    'as'   => 'edit-gallery'
]);
Route::post('/update-gallery', [
    'uses' => 'GalleryController@updateGallery',
    'as'   => 'update-gallery'
]);
Route::get('/delete-gallery/{id}', [
    'uses' => 'GalleryController@deleteGallery',
    'as'   => 'delete-gallery'
]);




Route::get('/add-book', [
    'uses' => 'BookController@addBook',
    'as'   => 'add-book'
]);
Route::Post('/new-book', [
    'uses' => 'BookController@newBook',
    'as'   => 'new-book'
]);
Route::get('/edit-book/{id}', [
    'uses' => 'BookController@editBook',
    'as'   => 'edit-book'
]);
Route::post('/update-book/{id}', [
    'uses' => 'BookController@updateBook',
    'as'   => 'update-book'
]);
Route::get('/delete-book/{id}', [
    'uses' => 'BookController@deleteBook',
    'as'   => 'delete-book'
]);


Route::get('/add-news', [
    'uses' => 'NewsController@addNews',
    'as'   => 'add-news'
]);
Route::post('/new-news', [
    'uses' => 'NewsController@newNews',
    'as'   => 'new-news'
]);
Route::get('/edit-news/{id}', [
    'uses' => 'NewsController@editNews',
    'as'   => 'edit-news'
]);
Route::post('/update-news', [
    'uses' => 'NewsController@updateNews',
    'as'   => 'update-news'
]);
Route::get('/delete-news/{id}', [
    'uses' => 'NewsController@deleteNews',
    'as'   => 'delete-news'
]);



Route::get('/add-bangabandhu', [
    'uses' => 'BangabandhuController@addBangabandhu',
    'as'   => 'add-bangabandhu'
]);
Route::Post('/new-bangabandhu', [
    'uses' => 'BangabandhuController@newBangabandhu',
    'as'   => 'new-bangabandhu'
]);
Route::get('/edit-bangabandhu/{id}', [
    'uses' => 'BangabandhuController@editBangabandhu',
    'as'   => 'edit-bangabandhu'
]);
Route::post('/update-bangabandhu', [
    'uses' => 'BangabandhuController@updateBangabandhu',
    'as'   => 'update-bangabandhu'
]);






Route::get('/add-contact', [
    'uses' => 'ContractController@addContact',
    'as'   => 'add-contact'
]);
Route::Post('/new-contact', [
    'uses' => 'ContractController@newContract',
    'as'   => 'new-contact'
]);
Route::get('/edit-contact/{id}', [
    'uses' => 'ContractController@editContract',
    'as'   => 'edit-contact'
]);
Route::post('/update-contact', [
    'uses' => 'ContractController@updateContract',
    'as'   => 'update-contact'
]);



Route::get('/add-event-message', [
    'uses' => 'EventMessageController@addEventMessage',
    'as'   => 'add-event-message'
]);
Route::post('/new-event-message', [
    'uses' => 'EventMessageController@newEventMessage',
    'as'   => 'new-event-message'
]);
Route::get('/edit-event-message/{id}', [
    'uses' => 'EventMessageController@editEventMessage',
    'as'   => 'edit-event-message'
]);
Route::post('/update-event-message', [
    'uses' => 'EventMessageController@updateEventMessage',
    'as'   => 'update-event-message'
]);
Route::get('/delete-event-message/{id}', [
    'uses' => 'EventMessageController@deleteEventMessage',
    'as'   => 'delete-event-message'
]);


Route::get('/add-publication', [
    'uses' => 'PublicationController@addPublication',
    'as'   => 'add-publication'
]);
Route::post('/new-publication', [
    'uses' => 'PublicationController@newPublication',
    'as'   => 'new-publication'
]);
Route::get('/edit-publication/{id}', [
    'uses' => 'PublicationController@editPublication',
    'as'   => 'edit-publication'
]);
Route::post('/update-publication', [
    'uses' => 'PublicationController@updatePublication',
    'as'   => 'update-publication'
]);
Route::get('/delete-publication/{id}', [
    'uses' => 'PublicationController@deletePublication',
    'as'   => 'delete-publication'
]);
Route::get('/publication-details/{id}', [
    'uses' => 'PublicationController@detailsPublication',
    'as'   => 'publication-details'
]);



Route::get('/add-blog', [
    'uses' => 'BlogController@addBlog',
    'as'   => 'add-blog'
]);
Route::post('/new-blog', [
    'uses' => 'BlogController@newBlog',
    'as'   => 'new-blog'
]);
Route::get('/edit-blog/{id}', [
    'uses' => 'BlogController@editBlog',
    'as'   => 'edit-blog'
]);
Route::post('/update-blog', [
    'uses' => 'BlogController@updateBlog',
    'as'   => 'update-blog'
]);
Route::get('/delete-blog/{id}', [
    'uses' => 'BlogController@deleteBlog',
    'as'   => 'delete-blog'
]);



Route::get('/add-video', [
    'uses' => 'YoutubeController@addVideo',
    'as'   => 'add-video'
]);
Route::post('/new-video', [
    'uses' => 'YoutubeController@newVideo',
    'as'   => 'new-video'
]);
Route::get('/delete-video/{id}', [
    'uses' => 'YoutubeController@deleteVideo',
    'as'   => 'delete-video'
]);


Route::get('/book/details/{id}', 'TekasaibdController@bookDetails')->name('book.details');
Route::get('/submit-work', 'WorkController@addWork')->name('submit-work');
//Route::get('/delete-work/{id}', 'WorkController@deleteSubmitWork')->name('delete-work');
Route::get('/delete-work/{id}', [
    'uses' => 'WorkController@deleteSubmitWork',
    'as'   => 'delete-work'
]);

Route::post('/new-work','WorkController@newWork')->name('new-work');
Route::get('/admin/submitted-work','AdminController@submittedWork')->name('admin.submitted.work');


/*End admin*/

/*Font End*/
Route::get('add-front','TekasaibdController@front')->name('add-front');
Route::get('about','TekasaibdController@about')->name('about');
Route::get('contact','TekasaibdController@contact')->name('contact');
Route::get('other','TekasaibdController@other')->name('other');
Route::get('privacy','TekasaibdController@privacy')->name('privacy');
Route::get('tekasaibd','TekasaibdController@tekasaibd')->name('tekasaibd');
Route::get('bangabandhu','TekasaibdController@bangabandhu')->name('bangabandhu');
Route::get('amaderkotha','TekasaibdController@amaderkotha')->name('amaderkotha');
Route::get('blog','TekasaibdController@blog')->name('blog');
Route::get('/blog-details/{id}', [
    'uses' => 'TekasaibdController@detailsBlog',
    'as'   => 'blog-details'
]);
Route::get('/event-details/{id}', [
    'uses' => 'TekasaibdController@detailsEvents',
    'as'   => 'event-details'
]);
Route::post('/send-email', [
    'uses' => 'TekasaibdController@sendEmail',
    'as'   => 'send-email'
]);

include __DIR__.'/exam.php';

Route::get('user/registration','AuthController@register')->name('user.registration');
Route::post('user/registration','AuthController@registerPost')->name('user.registration.post');
Route::get('user/login','AuthController@login')->name('user.login');
Route::post('user/login','AuthController@loginPost')->name('user.login.post');
Route::get('user/logout','AuthController@logout')->name('user.logout')->middleware('user');
Route::get('user/profile','UserController@profile')->name('user.profile')->middleware('user');
Route::get('user/profile/edit','UserController@profileEdit')->name('user.profile.edit')->middleware('user');
Route::get('user/submitted/work','UserController@submittedWork')->name('user.submitted.work')->middleware('user');
Route::post('user/profile/edit','UserController@profileUpdate')->name('user.profile.update')->middleware('user');
Route::post('user/password/edit','UserController@updatePassword')->name('user.password.update')->middleware('user');



/*Font End*/
Route::get('/','TekasaibdController@index' )->name('welcome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
