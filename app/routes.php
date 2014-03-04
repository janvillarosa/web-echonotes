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

Route::get('/login', function()
{
	return View::make('login');
});

Route::post('/login', 'UserController@login');

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

Route::get('/demo', function()
{
	return View::make('demo');
});

Route::post('/record/upload', function()
{
	$file = Input::file('blob');
	$name = $file->getClientOriginalName();
	$destination = 'upload/';

	$file->move($destination, $name.'.wav');

	$note = new Echonote;

	$note->notename =  $name;
	$note->audiourl = $destination.$name.'.wav';
	$note->userid = Auth::user()->email;

	$note->save();
	return Response::make($note->audiourl);
});