<?php namespace api;

use Input;
use database\City;
use dir\Directory;
use factory\UserFactory;
use auth\Authentication;
use mail\MailFactory;

class ApiAuthController extends \BaseController {

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
			$user = $this->userFactory->getUser();
			Directory::createUserDirectory($user->name, public_path());
			MailFactory::sendWelcome($user);
			
			return ['pass'=>true];
		}

		return $this->userFactory->messages(); 
	}

	public function postNewPassword()
	{
		if ($this->userFactory->newPassword(Input::all()))
		{
			MailFactory::sendNewPassword($this->userFactory->getUser(), $this->userFactory->getNewPassword());
		}
	}

	public function postGetCities($id)
	{
		return City::where('state_id', $id)->orderBy('name')->lists('name', 'id');
	}
}