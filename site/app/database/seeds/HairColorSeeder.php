<?php

class HairColorSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		HairColor::truncate();

		HairColor::create(['name'=>'Brun']);
		HairColor::create(['name'=>'Blond']);
		HairColor::create(['name'=>'Röd']);
		HairColor::create(['name'=>'Grå']);
	}

}