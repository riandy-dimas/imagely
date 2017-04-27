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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('i/{id}', 'HomeController@showImage')->name('singleImage');
Route::get('u/{id}', 'HomeController@showUser');

Route::post('image-upload','ImageController@imageUploadPost');
Route::post('image-delete','ImageController@imageDelete')->name('imageDelete');
Route::post('comment-post','CommentController@commentPost')->name('postComment');
