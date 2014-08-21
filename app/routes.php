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
Route::get('/{noteId}', array('as' => 'view_note', 'before' => 'auth', 'uses' => 'HomeController@viewNote'))->where('noteId', '[0-9]+');

Route::post('/register', array('as' => 'register', 'before' => 'csrf', 'uses' => 'UserController@register'));
Route::post('/', array('as' => 'login', 'before' => 'csrf', 'uses' => 'UserController@login'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

<<<<<<< HEAD
Route::post('/register', 'UserController@register');

Route::get('/record', function()
{
	return View::make('record');
});

Route::get('/settings', function()
{
	return View::make('settings');
});

Route::get('/note', function()
{
	return View::make('note');
});

Route::get('/{noteId}', function($noteId)
{
	if((Echonote::where('noteId', '=', $noteId)->where('userId', '=', Auth::user()->email)->first())!=null){
		return View::make('note')->with('noteId', $noteId);
	}
	else{
		return Redirect::to('/');
	}
})->where('noteId', '[0-9]+');

Route::post('/record/upload', 'NoteController@upload');

Route::post('/note/share', 'NoteController@share');

Route::post('/note/delete', 'NoteController@delete');

Route::post('/note/deleteAnnotation', 'NoteController@deleteAnnotation');
=======
Route::post('/record/upload', array('as' => 'upload_note', 'uses' => 'NoteController@upload'));
Route::post('/note/share', array('as' => 'share_note', 'before' => 'csrf', 'uses' => 'NoteController@share'));
Route::post('/note/delete', array('as' => 'delete_note', 'before' => 'csrf', 'uses' => 'NoteController@delete'));
Route::post('/note/deleteAnnotation', array('as' => 'delete_annotation', 'before' => 'csrf', 'uses' => 'NoteController@deleteAnnotation'));
>>>>>>> FETCH_HEAD
