<?php

class CountrySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Country::truncate();

		//Country::create(['name'=>'Inga']);
	}

}