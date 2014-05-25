<?php

use database\UserMessage;
use view\message\MessageModel;

class MessageController extends BaseController {

	protected $messageModel;

	public function __construct(MessageModel $model)
	{
		$this->messageModel = $model;
	}

	public function getIndex()
	{
		return View::make('message.index')->with('model', $this->messageModel);
	}
}