<?php

class UserEmployment extends Eloquent {

	protected $table = 'user_employments';

	protected $fillable = array('education_id', 'work_id', 'work_status_id');

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

	public function education()
	{
		return $this->belongsTo('Education', 'education_id', 'id');
	}

	public function work()
	{
		return $this->belongsTo('Work', 'work_id', 'id');
	}

	public function workStatus()
	{
		return $this->belongsTo('WorkStatus', 'work_status_id', 'id');
	}

}