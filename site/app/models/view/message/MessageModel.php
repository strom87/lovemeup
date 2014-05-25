<?php namespace view\message;

use helpers\Basic;
use message\MessageCollector;

class MessageModel {

	public $users;
	public $latestUser;
	public $hasMessages;
	public $messages;


	public function __construct()
	{
		$this->latestUser = MessageCollector::getLatestMessagesUser();

		$this->hasMessages = !is_null($this->latestUser);

		if(!$this->hasMessages) return;

		$this->messages = MessageCollector::getMessages($this->latestUser);

		$this->users = MessageCollector::getMessagedUser();

		foreach($this->users as $user)
		{
			$user->profileimage = Basic::getUserImagesPathHtml($user->name, $user->profileimage);
		}
	}

}