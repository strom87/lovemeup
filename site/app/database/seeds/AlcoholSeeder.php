<?php

class AlcoholSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Alcohol::truncate();

		Alcohol::create(['name'=>'Aldrig']);
		Alcohol::create(['name'=>'När det är fest']);
		Alcohol::create(['name'=>'Några gånger i veckan']);
		Alcohol::create(['name'=>'Varje dag']);
	}

}