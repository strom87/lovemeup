<?php

class EyeColor extends Eloquent {

	protected $table = 'eye_colors';

	protected $fillable = array('name');

	public function userAppearances()
	{
		return $this->hasMany('UserAppearance', 'eye_color_id', 'id');
	}

}