<?php

class Tobacco extends Eloquent {

	protected $table = 'tobacco';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('UserDetail', 'tobacco_id', 'id');
	}

}