<?php

class RelationshipSearch extends Eloquent {

	protected $table = 'relationship_searches';

	protected $fillable = array('name');

	public function userRelations()
	{
		return $this->hasMany('UserRelation', 'relationship_search_id', 'id');
	}
	
}