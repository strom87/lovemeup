<?php

use database\User;
use auth\Authentication;
use factory\UserFactory;

class HomeController extends BaseController {
	
	protected $auth;

	public function __construct(Authentication $auth)
	{
		$this->auth = $auth;
	}

	public function getIndex()
	{
		return public_path();
	}


	public function getTestLogin()
	{
		if ($this->auth->login('kalle', 'asdasd'))
		{
			return Auth::check() ? 'IN' : 'OUT';
		}

		$msg = $this->auth->message;
		$in = Auth::check() ? 'IN' : 'OUT';
	}

	public function getMakeUser()
	{
		$data = [
			'gender'=>1,
			'name'=>'Janne',
			'email'=>'janne@janne.se',
			'password'=>'asdasd',
			'password_confirmation'=>'asdasd',
			'birthYear'=>1970,
			'length'=>200,
			'acceptedRules'=>true,
			'partnerGender'=>2,
			'relationshipStatus'=>"",
			'relationshipSearch'=>'',
			'minage'=>18,
			'maxage'=>101
		];

		$u = new UserFactory();

		if($u->make($data)) {
			return 'true';
		}

		return var_dump($u->messages());
	}
}
