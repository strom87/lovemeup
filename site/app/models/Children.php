<?php

class Children extends Eloquent {

	protected $table = 'childrens';

	protected $fillable = array('name');

	public function userDetails()
	{
		return $this->hasMany('UserDetail', 'children_id', 'id');
	}
	
}