<?php

class WorkSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Work::truncate();

		Work::create(['name'=>'IT']);
		Work::create(['name'=>'Vården']);
		Work::create(['name'=>'Ekonomi']);
		Work::create(['name'=>'Lärare']);
	}

}