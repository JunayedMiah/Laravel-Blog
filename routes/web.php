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

//Route::get('/', function () {
    ///return view('pages.index');
//});

Route::get('/','HelloController@index');

Route::get('contact/us','HelloController@contact')->name('contact');
Route::get('about/us','HelloController@about')->name('about');

//category crud are here
Route::get('add_category','BoloController@add_category')->name('add_category');
Route::post('store_category','BoloController@store_category')->name('store_category');
Route::get('all_category','BoloController@all_category')->name('all_category');
Route::get('view/category/{id}','BoloController@view_category');
Route::get('delete/category/{id}','BoloController@delete_category');
Route::get('edit/category/{id}','BoloController@edit_category');
Route::post('update/category/{id}','BoloController@update_category');

//post crude are Here

Route::get('post/us','PostController@post')->name('post');
Route::post('store_post','PostController@store_post')->name('store_post');
Route::get('all_posts','PostController@all_posts')->name('all_posts');
Route::get('view_post/{id}','PostController@view_post');
Route::get('delete_post/{id}','PostController@delete_post');
Route::get('edit_post/{id}','PostController@edit_post');
Route::post('update_post/{id}','PostController@update_post');

///


Route::get('student','StudentController@student')->name('student');
Route::post('store_student','StudentController@store_student')->name('store_student');
Route::get('all_student','StudentController@all_student')->name('all_student');
Route::get('view_student/{id}','StudentController@view_student');
Route::get('delete_student/{id}','StudentController@delete_student');
