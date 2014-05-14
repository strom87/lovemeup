<?php namespace database;

use Eloquent;

class Physique extends Eloquent {

	protected $table = 'physique';

	protected $fillable = array('name');

	public function userAppearances()
	{
		return $this->hasMany('database\UserAppearance', 'physique_id', 'id');
	}

}