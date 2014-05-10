<?php

class Tobacco extends Eloquent {

	protected $table = 'tobacco';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('user_details', 'tobacco_id', 'id');
	}

}