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
//Route::when('*','csrf',['post','put','delete']);

Route::get('/', ['as'=>'home','uses'=>'PostsController@getIndex']);

Route::get('/posts/{slug}', ['as'=>'posts.show','uses'=>'PostsController@getShow']);



Route::get('logout',['as'=>'users.logout','uses'=>'UserController@logout']);



Route::group(['before'=>'auth'], function(){

	Route::get('admin',['as'=>'home.admin','uses'=>'HomeController@admin']);

	Route::get('admin/posts',['as'=>'posts.admin','uses'=>'PostsController@admin']);

	Route::get('admin/posts/{id}',['as'=>'posts.edit','uses'=>'PostsController@edit']);

	Route::post('admin/posts/update/{id}',['as'=>'posts.update','uses'=>'PostsController@update']);

	Route::delete('admin/posts/delete/{id}',['as'=>'posts.delete','uses'=>'PostsController@delete']);

	Route::get('admin/posts/create',['as'=>'posts.create','uses'=>'PostsController@create']);
});


Route::group(['before'=>'guest'], function(){
	
	Route::get('login',['as'=>'users.login','uses'=>'UserController@login']);

	Route::post('check',['as'=>'users.check','uses'=>'UserController@check']);

	Route::get('register',['as'=>'users.register','uses'=>'UserController@register']);

	Route::post('store',['as'=>'users.store','uses'=>'UserController@store']);

});



