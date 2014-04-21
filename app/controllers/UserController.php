<?php

class UserController extends BaseController{

	function register(){
		$email = Input::get('email');
		$name = Input::get('username');
		$password = Input::get('password');
		$cPassword = Input::get('confirm_password');

		$validator = Validator::make(
		    array(
		    	'email' => $email,
		        'name' => $name,
		        'password' => $password,
		        'password_confirmation' => $cPassword
		    ),
		    array(
		    	'email' => 'required|email|unique:users',
		        'name' => 'required',
		        'password' => 'required|min:6|confirmed'
		        'password_confirmation' =>'required'
		    )
		);

		if (!$validator->fails())
		{
			User::register($email, $name, $password);
			$this->login();
		}
		//note: implement if validation fails
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