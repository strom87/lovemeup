<?php namespace api;

use Input;
use Auth;
use factory\MessageFactory;

class ApiProfileController extends \BaseController {

	protected $messageFactory;

	public function __construct(MessageFactory $messageFactory)
	{
		$this->messageFactory = $messageFactory; 
	}

	public function postSendMessage()
	{
		if ($this->messageFactory->make(Auth::user()->id, Input::get('id'), Input::all()))
		{
			return ['pass'=>true];
		}

		return $this->messageFactory->messages();
	}

}