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
include __DIR__.'/admin/exam.php';
include __DIR__.'/admin/quiz.php';
include __DIR__.'/participant.php';

Route::get('/', 'Website\WebsiteController@home')->name('welcome');

Route::group(['middleware' => ['auth']], function () {

    Route::get('book/question','Admin\BookQuestionController@index')->name('admin.book.question');
    Route::get('book/question/create','Admin\BookQuestionController@create')->name('admin.book.question.create');
    Route::post('book/question/create','Admin\BookQuestionController@store')->name('admin.book.question.store');
    Route::get('book/question/edit/{id}','Admin\BookQuestionController@edit')->name('admin.book.question.edit');
    Route::post('book/question/edit/{id}','Admin\BookQuestionController@update')->name('admin.book.question.update');
    Route::get('book/question/delete/{id}','Admin\BookQuestionController@delete')->name('admin.book.question.delete');



    Route::get('/add-slider', 'SliderController@addSlider')->name('add-slider');
    Route::get('/new-slider', 'SliderController@newSlider')->name('new-slider');
    Route::get('/edit-slider/{id}', 'SliderController@editSlider')->name('edit-slider');
    Route::get('/update-slider', 'SliderController@updateSlider')->name('update-slider');
    Route::get('/delete-slider/{id}', 'SliderController@deleteSlider')->name('delete-slider');


    Route::get('/add-event-video', 'EventVideoController@addEventViedo')->name('add-event-video');
    Route::get('/new-event-video', 'EventVideoController@newEventVideo')->name('new-event-video');
    Route::get('/edit-event-video/{id}', 'EventVideoController@editEventVideo')->name('edit-event-video');
    Route::get('/update-event-video/{id}', 'EventVideoController@updateEventVideo')->name('update-event-video');


    Route::get('/add-about', 'AboutController@addAbout')->name('add-about');
    Route::get('/new-about', 'AboutController@newAbout')->name('new-about');
    Route::get('/edit-about/{id}', 'AboutController@editAbout')->name('edit-about');
    Route::get('/update-about', 'AboutController@updateAbout')->name('update-about');


    Route::get('/add-gallery', 'GalleryController@addGallery')->name('add-gallery');
    Route::get('/new-gallery', 'GalleryController@newGallery')->name('new-gallery');
    Route::get('/edit-gallery/{id}', 'GalleryController@editGallery')->name('edit-gallery');
    Route::get('/update-gallery/{id}', 'GalleryController@updateGallery')->name('update-gallery');
    Route::get('/delete-gallery/{id}', 'GalleryController@deleteGallery')->name('delete-gallery');


    Route::get('/add-book', 'BookController@addBook')->name('add-book');
    Route::get('/create-book', 'BookController@create')->name('create-book');
    Route::get('/new-book', 'BookController@newBook')->name('new-book');
    Route::get('/edit-book/{id}', 'BookController@editBook')->name('edit-book');
    Route::get('/update-book/{id}', 'BookController@updateBook')->name('update-book');
    Route::get('/delete-book', 'BookController@deleteBook')->name('delete-book');


    Route::get('/add-news', 'NewsController@addNews')->name('add-news');
    Route::post('/new-news', 'NewsController@newNews')->name('new-news');
    Route::get('/edit-news/{id}', 'NewsController@editNews')->name('edit-news');
    Route::post('/update-news', 'NewsController@updateNews')->name('update-news');
    Route::get('/delete-news/{id}', 'NewsController@deleteNews')->name('delete-news');



    Route::get('/add-bangabandhu', 'BangabandhuController@addBangabandhu')->name('add-bangabandhu');
    Route::Post('/new-bangabandhu', 'BangabandhuController@newBangabandhu')->name('new-bangabandhu');
    Route::get('/edit-bangabandhu-info', 'BangabandhuController@editBangabandhu')->name('edit-bangabandhu');
    Route::post('/update-bangabandhu', 'BangabandhuController@updateBangabandhu')->name('update-bangabandhu');


    Route::get('/add-contact', 'ContractController@addContact')->name('add-contact');
    Route::Post('/new-contact', 'ContractController@newContract')->name('new-contact');
    Route::get('/edit-contact/', 'ContractController@editContract')->name('edit-contact');
    Route::post('/update-contact', 'ContractController@updateContract')->name('update-contact');



    Route::get('/add-event-message', 'EventMessageController@addEventMessage')->name('add-event-message');
    Route::post('/new-event-message', 'EventMessageController@newEventMessage')->name('new-event-message');
    Route::get('/edit-event-message/{id}', 'EventMessageController@editEventMessage')->name('edit-event-message');


    Route::post('/update-event-message', 'EventMessageController@updateEventMessage')->name('update-event-message');
    Route::get('/delete-event-message/{id}', 'EventMessageController@deleteEventMessage')->name('delete-event-message');


    Route::get('/add-publication', 'PublicationController@addPublication')->name('add-publication');
    Route::post('/new-publication', 'PublicationController@newPublication')->name('new-publication');
    Route::get('/edit-publication/{id}', 'PublicationController@editPublication')->name('edit-publication');
    Route::post('/update-publication', 'PublicationController@updatePublication')->name('update-publication');
    Route::get('/delete-publication/{id}', 'PublicationController@deletePublication')->name('delete-publication');
    Route::get('/publication-details/{id}', 'PublicationController@detailsPublication')->name('publication-details');



    Route::get('/add-blog', 'BlogController@addBlog')->name('add-blog');
    Route::get('/create-blog', 'BlogController@create')->name('create-blog');
    Route::post('/new-blog', 'BlogController@newBlog')->name('new-blog');
    Route::get('/edit-blog/{id}', 'BlogController@editBlog')->name('edit-blog');
    Route::post('/update-blog', 'BlogController@updateBlog')->name('update-blog');
    Route::get('/delete-blog/{id}', 'BlogController@deleteBlog')->name('delete-blog');



    Route::get('/add-video', 'YoutubeController@addVideo')->name('add-video');
    Route::post('/new-video', 'YoutubeController@newVideo')->name('new-video');
    Route::get('/delete-video/{id}', 'YoutubeController@deleteVideo')->name('delete-video');


    Route::get('/delete-work/{id}', 'WorkController@deleteSubmitWork')->name('delete-work');
    Route::get('/admin/submitted-work','AdminController@submittedWork')->name('admin.submitted.work');


    Route::get('/messages', 'Admin\MessageController@index');
    Route::get('/dashboard', 'HomeController@index')->name('home');
});





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
Route::get('/blog-details/{id}', 'TekasaibdController@detailsBlog')->name('blog-details');
Route::get('/event-details/{id}', 'TekasaibdController@detailsEvents')->name('event-details');
Route::get('smash-users','SmashUsersController@index')->name('users-smash');
Route::post('/send-email', 'TekasaibdController@sendEmail')->name('send-email');
Route::get('/book/details/{id}', 'TekasaibdController@bookDetails')->name('book.details');
Route::get('/submit-work', 'WorkController@addWork')->name('submit-work');
Route::post('/new-work','WorkController@newWork')->name('new-work');



/*Font End*/
//Route::get('/','TekasaibdController@index' )->name('welcome');
Auth::routes();


Route::post('/get-social-links', 'Website\SocialShareController@show');
