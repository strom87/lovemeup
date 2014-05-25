<?php namespace factory;

use database\Message;
use database\UserMessage;
use validator\ValidatorMod;
use validator\ValidatorRules;

class MessageFactory extends ValidatorMod {

	public function __construct()
	{
		parent::__construct();
	}

	public function make($fromUserId, $toUserId, $attributes)
	{
		$this->validate($attributes, ValidatorRules::makeMessage(), false);
		
		if ($this->failed()) return false;

		$message = Message::create([
			'text'=>$attributes['message'],
			'is_read'=>false
		]);

		UserMessage::create([
			'message_id'=>$message->id,
			'from_user_id'=>$fromUserId,
			'to_user_id'=>$toUserId
		]);

		return true;
	}

}