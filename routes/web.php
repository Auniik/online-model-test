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
    Route::get('/settings', 'Admin\SettingController@index')->name('settings.index');
    Route::post('/settings/{setting}', 'Admin\SettingController@update')->name('settings.update');
    Route::get('/dashboard', 'Admin\HomeController@index')->name('home');

    Route::resource('team-members', 'Admin\TeamMemberController')->except('show');
    Route::resource('sliders', 'Admin\SliderController');
    Route::resource('books', 'Admin\BookController');
    Route::resource('news-updates', 'Admin\NewsController');
    Route::resource('publications', 'Admin\PublicationController');
    Route::resource('blogs', 'Admin\BlogController');

    Route::get('team-members/{team_member}/highlight', 'Admin\TeamMemberController@highlight')->name('team-members.highlight');


    Route::get('book/question','Admin\BookQuestionController@index')->name('admin.book.question');
    Route::get('book/question/create','Admin\BookQuestionController@create')->name('admin.book.question.create');
    Route::post('book/question/create','Admin\BookQuestionController@store')->name('admin.book.question.store');
    Route::get('book/question/edit/{id}','Admin\BookQuestionController@edit')->name('admin.book.question.edit');
    Route::post('book/question/edit/{id}','Admin\BookQuestionController@update')->name('admin.book.question.update');
    Route::get('book/question/delete/{id}','Admin\BookQuestionController@delete')->name('admin.book.question.delete');


    Route::resource('galleries', 'Admin\GalleryController')->except('show');
    Route::resource('videos', 'Admin\VideoController')->except('show');

    Route::post('galleries/{gallery}/slider', 'Admin\GalleryController@setSlider')->name('galleries.slider');
    Route::get('galleries/{gallery}/photos', 'Admin\GalleryPhotoController@index')->name('gallery-photos.index');
    Route::post('galleries/{gallery}/photos', 'Admin\GalleryPhotoController@store')->name('gallery-photos.store');
    Route::delete('galleries-photos/{photo}', 'Admin\GalleryPhotoController@destroy')->name('gallery-photos.delete');

    Route::post('/delete-book-image/{id}', 'Admin\BookController@deleteBookImage')->name('delete-book-image');
    Route::get('books/{book}/questions','Admin\BookQuestionController@index')->name('book-questions.index');

    Route::get('/bangabandhu-info', 'Admin\BangabandhuController@edit')->name('bangabandhu.edit');
    Route::patch('/bangabandhu-info', 'Admin\BangabandhuController@update')->name('bangabandhu.update');

    Route::get('contacts/edit', 'Admin\ContactController@edit')->name('contacts.edit');
    Route::post('contacts/{contact}', 'Admin\ContactController@update')->name('contacts.update');

    Route::DELETE('/delete-work/{work}', 'Admin\WorkController@deleteSubmitWork')->name('delete-work');
    Route::get('/admin/submitted-work','Admin\AdminController@submittedWork')->name('admin.submitted.work');

    Route::get('/about/edit', 'Admin\AboutController@edit')->name('about.edit');
    Route::get('/about/{about}/update', 'Admin\AboutController@update')->name('about.update');
});





/*End admin*/

/*Font End*/
Route::get('/publication-details/{publication}', 'Admin\PublicationController@show')->name('publication-details');
Route::get('add-front','Website\WebsiteController@front')->name('add-front');
Route::get('about-us','Website\WebsiteController@about')->name('about');
Route::get('contact','Website\WebsiteController@contact')->name('contact');
Route::get('privacy','Website\WebsiteController@privacy')->name('privacy');
Route::get('tekasaibd','Website\WebsiteController@about')->name('tekasaibd');
Route::get('bangabandhu','Website\WebsiteController@bangabandhu')->name('bangabandhu');
Route::get('amaderkotha','Website\WebsiteController@amaderkotha')->name('amaderkotha');
Route::get('blog','Website\WebsiteController@blog')->name('blog');
Route::get('/blog-details/{blog}', 'Website\WebsiteController@detailsBlog')->name('blog-details');
Route::get('smash-users','Admin\SmashUsersController@index')->name('users-smash');
Route::post('/send-email', 'Website\WebsiteController@sendEmail')->name('send-email');
Route::get('/book/details/{book}', 'Website\WebsiteController@bookDetails')->name('book.details');
Route::get('/submit-work', 'Admin\WorkController@addWork')->name('submit-work');
Route::post('/new-work','Admin\WorkController@newWork')->name('new-work');
Route::get('/team-member/{member}/show','Admin\TeamMemberController@show')->name('team-members.show');
Route::get('/gallery','Website\WebsiteController@gallery')->name('gallery.list');
Route::get('/gallery/{gallery}','Admin\GalleryController@show')->name('galleries.show');
Route::get('/gallery/{videos}','Admin\VideoPreviewController@show')->name('gallery-videos.show');

Route::view('under-construction','front.dump.construction');
Route::view('terms-and-conditions','front.dump.terms-and-conditions');



/*Font End*/
//Route::get('/','TekasaibdController@index' )->name('welcome');
Auth::routes();


Route::post('/get-social-links', 'Website\SocialShareController@show');
