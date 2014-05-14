<?php namespace database;

use Eloquent;

class Children extends Eloquent {

	protected $table = 'childrens';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('database\UserDetail', 'children_id', 'id');
	}
	
}