<?php

class GenderSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Gender::truncate();

		Gender::create(['name'=>'Man']);
		Gender::create(['name'=>'Kvinna']);
	}

}