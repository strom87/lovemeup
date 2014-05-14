<?php

use database\Children;

class ChildrenSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Children::truncate();

		Children::create(['name'=>'Inga']);
		Children::create(['name'=>'Heltid']);
		Children::create(['name'=>'Delad vårdnad']);
		Children::create(['name'=>'Inga vill inte ha']);
		Children::create(['name'=>'Inga men vill ha']);
	}

}
