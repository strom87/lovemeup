<?php namespace database;

use Eloquent;

class Tobacco extends Eloquent {

	protected $table = 'tobacco';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('database\UserDetail', 'tobacco_id', 'id');
	}

}