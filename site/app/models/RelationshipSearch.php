<?php

class RelationshipSearch extends Eloquent {

	protected $table = 'relationship_searches';

	protected $fillable = array('name');

	public function userRelations()
	{
		return $this->hasMany('user_relations', 'relationship_search_id', 'id');
	}
	
}