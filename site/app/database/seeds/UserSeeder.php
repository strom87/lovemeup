<?php

use database\User;

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::truncate();

		$user = new User();
		$user->country_id = 1;
		$user->state_id = 1;
		$user->city_id = 1;
		$user->gender_id = 1;
		$user->name = 'Kalle';
		$user->email = 'kalle@kalle.se';
		$user->password = 'asdasd';
		$user->length = 190;
		$user->birth_year = 1980;
		$user->accepted_rules = true;
		$user->is_activated = true;
		$user->is_paused = false;
		$user->token = str_random(50);
		$user->description = 'Denna heter kalle';
		$user->last_login_at = date('Y-m-d H:i:s', time());
		$user->last_activity_at = date('Y-m-d H:i:s', time());

		$user->save();
	}

}