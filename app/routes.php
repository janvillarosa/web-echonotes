<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::route('home');
});

Route::get('/', array('as' => 'home', 'before' => 'auth', 'uses' => 'HomeController@home'));
Route::get('/record', array('as' => 'record', 'before' => 'auth', 'uses' => 'HomeController@record'));
Route::get('/settings', array('as' => 'settings', 'before' => 'auth', 'uses' => 'HomeController@settings'));
Route::get('/{noteId}', array('as' => 'view_note', 'before' => 'auth', 'uses' => 'HomeController@viewNote'))->where('noteId', '[0-9]+');
Route::get('note/{noteId}', array('as' => 'get_note', 'before' => 'auth', 'uses' => 'NoteController@getNote'))->where('noteId', '[0-9]+');

Route::post('/register', array('as' => 'register', 'before' => 'csrf', 'uses' => 'UserController@register'));
Route::post('/update_info', array('as' => 'update_info', 'before' => 'csrf', 'uses' => 'UserController@updateInfo'));
Route::post('/update_password', array('as' => 'update_password', 'before' => 'csrf','uses' => 'UserController@updatePassword'));
Route::post('/login', array('as' => 'login', 'before' => 'csrf', 'uses' => 'UserController@login'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
Route::post('/deactivate', array('as' => 'deactivate', 'before' => 'csrf', 'uses' => 'UserController@deactivate'));

Route::post('/record/upload', array('as' => 'upload_note', 'uses' => 'NoteController@upload'));
Route::post('/note/share', array('as' => 'share_note', 'before' => 'csrf', 'uses' => 'NoteController@share'));
Route::post('/note/delete', array('as' => 'delete_note', 'before' => 'csrf', 'uses' => 'NoteController@delete'));
Route::post('/note/deleteAnnotation', array('as' => 'delete_annotation', 'before' => 'csrf', 'uses' => 'NoteController@deleteAnnotation'));
