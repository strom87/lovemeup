<?php namespace database;

use Eloquent;

class Pet extends Eloquent {

	protected $table = 'pets';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('database\UserDetail', 'pet_id', 'id');
	}
	
}