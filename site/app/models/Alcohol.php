<?php

class Alcohol extends Eloquent {

	protected $table = 'alcohols';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('user_details', 'alcohol_id', 'id');
	}
	
}