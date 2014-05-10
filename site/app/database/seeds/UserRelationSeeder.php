<?php

class UserRelationSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		UserRelation::truncate();

		$user = new UserRelation();
		$user->user_id = 1;
		$user->gender_id = 1;
		$user->relationship_search_id = 1;
		$user->relationship_status_id = 1;
		$user->minage = 20;
		$user->maxage = 30;

		$user->save();
	}

}