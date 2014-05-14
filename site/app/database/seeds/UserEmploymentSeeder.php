<?php

use database\UserEmployment;

class UserEmploymentSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		UserEmployment::truncate();

		$user = new UserEmployment();
		$user->user_id = 1;
		$user->education_id = 1;
		$user->work_id = 1;
		$user->work_status_id = 1;

		$user->save();
	}

}