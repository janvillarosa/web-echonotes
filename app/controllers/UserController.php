<?php

class UserController extends BaseController{

	function register(){
		$user = new User;
		$user->email = Input::get('email');
		$user->name = Input::get('username');
		$user->setAuthPassword(Input::get('password'));
		$user->save();
		Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')));
		return Redirect::to('/');
	}

	function login(){
		$email = Input::get('email');
		$password = Input::get('password');
		Auth::attempt(array('email' => $email, 'password' => $password));
		return Redirect::to('/');
		//Implement redirect to incorrect error
	}

	function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
}