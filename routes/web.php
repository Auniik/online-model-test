<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BangabandhuController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookQuestionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GalleryPhotoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SmashUsersController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\VideoPreviewController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Website\SocialShareController;
use App\Http\Controllers\Website\WebsiteController;
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

Route::get('/', [WebsiteController::class, 'home'])->name('welcome');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/messages', [MessageController::class, 'index']);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/{setting}', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::resource('team-members', TeamMemberController::class)->except('show');
    Route::resource('sliders', SliderController::class);
    Route::resource('books', BookController::class);
    Route::resource('news-updates', NewsController::class);
    Route::resource('publications', PublicationController::class);
    Route::resource('blogs', BlogController::class);

    Route::get('team-members/{team_member}/highlight', [TeamMemberController::class, 'highlight'])->name('team-members.highlight');


    Route::get('book/question', [BookQuestionController::class, 'index'])->name('admin.book.question');
    Route::get('book/question/create', [BookQuestionController::class, 'create'])->name('admin.book.question.create');
    Route::post('book/question/create',[BookQuestionController::class, 'store'])->name('admin.book.question.store');
    Route::get('book/question/edit/{id}',[BookQuestionController::class, 'edit'])->name('admin.book.question.edit');
    Route::post('book/question/edit/{id}',[BookQuestionController::class, 'update'])->name('admin.book.question.update');
    Route::get('book/question/delete/{id}',[BookQuestionController::class, 'delete'])->name('admin.book.question.delete');


    Route::resource('galleries', GalleryController::class)->except('show');
    Route::resource('videos', VideoController::class)->except('show');

    Route::post('galleries/{gallery}/slider', [GalleryController::class, 'setSlider'])->name('galleries.slider');
    Route::get('galleries/{gallery}/photos', [GalleryPhotoController::class, 'index'])->name('gallery-photos.index');
    Route::post('galleries/{gallery}/photos', [GalleryPhotoController::class, 'store'])->name('gallery-photos.store');
    Route::delete('galleries-photos/{photo}', [GalleryPhotoController::class, 'destroy'])->name('gallery-photos.delete');

    Route::post('/delete-book-image/{id}', [BookController::class, 'deleteBookImage'])->name('delete-book-image');
    Route::get('books/{book}/questions',[BookQuestionController::class, 'index'])->name('book-questions.index');

    Route::get('/bangabandhu-info', [BangabandhuController::class, 'edit'])->name('bangabandhu.edit');
    Route::patch('/bangabandhu-info', [BangabandhuController::class, 'update'])->name('bangabandhu.update');

    Route::get('contacts/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');

    Route::DELETE('/delete-work/{work}', [WorkController::class, 'deleteSubmitWork'])->name('delete-work');
    Route::get('/admin/submitted-work',[AdminController::class, 'submittedWork'])->name('admin.submitted.work');

    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::get('/about/{about}/update', [AboutController::class, 'update'])->name('about.update');
});


/*Font End*/
Route::get('/publication-details/{publication}', [PublicationController::class, 'show'])->name('publication-details');
Route::get('add-front',[WebsiteController::class, 'front'])->name('add-front');
Route::get('about-us',[WebsiteController::class, 'about'])->name('about');
Route::get('contact',[WebsiteController::class, 'contact'])->name('contact');
Route::get('privacy',[WebsiteController::class, 'privacy'])->name('privacy');
Route::get('tekasaibd',[WebsiteController::class, 'about'])->name('tekasaibd');
Route::get('bangabandhu',[WebsiteController::class, 'bangabandhu'])->name('bangabandhu');
Route::get('amaderkotha',[WebsiteController::class, 'amaderkotha'])->name('amaderkotha');
Route::get('blog',[WebsiteController::class, 'blog'])->name('blog');
Route::get('/blog-details/{blog}', [WebsiteController::class, 'detailsBlog'])->name('blog-details');
Route::get('smash-users',[SmashUsersController::class, 'index'])->name('users-smash');
Route::post('/send-email', [WebsiteController::class, 'sendEmail'])->name('send-email');
Route::get('/book/details/{book}', [WebsiteController::class, 'bookDetails'])->name('book.details');
Route::get('/submit-work', [WorkController::class, 'addWork'])->name('submit-work');
Route::post('/new-work',[WorkController::class, 'newWork'])->name('new-work');
Route::get('/team-member/{member}/show',[TeamMemberController::class, 'show'])->name('team-members.show');
Route::get('/gallery',[WebsiteController::class, 'gallery'])->name('gallery.list');
Route::get('/gallery/{gallery}',[GalleryController::class, 'show'])->name('galleries.show');
Route::get('/gallery/{videos}',[VideoPreviewController::class, 'show'])->name('gallery-videos.show');

Route::view('under-construction','front.dump.construction');
Route::view('terms-and-conditions','front.dump.terms-and-conditions');



/*Font End*/
//Route::get('/','TekasaibdController@index' )->name('welcome');
Auth::routes();


Route::post('/get-social-links', [SocialShareController::class, 'show']);
