<?php

class Pet extends Eloquent {

	protected $table = 'pets';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('UserDetail', 'pet_id', 'id');
	}
	
}