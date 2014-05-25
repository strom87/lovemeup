<?php namespace database;

use Eloquent;

class UserMessage extends Eloquent {

	protected $table = 'user_message';

	protected $fillable = array('message_id', 'from_user_id', 'to_user_id');

	public $timestamps = false;
	
}