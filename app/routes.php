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

Route::get('/home', array('as' => 'home', 'before' => 'auth', 'uses' => 'HomeController@home'));

Route::post('/login', array('as' => 'login', 'before' => 'csrf', 'uses' => 'UserController@login'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

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
