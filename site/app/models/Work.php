<?php

class Work extends Eloquent {

	protected $table = 'works';

	protected $fillable = array('name');

	public function userEmployments()
	{
		return $this->hasMany('UserEmployment', 'work_id', 'id');
	}
	
}