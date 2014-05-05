<?php

class UserController extends BaseController{

	function register(){
		$user = new User;
		$user->email = Input::get('email');
		$user->name = Input::get('username');
		$user->setAuthPassword(Input::get('password'));
		$user->password_confirmation = Input::get('confirm_password');

		if ($user->save())
		{
			$this->login();
		}
		//note: implement if validation fails
		return Redirect::to('/');
	}

	function login(){
		$email = Input::get('email');
		$password = Input::get('password');
		$remembered = Input::get('remembered')=="remembered" ? 'true' : 'false';
		if(Auth::attempt(array('email' => $email, 'password' => $password), $remembered)){
			return Redirect::route('home');
		}
		else{
			return View::make('frontpage')->with('loginError', 'true');
		}
		
	}

	function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
}