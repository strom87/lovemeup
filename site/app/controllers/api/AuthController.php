<?php namespace api;

use Input;
use factory\UserFactory;
use auth\Authentication;

class AuthController extends \BaseController {

	protected $authentication;
	protected $userFactory;

	public function __construct(Authentication $a, UserFactory $u)
	{
		$this->authentication = $a;
		$this->userFactory = $u;
	}

	public function postLogin()
	{
		if ($this->authentication->login(Input::all()))
		{
			return ['pass'=>true];
		}

		return $this->authentication->message();
	}

	public function postMakeUser()
	{
		if ($this->userFactory->make(Input::all()))
		{
			return ['pass'=>true];
		}

		return $this->userFactory->messages(); 
	}
}