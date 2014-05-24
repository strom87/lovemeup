<?php namespace view\search;

use helpers\Basic;
use database\State;
use database\City;

class AdvancedModel {

	public $users;

	public function __construct($users)
	{
		$this->users = [];

		$states = State::all();
		$cities = City::all();

		foreach($users as $user)
		{
			$this->users[] = (object) [
				'name'	=> $user->name,
				'age'	=> Basic::calcAge($user->birth_year),
				'image' => Basic::getUserPorfilePictureById($user->id),
				'state' => $states->find($user->state_id)->name,
				'city'	=> $cities->find($user->city_id)->name
			];
		}
	}
}