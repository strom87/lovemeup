<?php

class EyeColorSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		EyeColor::truncate();

		EyeColor::create(['name'=>'Blåa']);
		EyeColor::create(['name'=>'Bruna']);
		EyeColor::create(['name'=>'Gröna']);
		EyeColor::create(['name'=>'Gula']);
	}

}