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
<<<<<<< HEAD
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

/*test page*/

Route::get('/test_login', function()
{	
	
	if(!Auth::viaRemember()){
		$email = 'rhettbuzon@gmail.com';
		$password = 'qwer1234';
		if(Auth::attempt(array('email' => $email, 'password' => $password),true)){
			return 'logged in';
		}
		else{
			return 'incorrect';
		}
	}
	else{
		return 'already logged in';
	}

=======
	return View::make('frontpage');
});

Route::get('/main', function()
{
	return View::make('main');
>>>>>>> 7ae9f1d92dcdd45a43eb3f95a542ec2e4b600c9b
});