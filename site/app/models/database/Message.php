<?php namespace database;

use Eloquent;

class Message extends Eloquent {

	protected $table = 'messages';

	protected $fillable = array('text', 'is_read');

	public function fromUser()
	{
		return $this->hasManyThrough('database\User', 'database\UserMessage', 'user_id', 'from_user_id');
	}

	public function toUser()
	{
		return $this->hasManyThrough('database\User', 'database\UserMessage', 'user_id', 'to_user_id');
	}
	
}