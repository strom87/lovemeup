<?php

class UserAppearance extends Eloquent {

	protected $table = 'user_appearances';

	// protected $fillable = array('name');

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

	public function eyeColor()
	{
		return $this->belongsTo('EyeColor', 'eye_color_id', 'id');
	}

	public function hairColor()
	{
		return $this->belongsTo('HairColor', 'hair_color_id', 'id');
	}

	public function physique()
	{
		return $this->belongsTo('Physique', 'physique_id', 'id');
	}

}