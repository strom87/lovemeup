<?php

class PetSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Pet::truncate();

		Pet::create(['name'=>'Inget']);
		Pet::create(['name'=>'Hund']);
		Pet::create(['name'=>'Katt']);
		Pet::create(['name'=>'Hästar']);
		Pet::create(['name'=>'Annat']);
	}

}