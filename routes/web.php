<?php

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
//Route::view('asd','theem1.index');
Route::get('/','TheemController@index');

Auth::routes();

Route::get('/home', 'TheemController@index')->name('home');
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['web', 'admin']], function () {
        ######################################
        #                                    #
        ####### User ROUTE ###################
        #                                    #
        ######################################
        Route::get('/users', 'Admin\UserController@index');
        Route::get('/users/add', 'Admin\UserController@create');
        Route::post('/users/store', 'Admin\UserController@store');
        Route::get('/users/{id}/edit', 'Admin\UserController@edit');
        Route::put('/users/{id}/update', 'Admin\UserController@update');
        Route::put('/users/{id}/changePassword', 'Admin\UserController@changePassword');
        Route::get('/users/{id}/show', 'Admin\UserController@show');
        Route::get('/users/{id}/delete', 'Admin\UserController@destroy');
        ######################################
        #                                    #
        ####### Category ROUTE ###############
        #                                    #
        ######################################
        Route::get('/cats', 'Admin\CategoryController@index');
        Route::get('/cats/add', 'Admin\CategoryController@create');
        Route::post('/cats/store', 'Admin\CategoryController@store');
        Route::get('/cats/{id}/edit', 'Admin\CategoryController@edit');
        Route::put('/cats/{id}/update', 'Admin\CategoryController@update');
        Route::get('/cats/{id}/show', 'Admin\CategoryController@show');
        Route::get('/cats/{id}/delete', 'Admin\CategoryController@destroy');

        ######################################
        #                                    #
        ####### Posts ROUTE ##################
        #                                    #
        ######################################
        Route::get('/posts', 'Admin\PostController@index');
        Route::get('/posts/add', 'Admin\PostController@create');
        Route::post('/posts/store', 'Admin\PostController@store');
        Route::get('/posts/{id}/edit', 'Admin\PostController@edit');
        Route::put('/posts/{id}/update', 'Admin\PostController@update');
        Route::get('/posts/{id}/show', 'Admin\PostController@show');
        Route::get('/posts/{id}/delete', 'Admin\PostController@destroy');
        ######################################
        #                                    #
        ####### Settings Site ################
        #                                    #
        ######################################
        Route::get('/settings/general','SettingController@index');
        Route::put('/settings/general/update','SettingController@generalUpdate');
        Route::get('/settings/social','SettingController@social');
        Route::put('/settings/social/update','SettingController@socialUpdate');
        Route::get('/settings/header','SettingController@header');
        Route::put('/settings/header/update','SettingController@headerUpdate');
        Route::get('/settings/project','SettingController@project');
        Route::put('/settings/project/update','SettingController@projectUpdate');
        Route::get('/settings/slider','SettingController@slider');
        Route::get('/settings/about','SettingController@about');
        Route::put('/settings/slider/update','SettingController@sliderUpdate');
        Route::put('/settings/about/update','SettingController@aboutUpdate');

    });
});

Route::get('/goth','SiteController@index');
Route::get('/project/{id}','TheemController@projects');
Route::get('/news/{id}','TheemController@news');
Route::get('/category/{id}','SiteController@getCat');
Route::get('/post/{id}','TheemController@post');
Route::get('/about','TheemController@about');
Route::post('/send','SiteController@SendEmail');