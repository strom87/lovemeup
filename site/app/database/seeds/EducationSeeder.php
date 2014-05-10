<?php

class EducationSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Education::truncate();

		Education::create(['name'=>'Ingen']);
		Education::create(['name'=>'Grundskola']);
		Education::create(['name'=>'Gymnasium']);
		Education::create(['name'=>'Högskola/Universitet']);
	}

}