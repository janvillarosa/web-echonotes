<?php

class UserController extends BaseController{

	function register(){
		$user = new User;
		$user->email = Input::get('email');
		$user->name = Input::get('username');
		$user->password = Input::get('password');
		$user->password_confirmation = Input::get('confirm_password');

		if ($user->save())
		{
			$this->login();
		}
		else{
		//note: implement if validation fails
			return $user->errors()->first();
		}

		return Redirect::to('/');
	}

	function updateInfo(){
		$user = Auth::user();

		$user->name = Input::get('name');
		$user->password_confirmation = $user->password;

		if($user->updateUniques()){
			return Redirect::route('settings');
		}
		else{
		//note: implement if validation fails
			return $user->errors()->first();
		}
	}

	function updatePassword(){
		$user = Auth::user();

		if(Hash::check(Input::get('password'), $user->password)) {
				$user->password = Input::get('new_password');
				$user->password_confirmation = Input::get('confirm_password');

				if($user->updateUniques()){
					return Redirect::route('settings');
				}
				else{
				//note: implement if validation fails
					return $user->errors()->first();
				}
		}
		else{
			return "Password Incorrect";
		}
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

	function deactivate(){
		$user = Auth::user();
		if(Hash::check(Input::get('password'), $user->password)) {
			Auth::logout();
			$user->delete();
		}
		return Redirect::to('/');	
	}
}