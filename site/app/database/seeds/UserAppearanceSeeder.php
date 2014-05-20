<?php

use database\UserAppearance;

class UserAppearanceSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		UserAppearance::truncate();

		$user = new UserAppearance();
		$user->user_id = 1;
		$user->eye_color_id = 1;
		$user->hair_color_id = 1;
		$user->physique_id = 1;

		$user->save();

		$user = new UserAppearance();
		$user->user_id = 2;
		$user->eye_color_id = 1;
		$user->hair_color_id = 1;
		$user->physique_id = 1;

		$user->save();

		$user = new UserAppearance();
		$user->user_id = 3;
		$user->eye_color_id = 1;
		$user->hair_color_id = 1;
		$user->physique_id = 1;

		$user->save();
	}

}