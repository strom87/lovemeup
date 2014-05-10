<?php

class WorkStatus extends Eloquent {

	protected $table = 'work_statuses';

	protected $fillable = array('name');

	public function userEmployments()
	{
		return $this->hasMany('UserEmployment', 'work_status_id', 'id');
	}
	
}