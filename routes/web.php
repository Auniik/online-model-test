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

    Route::get('/messages', 'Admin\MessageController@index');
    Route::get('/dashboard', 'HomeController@index')->name('home');

    Route::resource('team-members', 'Admin\TeamMemberController')->except('show');
    Route::resource('sliders', 'SliderController');
    Route::resource('books', 'BookController');
    Route::resource('news', 'NewsController');
    Route::resource('publications', 'PublicationController');
    Route::resource('blogs', 'BlogController');

    Route::get('team-members/{team_member}/highlight', 'Admin\TeamMemberController@highlight')->name('team-members.highlight');


    Route::get('book/question','Admin\BookQuestionController@index')->name('admin.book.question');
    Route::get('book/question/create','Admin\BookQuestionController@create')->name('admin.book.question.create');
    Route::post('book/question/create','Admin\BookQuestionController@store')->name('admin.book.question.store');
    Route::get('book/question/edit/{id}','Admin\BookQuestionController@edit')->name('admin.book.question.edit');
    Route::post('book/question/edit/{id}','Admin\BookQuestionController@update')->name('admin.book.question.update');
    Route::get('book/question/delete/{id}','Admin\BookQuestionController@delete')->name('admin.book.question.delete');




    Route::resource('galleries', 'GalleryController')->except('show');
    Route::resource('videos', 'VideoController')->except('show');

    Route::post('galleries/{gallery}/slider', 'GalleryController@setSlider')->name('galleries.slider');
    Route::get('galleries/{gallery}/photos', 'GalleryPhotoController@index')->name('gallery-photos.index');
    Route::post('galleries/{gallery}/photos', 'GalleryPhotoController@store')->name('gallery-photos.store');
    Route::delete('galleries-photos/{photo}', 'GalleryPhotoController@destroy')->name('gallery-photos.delete');


//    Route::get('/add-gallery', 'GalleryController@addGallery')->name('add-gallery');
//    Route::get('/new-gallery', 'GalleryController@newGallery')->name('new-gallery');
//    Route::get('/edit-gallery/{id}', 'GalleryController@editGallery')->name('edit-gallery');
//    Route::get('/update-gallery/{id}', 'GalleryController@updateGallery')->name('update-gallery');
//    Route::get('/delete-gallery/{id}', 'GalleryController@deleteGallery')->name('delete-gallery');




    Route::post('/delete-book-image/{id}', 'BookController@deleteBookImage')->name('delete-book-image');
    Route::get('books/{book}/questions','Admin\BookQuestionController@index')->name('book-questions.index');

    Route::get('/bangabandhu-info', 'BangabandhuController@edit')->name('bangabandhu.edit');
    Route::patch('/bangabandhu-info', 'BangabandhuController@update')->name('bangabandhu.update');

    Route::get('contacts/edit', 'ContractController@edit')->name('contacts.edit');
    Route::post('contacts/{contact}', 'ContractController@update')->name('contacts.update');

    Route::get('/delete-work/{id}', 'WorkController@deleteSubmitWork')->name('delete-work');
    Route::get('/admin/submitted-work','AdminController@submittedWork')->name('admin.submitted.work');

    Route::get('/about/edit', 'AboutController@edit')->name('about.edit');
    Route::get('/about/{about}/update', 'AboutController@update')->name('about.update');

});





/*End admin*/

/*Font End*/
Route::get('/publication-details/{publication}', 'PublicationController@show')->name('publication-details');
Route::get('add-front','TekasaibdController@front')->name('add-front');
Route::get('about','TekasaibdController@about')->name('about');
Route::get('contact','TekasaibdController@contact')->name('contact');
Route::get('privacy','TekasaibdController@privacy')->name('privacy');
Route::get('tekasaibd','TekasaibdController@tekasaibd')->name('tekasaibd');
Route::get('bangabandhu','TekasaibdController@bangabandhu')->name('bangabandhu');
Route::get('amaderkotha','TekasaibdController@amaderkotha')->name('amaderkotha');
Route::get('blog','TekasaibdController@blog')->name('blog');
Route::get('/blog-details/{blog}', 'TekasaibdController@detailsBlog')->name('blog-details');
Route::get('smash-users','SmashUsersController@index')->name('users-smash');
Route::post('/send-email', 'TekasaibdController@sendEmail')->name('send-email');
Route::get('/book/details/{book}', 'TekasaibdController@bookDetails')->name('book.details');
Route::get('/submit-work', 'WorkController@addWork')->name('submit-work');
Route::post('/new-work','WorkController@newWork')->name('new-work');
Route::get('/team-member/{member}/show','Admin\TeamMemberController@show')->name('team-members.show');
Route::get('/gallery','TekasaibdController@gallery')->name('gallery.list');
Route::get('/gallery/{gallery}','GalleryController@show')->name('galleries.show');

Route::view('under-construction','front.dump.construction');
Route::view('terms-and-conditions','front.dump.terms-and-conditions');



/*Font End*/
//Route::get('/','TekasaibdController@index' )->name('welcome');
Auth::routes();


Route::post('/get-social-links', 'Website\SocialShareController@show');
