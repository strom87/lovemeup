<?php

class HairColor extends Eloquent {

	protected $table = 'hair_colors';

	protected $fillable = array('name');

	public function userAppearances()
	{
		return $this->hasMany('UserAppearance', 'hair_color_id', 'id');
	}

}