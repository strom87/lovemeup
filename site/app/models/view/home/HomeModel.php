<?php namespace view\home;

use Auth;
use database\User;
use helpers\Basic;

class HomeModel {

	public $users;

	public function __construct()
	{
		$users = User::where('id', '!=', Auth::user()->id)->orderBy('last_login_at', 'desc')->take(9)->get();

		$this->users = [];

		foreach($users as $user)
		{
			$this->users[] = (object) [
				'name'=>$user->name,
				'image'=>Basic::getUserPorfilePicture($user),
				'age'=>Basic::calcAge($user->birth_year),
				'state'=>$user->state->name
			];
		}
	}

}