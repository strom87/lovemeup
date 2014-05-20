<?php namespace helpers;

use Auth;
use database\User;

class Search {

	public static function byName($name)
	{
		$users = User::where('id', '!=', Auth::user()->id)
					 ->where('name', 'like', "%{$name}%")
					 ->active()
					 ->get();

		return $users;
	}

}