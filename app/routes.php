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
		return View::make('index');
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

Route::get('/demo', function()
{
	return View::make('demo');
});

Route::post('/record/upload', 'NoteController@upload');

Route::get('/imagetest', function()
{
	return View::make('D&DImage');
});

Route::get('/annotation_test', function()
{
	$annotation = new Textannotation;
	$annotation->content = "Test annotation";
	$annotation->timestamp = 37;
	$annotation->noteid = 1;
	$annotation->save();
	return $annotation->noteid;
});

