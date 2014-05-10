<?php

class RelationshipStatus extends Eloquent {

	protected $table = 'reletionship_statuses';

	protected $fillable = array('name');

	public function userRelations()
	{
		return $this->hasMany('user_relations', 'relationship_status_id', 'id');
	}

}