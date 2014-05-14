<?php namespace database;

use Eloquent;

class RelationshipStatus extends Eloquent {

	protected $table = 'reletionship_statuses';

	protected $fillable = array('name');

	public function userRelations()
	{
		return $this->hasMany('database\UserRelation', 'relationship_status_id', 'id');
	}

}