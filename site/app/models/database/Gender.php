<?php namespace database;

use Eloquent;

class Gender extends Eloquent {

	protected $table = 'genders';

	protected $fillable = array('name');

	public function users()
	{
		return $this->hasMany('database\User', 'gender_id', 'id');
	}

	public function userRelations()
	{
		return $this->hasMany('database\UserRelation', 'gender_id', 'id');
	}

}