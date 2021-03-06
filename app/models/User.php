<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $softDelete = true;

	public static $passwordAttributes  = array('password');
  	public $autoHashPasswordAttributes = true;

	protected $fillable = array('email', 'name', 'password_confirmation');
	protected $guarded = array('id', 'password');

	public $autoPurgeRedundantAttributes = true;

	public static $rules = array(
		'email' => array('required','email','unique:users,email'),
		'name' => array('required'),
		'password' => array('required', 'min:6', 'confirmed'),
		'password_confirmation' => array('required', 'min:6')
	);

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	public function setAuthPassword($input){
		$this->password = Hash::make($input);
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
		
	public function echonotes(){
		return $this->hasMany('Echonote', 'user_id');
	}
}
