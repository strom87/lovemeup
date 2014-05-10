<?php

class CitySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		City::truncate();

		//Child::create(['name'=>'Inga']);
	}

}