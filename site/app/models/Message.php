<?php

class Message extends Eloquent {

	protected $table = 'messages';

	protected $fillable = array('text');

	public function fromUser()
	{
		return $this->hasManyThrough('User', 'UserMessage', 'user_id', 'from_user_id');
	}

	public function toUser()
	{
		return $this->hasManyThrough('User', 'UserMessage', 'user_id', 'to_user_id');
	}
	
}