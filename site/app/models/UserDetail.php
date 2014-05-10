<?php

class UserDetail extends Eloquent {

	protected $table = 'user_details';

	protected $fillable = array();

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

	public function children()
	{
		return $this->belongsTo('Children', 'children_id', 'id');
	}

	public function pet()
	{
		return $this->belongsTo('Pet', 'pet_id', 'id');
	}

	public function alcohol()
	{
		return $this->belongsTo('Alcohol', 'alcohol_id', 'id');
	}

	public function tobacco()
	{
		return $this->belongsTo('Tobacco', 'tobacco_id', 'id');
	}

}