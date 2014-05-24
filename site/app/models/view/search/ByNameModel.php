<?php namespace view\search;

use helpers\Basic;

class ByNameModel {

	public $users;

	public function __construct($names)
	{
		$this->users = [];

		foreach($names as $user)
		{
			$this->users[] = (object) [
				'name'	=> $user->name,
				'age'	=> Basic::calcAge($user->birth_year),
				'image' => Basic::getUserPorfilePicture($user),
				'state' => $user->state->name,
				'city'	=> $user->city->name
			];
		}
	}
}