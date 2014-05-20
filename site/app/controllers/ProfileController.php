<?php

use database\User;
use helpers\Cache;
use view\profile\ProfileModel;

class ProfileController extends BaseController {

	public function getUser($username)
	{	
		$id = null;

		if (Cache::has($username))
		{
			$id = Cache::get($username);
		}
		else
		{
			$id = User::where('name', $username)->pluck('id');

			if (empty($id))
			{
				return Redirect::to('/');
			}
			else
			{
				Cache::forever($username, $id);
			}
		}


		$model = new ProfileModel($id);

		return View::make('profile.index', compact('model'));
	}

}