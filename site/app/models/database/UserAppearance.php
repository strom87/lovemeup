<?php namespace database;

use Eloquent;

class UserAppearance extends Eloquent {

	protected $table = 'user_appearances';

	protected $fillable = array('eye_color_id', 'hair_color_id', 'physique_id');

	public function user()
	{
		return $this->hasOne('database\User', 'id', 'user_id');
	}

	public function eyeColor()
	{
		return $this->belongsTo('database\EyeColor', 'eye_color_id', 'id');
	}

	public function hairColor()
	{
		return $this->belongsTo('database\HairColor', 'hair_color_id', 'id');
	}

	public function physique()
	{
		return $this->belongsTo('database\Physique', 'physique_id', 'id');
	}

}