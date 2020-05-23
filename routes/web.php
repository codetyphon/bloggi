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

Route::get('/', 'UserController@home');
Route::get('login', 'UserController@redirectToProvider');
Route::get('login/callback', 'UserController@handleProviderCallback');

Route::get('/posts', 'PostController@list');
Route::get('/posts/new', 'PostController@new');
Route::get('/posts/{sid}', 'PostController@edit');
Route::put('/posts', 'PostController@save');
Route::delete('/posts', 'PostController@del');

Route::get('/pages', 'PageController@list');
Route::get('/pages/new', 'PageController@new');
Route::get('/pages/{sid}', 'PageController@edit');
Route::put('/pages', 'PageController@save');
Route::delete('/pages', 'PageController@del');

Route::get('/signin', 'UserController@page_signin');
Route::get('/logout', 'UserController@page_logout');
Route::post('/signin', 'UserController@api_signin');
Route::post('/signup', 'UserController@api_signup');

Route::get('/password/new', 'UserController@page_resetpasswd');

Route::get('/settings', 'SettingController@get');
Route::put('/settings', 'SettingController@put');
Route::post('/password', 'UserController@resetpasswd');


Route::get('/explor', 'ViewController@explorer');
Route::get('/{blog_name}', 'ViewController@home');
Route::get('/{blog_name}/post/{slug}', 'ViewController@post');
Route::get('/{blog_name}/page/{slug}', 'ViewController@page');



