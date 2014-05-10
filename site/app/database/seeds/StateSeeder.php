<?php

class StateSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		State::truncate();

		//State::create(['name'=>'Inga']);
	}

}