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


Auth::routes();

Route::group(['namespace'=>'backend'], function (){
    Route::get('/', 'Home@Welcome')->name('front.landing');
    Route::get('/home', 'Home@IndexVideo')->name('home');
    Route::get('category/{id}', 'Home@category')->name('front.category');
    Route::get('skill/{id}','Home@skills')->name('front.skill');
    Route::get('video/{id}','Home@video')->name('front.video');
    Route::get('tag/{id}','Home@tags')->name('front.tags');
    Route::get('contact','Home@contactStore')->name('contact.store');
    Route::get('page/{id}/{slug}','Home@page')->name('front.page');
    Route::get('profile/{id}/{slug}','Home@profile')->name('front.profile');

    Route::middleware('auth')->group(function(){
        Route::post('comments/{id}','Home@commentUpdate')->name('front.commentUpdate');
        Route::post('comments/{id}/create','Home@commentStore')->name('front.commentStore');
        Route::post('profile','Home@profileUpdate')->name('profile.update');

    });

});