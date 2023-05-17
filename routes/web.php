<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Client
Route::group(['middleware' => 'set.cookie'], function() {
    Route::namespace('Client')->prefix('/')->group(function () {
        Route::namespace('Auth')->prefix('auth')->group(function () {
            // Auth
            Route::get('login', 'AuthController@showLogin')->name('auth.show.login');
            Route::post('login', 'AuthController@login')->name('auth.post.login');
            Route::get('register', 'AuthController@showRegister')->name('auth.show.register');
            Route::post('register', 'AuthController@register')->name('auth.post.register');
            Route::get('logout', 'AuthController@logout')->name('auth.logout');
            Route::group(['middleware' => 'check.status.user'], function() {
                Route::get('update-profile', 'AuthController@showUpdateProfile')->name('auth.show.update.profile');
                Route::post('update-profile', 'AuthController@updateProfile')->name('auth.update.profile');
                Route::get('update-password', 'AuthController@showUpdatePassword')->name('auth.show.update.password');
                Route::post('update-password/{id}', 'AuthController@updatePassword')->name('auth.update.password');
            });
        });
        Route::get('oauth/{driver}', 'SocialController@redirectToProvider')->name('client.social.oauth');
        Route::get('oauth/{driver}/callback', 'SocialController@handleProviderCallback')->name('client.social.callback');
        Route::group(['middleware' => 'check.status.user'], function() {
            Route::get('', 'HomeController@index')->name('client.home');
            Route::get('login', 'HomeController@introduce')->name('client.introduce');
            Route::get('wishlist', 'StoryController@showWishlist')->name('client.show.wishlist');
            Route::get('stories', 'StoryController@index')->name('client.story');
            Route::get('upload-story', 'StoryController@showUploadStory')->name('client.show.upload.story');
            Route::post('upload-story', 'StoryController@uploadStory')->name('client.upload.story');
            Route::get('story/show/{id}', 'StoryController@show')->name('client.show.story');
            Route::get('story/edit/{id}', 'StoryController@edit')->name('client.story.edit.form');
            Route::post('story/edit/{id}', 'StoryController@update')->name('client.story.update');
            Route::get('story/delete/{id}', 'StoryController@destroy')->name('client.story.delete');
            Route::get('story/detail/{id}', 'StoryController@detail')->name('client.story.detail');
            Route::get('story/{storyId}/chapter/{chapterId}', 'StoryController@read')->name('client.story.read')->middleware('filter');
            Route::get('story-search','StoryController@search')->name('client.story.search');
            Route::get('story/category/{id}','StoryController@category')->name('client.story.category');
            Route::get('chapters', 'ChapterController@index')->name('client.chapter');
            Route::get('upload-chapter/{storyId}', 'ChapterController@showUploadChapter')->name('client.show.upload.chapter');
            Route::post('upload-chapter/{storyId}', 'ChapterController@uploadChapter')->name('client.upload.chapter');
            Route::get('chapter/show/{id}', 'ChapterController@show')->name('client.show.chapter');
            Route::get('chapter/edit/{id}', 'ChapterController@edit')->name('client.chapter.edit.form');
            Route::post('chapter/edit/{id}', 'ChapterController@update')->name('client.chapter.update');
            Route::get('chapter/delete/{id}', 'ChapterController@destroy')->name('client.chapter.delete');
            Route::get('add-wishlist', 'StoryController@addWishlist');
            Route::post('add-comment','CommentController@store')->name('add.comment');
            Route::post('rating', 'StoryController@rating');
            Route::get('author/{id}', 'HomeController@author')->name('client.author');
            Route::get('follow/author/{id}', 'HomeController@followAuthor')->name('follow.author');
            Route::get('unfollow/author/{id}', 'HomeController@unfollowAuthor')->name('unfollow.author');
            Route::get('notifications', 'NotificationController@index')->name('client.notifications');
            Route::get('mark-all-as-read','NotificationController@markAllAsRead');
            Route::get('mark-as-read','NotificationController@markAsRead');
            Route::get('delete-wishlist/{id}','StoryController@deleteWishlist')->name('client.delete.wishlist');
            Route::get('update-release/{id}/{release}','StoryController@updateRelease')->name('client.update.release');
        });
        Route::get('render','NotificationController@render');
    });
});

