<?php

class Gender extends Eloquent {

	protected $table = 'genders';

	protected $fillable = array('name');

	public function users()
	{
		return $this->hasMany('users', 'gender_id', 'id');
	}

	public function userRelations()
	{
		return $this->hasMany('user_relations', 'gender_id', 'id');
	}

}