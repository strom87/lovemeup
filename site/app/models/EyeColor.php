<?php

class EyeColor extends Eloquent {

	protected $table = 'eye_colors';

	protected $fillable = array('name');

	public function userAppearances()
	{
		return $this->hasMany('user_appearances', 'eye_color_id', 'id');
	}

}