<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','FrontController@index');
Route::get('notice','FrontController@notice');
Route::get('humor','FrontController@humor');
Route::get('imagen','FrontController@imagen');
Route::get('video','FrontController@video');
Route::get('noticia','FrontController@noticia');
Route::get('resena','FrontController@resena');
Route::get('otro','FrontController@otro');

Route::get('review','FrontController@review');

Route::get('profile','PerfilController@index');
Route::get('profile/photo','PerfilController@photo');
Route::get('profile/edit','PerfilController@edit');
Route::get('profile/password','PerfilControler@password');
Route::get('profile/upload','PerfilController@upload');
Route::get('profile/update','PerfilController@update');

Route::resource('admin','AdminController');
Route::resource('update','UpdatePErfilController');
Route::resource('upload','uploadController');
Route::resource('usuario','UsuarioController');
Route::resource('notice','NoticeController');
Route::resource('log','LogController');
Route::resource('logout','LogController@logout');
Route::resource('comment','CommentController');