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

Route::get('/landing', 'UserController@index');
Route::get('/', 'UserController@home');
Route::get('/app', function()
	{
		return view('app');
	});
Route::post('/register', 'UserController@register');
Route::post('/login','UserController@login');
Route::get('/questions/question/', 'QuestionController@viewQuestion');
Route::get('/questions/congratulations/', 'QuestionController@viewCongratulations');
Route::post('/forum/post','ForumController@post');
