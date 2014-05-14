<?php namespace database;

use Eloquent;

class EyeColor extends Eloquent {

	protected $table = 'eye_colors';

	protected $fillable = array('name');

	public function userAppearances()
	{
		return $this->hasMany('database\UserAppearance', 'eye_color_id', 'id');
	}

}