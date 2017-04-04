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




Route::get('logout',['as'=>'users.logout','uses'=>'UserController@logout']);



Route::group(['before'=>'admin'], function(){

	Route::get('admin',['as'=>'home.admin','uses'=>'HomeController@admin']);

	Route::get('admin/posts',['as'=>'posts.admin','uses'=>'PostsController@admin']);

	Route::get('admin/posts/{id}',['as'=>'posts.edit','uses'=>'PostsController@edit']);

	Route::post('admin/posts/update/{id}',['as'=>'posts.update','uses'=>'PostsController@update']);

	Route::delete('admin/posts/delete/{id}',['as'=>'posts.delete','uses'=>'PostsController@delete']);

	Route::get('admin/posts/create',['as'=>'posts.create','uses'=>'PostsController@create']);

	Route::get('admin/posts/store',['as'=>'posts.store','uses'=>'PostsController@store']);

	Route::get('admin/comments',['as'=>'comments.admin','uses'=>'CommentsController@admin']);

	Route::delete('admin/comments/delete/{id}',['as'=>'comments.delete','uses'=>'CommentsController@delete']);

	Route::get('admin/users',['as'=>'users.admin','uses'=>'UserController@admin']);

	Route::delete('admin/users/{id}',['as'=>'users.delete','uses'=>'UserController@delete']);

	Route::post('admin/permission/{id}',['as'=>'users.permission','uses'=>'UserController@permission']);

	Route::post('admin/posts/addPost/{id}',['as'=>'posts.addPost','uses'=>'PostsController@addPost']);

	//Route::post('admin/posts/addBrouillon/{id}',['as'=>'posts.addBrouillon','uses'=>'PostsController@addBrouillon']);

	Route::post('admin/users/modifRegister/{id}',['as'=>'users.modifRegister','uses'=>'UserController@modifRegister']);

	Route::get('admin/users/{id}',['as'=>'users.modif','uses'=>'UserController@modif']);


});


Route::group(['before'=>'guest'], function(){
	
	Route::get('login',['as'=>'users.login','uses'=>'UserController@login']);

	Route::post('check',['as'=>'users.check','uses'=>'UserController@check']);

	Route::post('checkTwo',['as'=>'users.checkTwo','uses'=>'UserController@checkTwo']);

	Route::get('register',['as'=>'users.register','uses'=>'UserController@register']);

	Route::post('store',['as'=>'users.store','uses'=>'UserController@store']);

	

});


Route::group(['before'=>'auth'], function(){

	Route::post('posts/{id}/comments/create',['as'=>'comments.create','uses'=>'CommentsController@create']);

	

});