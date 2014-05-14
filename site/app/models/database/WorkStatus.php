<?php namespace database;

use Eloquent;

class WorkStatus extends Eloquent {

	protected $table = 'work_statuses';

	protected $fillable = array('name');

	public function userEmployments()
	{
		return $this->hasMany('database\UserEmployment', 'work_status_id', 'id');
	}
	
}