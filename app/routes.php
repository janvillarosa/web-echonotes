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
HEAD
HEAD
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
 98ac51edc27f11e989909e6c49a156eef559e57f
 98ac51edc27f11e989909e6c49a156eef559e57f
});

Route::get('/note', function()
{
	return View::make('note');
});