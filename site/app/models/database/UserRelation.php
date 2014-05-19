<?php namespace database;

use Eloquent;

class UserRelation extends Eloquent {

	protected $table = 'user_relations';

	protected $fillable = array('gender_id', 'relationship_search_id', 'relationship_status_id', 'minage', 'maxage');
	
	public function user()
	{
		return $this->belongsTo('database\User', 'user_id', 'id');
	}

	public function gender()
	{
		return $this->belongsTo('database\Gender', 'gender_id', 'id');
	}

	public function relationshipStatus()
	{
		return $this->belongsTo('database\RelationshipStatus', 'relationship_status_id', 'id');
	}

	public function relationshipSearch()
	{
		return $this->belongsTo('database\RelationshipSearch', 'relationship_search_id', 'id');
	}

}