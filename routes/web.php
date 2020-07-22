<?php

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


View::composer('front.layouts.footer',function ($view) {
    $categories = App\Category::all();
    $view->with('categories',$categories);
});

Route::get('/', 'FrontendController@index')->name('index');


Route::match(['get','post'],'post/{slug}', 'FrontendController@details')->name('details');
Route::match(['get','post'],'All-Post/', 'FrontendController@allpost')->name('allpost');
Route::match(['get','post'],'category/{slug}', 'FrontendController@postbycategory')->name('postbycategory');
Route::match(['get','post'],'tag/{slug}', 'FrontendController@postbytag')->name('postbytag');
Route::match(['get','post'],'/search', 'SearchController@search')->name('search');







//=================================subscriber===========================//
Route::post('/add-subscriber', 'SubscriberController@addsubs')->name('addsubs');
//===================================end subscriber==========================//





Auth::routes();
Route::match(['get','post'],'/admin', 'AdminController@adminlogin')->name('adminlogin');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

Route::match(['get','post'],'/dashboard', 'AdminController@dashboard')->name('dashboard');

//======================================Tag===================================//

Route::match(['get','post'],'add/tag', 'TagController@addtag')->name('addtag');
Route::match(['get','post'],'edit/tag/{id}', 'TagController@edittag')->name('edittag');

Route::get('/delete-tag/{id}','TagController@deletetag');
//======================================End Tag===================================//
//======================================Category===================================//
Route::match(['get','post'],'add/category', 'CategoryController@addcat')->name('addcat');
Route::match(['get','post'],'edit/category/{id}', 'CategoryController@editcat')->name('editcat');

Route::get('/delete-cat/{id}','CategoryController@deletecat');

//====================================== End Category===================================//
//======================================  Post===================================//
Route::match(['get','post'],'add/post', 'PostController@addpost')->name('addpost');
Route::match(['get','post'],'view/post', 'PostController@viewpost')->name('viewpost');
Route::match(['get','post'],'edit/post/{id}', 'PostController@editpost')->name('editpost');
Route::match(['get','post'],'show/post/{id}', 'PostController@showpost')->name('showpost');
Route::match(['get','post'],'post/approve/{id}', 'PostController@approve')->name('approve');
Route::match(['get','post'],'post/pending/', 'PostController@pending')->name('pending');
Route::get('/delete-post/{id}','PostController@deletepost');




//====================================== End Post===================================//

//======================================  Author===================================//
Route::match(['get','post'],'add/author', 'AuthorController@addauthor')->name('addauthor');
Route::match(['get','post'],'view/author', 'AuthorController@viewauthor')->name('viewauthor');
Route::match(['get','post'],'edit/author/{id}', 'AuthorController@editauthor')->name('editauthor');
Route::match(['get','post'],'show/author/{id}', 'AuthorController@showauthor')->name('showauthor');




Route::get('/delete-author/{id}','AuthorController@deleteauthor');




//====================================== End Author===================================//
//====================================== Subscriber=================================//
    Route::get('/view/subscriber', 'SubscriberController@viewsubscriber')->name('viewsubscriber');



    Route::get('/delete-subscriber/{id}', 'SubscriberController@deletesubscriber');

    Route::get('/view/favorite', 'SubscriberController@viewfav')->name('viewfav');
    Route::get('/delete-fav/{id}', 'SubscriberController@deletefav');



//====================================== End Subscriber=================================//
//====================================== Profile=================================//


    Route::match(['get','post'],'profile', 'ProfileController@profile')->name('profile');

    Route::match(['get','post'],'update/profile/{id}', 'ProfileController@updateprofile')->name('updateprofile');
//====================================== End Profile=================================//
//====================================== PAssword=================================//


     // Change Admin Password
    Route::get('/update/password', 'ProfileController@updatePassword')->name('updatePassword');

    // Checking Password
    Route::post('/update/password/check-password', 'ProfileController@chkUserPassword')->name('chkUserPassword');

    // Updating Password
    Route::post('/update/password/{id}', 'ProfileController@updateAdminPassword')->name('updateAdminPassword');
//====================================== End Password=================================//


//====================================== Favorite=================================//
    Route::post('/favorite/{post}/add', 'FavoriteController@addfav')->name('addfav');



//====================================== End Favorite=================================//
    Route::post('/comment/{post}', 'CommentController@comment')->name('comment');
    Route::get('/view/comment', 'CommentController@viewcomment')->name('viewcomment');
    Route::get('/delete-comment/{id}', 'CommentController@deletecomment');














});
Route::get('/logout', 'AdminController@logout')->name('logout');
