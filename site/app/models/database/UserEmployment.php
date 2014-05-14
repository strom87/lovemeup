<?php namespace database;

use Eloquent;

class UserEmployment extends Eloquent {

	protected $table = 'user_employments';

	protected $fillable = array('education_id', 'work_id', 'work_status_id');

	public function user()
	{
		return $this->belongsTo('database\User', 'user_id', 'id');
	}

	public function education()
	{
		return $this->belongsTo('database\Education', 'education_id', 'id');
	}

	public function work()
	{
		return $this->belongsTo('database\Work', 'work_id', 'id');
	}

	public function workStatus()
	{
		return $this->belongsTo('database\WorkStatus', 'work_status_id', 'id');
	}

}