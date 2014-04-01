<?php

class UserController extends BaseController{

	function register(){
		User::register(Input::get('email'), Input::get('username'), Input::get('password'));
		$this->login();
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