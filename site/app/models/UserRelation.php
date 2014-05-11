<?php

class UserRelation extends Eloquent {

	protected $table = 'user_relations';

	protected $fillable = array('gender_id', 'minage', 'maxage');
	
	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');
	}

	public function gender()
	{
		return $this->belongsTo('Gender', 'gender_id', 'id');
	}

	public function relationshipStatus()
	{
		return $this->belongsTo('RelationshipStatus', 'relationship_status_id', 'id');
	}

	public function relationshipSearch()
	{
		return $this->belongsTo('RelationshipSearch', 'relationship_search_id', 'id');
	}

}