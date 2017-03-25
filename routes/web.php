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

Route::get('/', ['as'=>'home','uses'=>'PostsController@getIndex']);

Route::get('/posts/{slug}', ['as'=>'posts.show','uses'=>'PostsController@getShow']);

Route::get('login',['as'=>'users.login','uses'=>'UserController@login']);

Route::post('check',['as'=>'users.check','uses'=>'UserController@check']);

Route::get('logout',['as'=>'users.logout','uses'=>'UserController@logout']);

Route::get('admin',['as'=>'home.admin','uses'=>'HomeController@admin']);

