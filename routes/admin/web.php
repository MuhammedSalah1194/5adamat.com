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

Route::prefix('admin')->middleware('admin')->group(function(){

    Route::get('/', 'Home@index');
    Route::resource('users','UserController')->except('show');
    Route::resource('categories','CategoriesController')->except('show');
    Route::resource('skills','SkillsController')->except('show');
    Route::resource('tags','TagsController')->except('show');
    Route::resource('pages','PagesController')->except('show');
    Route::resource('videos','VideosController')->except('show');
    Route::resource('contacts','ContactsController')->only(['index', 'destroy','edit']);
    Route::post('comments','VideosController@commentStore')->name('comment.store');
    Route::get('comments/{id}','VideosController@destroyComment')->name('comment.destroy');
    Route::post('comments/{id}','VideosController@editComment')->name('comment.edit');
    Route::post('Contact/Reply/{id}','ContactsController@ReplyContact')->name('contact.reply');
});