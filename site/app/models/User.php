<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = array('name', 'email', 'password', 'birthYear', 'length', 'token');

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

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function userAppearance()
	{
		return $this->hasOne('UserAppearance', 'id', 'user_appearance_id');
	}

	public function userDetail()
	{
		return $this->hasOne('UserDetail', 'id', 'user_detail_id');
	}

	public function userEmployment()
	{
		return $this->hasOne('UserEmployment', 'id', 'user_employment_id');
	}

	public function userRelation()
	{
		return $this->hasOne('UserRelation', 'id', 'user_relation_id');
	}

	public function gender()
	{
		return $this->belongsTo('Gender', 'gender_id', 'id');
	}

	public function fromUser()
	{
		return $this->hasManyThrough('Message', 'UserMessage', 'message_id', 'from_user_id');
	}

	public function toUser()
	{
		return $this->hasManyThrough('Message', 'UserMessage', 'message_id', 'to_user_id');
	}

}
