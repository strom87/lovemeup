<?php

class Education extends Eloquent {

	protected $table = 'educations';

	protected $fillable = array('name');

	public function userEmployments()
	{
		return $this->hasMany('UserEmployment', 'education_id', 'id');
	}

}