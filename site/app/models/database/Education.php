<?php namespace database;

use Eloquent;

class Education extends Eloquent {

	protected $table = 'educations';

	protected $fillable = array('name');

	public function userEmployments()
	{
		return $this->hasMany('database\UserEmployment', 'education_id', 'id');
	}

}