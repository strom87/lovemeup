<?php

class WorkStatusSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		WorkStatus::truncate();

		WorkStatus::create(['name'=>'Arbetar']);
		WorkStatus::create(['name'=>'Studerar']);
		WorkStatus::create(['name'=>'Arbetslös']);
		WorkStatus::create(['name'=>'Pansionerad']);
	}

}