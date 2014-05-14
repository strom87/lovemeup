<?php namespace database;

use Eloquent;

class UserDetail extends Eloquent {

	protected $table = 'user_details';

	protected $fillable = array('children_id', 'children_id', 'alcohol_id', 'alcohol_id');

	public function user()
	{
		return $this->belongsTo('database\User', 'user_id', 'id');
	}

	public function children()
	{
		return $this->belongsTo('database\Children', 'children_id', 'id');
	}

	public function pet()
	{
		return $this->belongsTo('database\Pet', 'pet_id', 'id');
	}

	public function alcohol()
	{
		return $this->belongsTo('database\Alcohol', 'alcohol_id', 'id');
	}

	public function tobacco()
	{
		return $this->belongsTo('database\Tobacco', 'tobacco_id', 'id');
	}

}