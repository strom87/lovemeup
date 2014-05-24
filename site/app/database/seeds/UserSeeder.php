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

		$user = new User();
		$user->country_id = 1;
		$user->state_id = 1;
		$user->city_id = 1;
		$user->gender_id = 1;
		$user->name = 'Janne';
		$user->email = 'janne@kjanne.se';
		$user->password = 'asdasd';
		$user->length = 170;
		$user->birth_year = 1970;
		$user->accepted_rules = true;
		$user->is_activated = true;
		$user->is_paused = false;
		$user->token = str_random(50);
		$user->description = 'Denna heter janne';
		$user->last_login_at = date('Y-m-d H:i:s', time());
		$user->last_activity_at = date('Y-m-d H:i:s', time());

		$user->save();

		$user = new User();
		$user->country_id = 1;
		$user->state_id = 1;
		$user->city_id = 1;
		$user->gender_id = 2;
		$user->name = 'Jenna';
		$user->email = 'jenna@jenna.se';
		$user->password = 'asdasd';
		$user->length = 160;
		$user->birth_year = 1991;
		$user->accepted_rules = true;
		$user->is_activated = true;
		$user->is_paused = false;
		$user->token = str_random(50);
		$user->description = 'Denna heter Jenna';
		$user->last_login_at = date('Y-m-d H:i:s', time());
		$user->last_activity_at = date('Y-m-d H:i:s', time());

		$user->save();
	}

}