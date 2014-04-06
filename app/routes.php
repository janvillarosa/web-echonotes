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
	if(Auth::check()){
		if(Input::has('q')){
			return View::make('homepage')->with('q', Input::get('q'))->with('tag', null);	
		}
		else if(Input::has('tag')){
			return View::make('homepage')->with('q', null)->with('tag', Input::get('tag'));
		}
		else{
			return View::make('homepage')->with('q', null)->with('tag', null);
		}
	}
	else{
		return View::make('frontpage');
	}
});

Route::post('/', 'UserController@login');

Route::get('/logout', 'UserController@logout');

Route::post('/register', 'UserController@register');

Route::get('/main', function()
{
	return View::make('main');
});

Route::get('/record', function()
{
	return View::make('record');
});

Route::get('/note', function()
{
	return View::make('note');
});

Route::get('/{noteId}', function($noteId)
{
	return View::make('note')->with('noteId', $noteId);
})->where('noteId', '[0-9]+');

Route::get('/demo', function()
{
	return View::make('demo');
});

Route::post('/record/upload', 'NoteController@upload');

Route::get('/imagetest', function()
{
	return View::make('D&DImage');
});

Route::post('/note/share', 'NoteController@share');

Route::post('/note/delete', 'NoteController@delete');

Route::get('/test', function(){
	$note = Echonote::find(1);
	$note->toggleTag('Home');
});
