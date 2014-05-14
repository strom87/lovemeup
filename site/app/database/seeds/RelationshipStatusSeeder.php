<?php

use database\RelationshipStatus;

class RelationshipStatusSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		RelationshipStatus::truncate();

		RelationshipStatus::create(['name'=>'Singel']);
		RelationshipStatus::create(['name'=>'I förhållande']);
		RelationshipStatus::create(['name'=>'Gift']);
		RelationshipStatus::create(['name'=>'I öppet förhållande']);
	}

}