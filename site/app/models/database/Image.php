<?php namespace database;

use Eloquent;

class Image extends Eloquent {

	protected $table = 'images';

	protected $fillable = array('name', 'description', 'is_profile', 'is_hidden');

	public function user()
	{
		return $this->belongsTo('database\User', 'user_id', 'id');
	}
	
}