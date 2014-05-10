<?php

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
		$user->user_appearance_id = 1;
		$user->user_relation_id = 1;
		$user->user_detail_id = 1;
		$user->user_employment_id = 1;
		$user->name = 'Kalle';
		$user->email = 'kalle@kalle.se';
		$user->password = 'asdasd';
		$user->birthYear = 1980;
		$user->isActivated = true;
		$user->isPaused = false;
		$user->token = str_random(50);
		$user->lastLogin = date('Y-m-d H:i:s', time());
		$user->lastActivity = date('Y-m-d H:i:s', time());

		$user->save();
	}

}