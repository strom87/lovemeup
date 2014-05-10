<?php

class TobaccoSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Tobacco::truncate();

		Tobacco::create(['name'=>'Inget']);
		Tobacco::create(['name'=>'Snusar']);
		Tobacco::create(['name'=>'Röker']);
		Tobacco::create(['name'=>'När det är fest']);
	}

}