<?php namespace view\search;

use helpers\Basic;
use helpers\Search;

class ByNameModel {

	public $users;

	public function __construct($name)
	{
		$this->users = [];

		foreach(Search::byName($name) as $user)
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