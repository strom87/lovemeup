<?php

class Physique extends Eloquent {

	protected $table = 'physique';

	protected $fillable = array('name');

	public function userAppearances()
	{
		return $this->hasMany('UserAppearance', 'physique_id', 'id');
	}

}