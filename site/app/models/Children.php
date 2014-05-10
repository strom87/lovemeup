<?php

class Children extends Eloquent {

	protected $table = 'childrens';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('user_details', 'children_id', 'id');
	}
	
}