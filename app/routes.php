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

Route::get('/home', array('as' => 'home', 'before' => 'auth', 'uses' => 'HomeController@home'));
Route::get('/record', array('as' => 'record', 'before' => 'auth', 'uses' => 'HomeController@record'));
Route::get('/{noteId}', array('as' => 'view_note', 'before' => 'auth', 'uses' => 'HomeController@viewNote'))->where('noteId', '[0-9]+');

Route::post('/register', array('as' => 'register', 'before' => 'csrf', 'uses' => 'UserController@register'));
Route::post('/login', array('as' => 'login', 'before' => 'csrf', 'uses' => 'UserController@login'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

