<?php

use database\UserDetail;

class UserDetailSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		UserDetail::truncate();

		$user = new UserDetail();
		$user->user_id = 1;
		$user->children_id = 1;
		$user->pet_id = 1;
		$user->alcohol_id = 1;
		$user->tobacco_id = 1;

		$user->save();

		$user = new UserDetail();
		$user->user_id = 2;
		$user->children_id = 1;
		$user->pet_id = 1;
		$user->alcohol_id = 1;
		$user->tobacco_id = 1;

		$user->save();

		$user = new UserDetail();
		$user->user_id = 3;
		$user->children_id = 1;
		$user->pet_id = 1;
		$user->alcohol_id = 1;
		$user->tobacco_id = 1;

		$user->save();
	}

}