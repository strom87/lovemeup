<?php

use database\UserDb;

class HomeController extends BaseController {

	public function getIndex()
	{
		return User::find(2)->userRelation;
	}

	public function getMakeUser()
	{
		$data = [
			'gender'=>1,
			'name'=>'Janne',
			'email'=>'janne@janne.se',
			'password'=>'asdasd',
			'birthYear'=>1970,
			'length'=>200,
			'acceptedRules'=>true,
			'partnerGender'=>2,
			'relationshipStatus'=>1,
			'relationshipSearch'=>2,
			'minage'=>18,
			'maxage'=>100
		];

		$u = new UserDb();

		if($u->make($data)) {
			return 'true';
		}

		return var_dump($u->messages());
	}
}
