<?php namespace database;

use Eloquent;

class Alcohol extends Eloquent {

	protected $table = 'alcohols';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('database\UserDetail', 'alcohol_id', 'id');
	}
	
}