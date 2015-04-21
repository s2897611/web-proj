<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
  use Codesleeve\Stapler\Stapler;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

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

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
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
  
  public function jobs() 
  {
    return $this->belongsToMany('Job', 'applications')->withPivot('application_date')->withTimestamps();
  }
  
  // sets the format that the image will be saved in and what copies are required
  public function __construct(array $attributes = array()) {
    $this->hasAttachedFile('image', [
    'styles' => [
      'medium' => '300x300',
      'thumb' => '100x100'
      ]
    ]);
    
    parent::__construct($attributes);
  }
  
  
  public static $rules = array(
            
           // checks whether the users email is added and whether it is unique.
           'email' => 'required|unique:users',
    
           // checks whether the users password is included.
           'password' => 'required',
    
           // checks whether the users name is included.
           'name' => 'required'
           );
}