// Admin
Route::namespace('Admin')->prefix('ad')->group(function () {
    Route::get('/', function () {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('parentcategory.list');
        } else {
            return redirect()->route('admin.form.login');
        }
        return redirect()->route('admin.form.login');
    });
    // Login, logout
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.form.login');
    Route::post('/login', 'LoginController@login')->name('admin.handle.login');
    Route::get('/logout', 'LoginController@logout')->name('admin.handle.logout');

    Route::group(['middleware' => 'check.admin.login'], function() {
        Route::get('/update-password', 'LoginController@showUpdatePasswordForm')->name('admin.form.update.password');
        Route::post('/update-password/{id}', 'LoginController@updatePassword')->name('admin.handle.update.password');
        Route::get('/update-avatar', 'LoginController@showUpdateAvatarForm')->name('admin.form.update.avatar');
        Route::post('/update-avatar/{id}', 'LoginController@updateAvatar')->name('admin.handle.update.avatar');
        // Dashboard
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        Route::get('filter-dashboard', 'DashboardController@filterDashboard')->name('filter.dashboard');
        // Parent Category
        Route::group(['prefix' => 'parent-category'],function(){
            Route::get('list','ParentCategoryController@index')->name('parentcategory.list');

            Route::get('edit/{id}','ParentCategoryController@edit')->name('parentcategory.edit.form');

            Route::post('edit/{id}','ParentCategoryController@update')->name('parentcategory.edit');

            Route::get('add','ParentCategoryController@create')->name('parentcategory.add.form');

            Route::post('add','ParentCategoryController@store')->name('parentcategory.add');

            Route::get('delete/{id}','ParentCategoryController@destroy')->name('parentcategory.delete');

            Route::get('update-status/{id}/status/{status}','ParentCategoryController@updateStatus')->name('parentcategory.update.status');
        });
        // Category
        Route::group(['prefix' => 'category'],function(){
            Route::get('list','CategoryController@index')->name('category.list');

            Route::get('edit/{id}','CategoryController@edit')->name('category.edit.form');

            Route::post('edit/{id}','CategoryController@update')->name('category.edit');

            Route::get('add','CategoryController@create')->name('category.add.form');

            Route::post('add','CategoryController@store')->name('category.add');

            Route::get('delete/{id}','CategoryController@destroy')->name('category.delete');
        });
        // User
        Route::group(['prefix'=>'user'],function(){
            Route::get('list','UserController@index')->name('user.list');

            Route::get('disable/{id}','UserController@disable')->name('user.disable');

            Route::get('enable/{id}','UserController@enable')->name('user.enable');

            Route::get('show/{id}','UserController@show')->name('user.show');
        });
        // Story
        Route::group(['prefix'=>'story'],function(){
            Route::get('list','StoryController@index')->name('story.list');

            Route::get('show/{id}','StoryController@show')->name('story.show');

            Route::get('update-status/{id}/status/{status}','StoryController@updateStatus')->name('story.update-status');

            Route::get('show/chapter/{id}', 'StoryController@showChapter')->name('story.show.chapter');
        });
        // Comment
        Route::group(['prefix'=>'comment'],function(){
            Route::get('list','CommentController@index')->name('comment.list');
            
            Route::get('delete/{id}','CommentController@destroy')->name('comment.delete');
        });
        // Rating
        Route::group(['prefix' => 'evaluation'],function(){
            Route::get('list','RatingController@index')->name('rating.list');
            Route::get('show/{id}','RatingController@show')->name('rating.show');
        });
    });
});
