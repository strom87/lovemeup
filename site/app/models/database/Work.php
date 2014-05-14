<?php namespace database;

use Eloquent;

class Work extends Eloquent {

	protected $table = 'works';

	protected $fillable = array('name');

	public function userEmployments()
	{
		return $this->hasMany('database\UserEmployment', 'work_id', 'id');
	}
	
}