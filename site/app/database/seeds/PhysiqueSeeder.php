<?php

use database\Physique;

class PhysiqueSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Physique::truncate();

		Physique::create(['name'=>'Normal']);
		Physique::create(['name'=>'Smal']);
		Physique::create(['name'=>'Vältränad']);
		Physique::create(['name'=>'Lite mullig']);
		Physique::create(['name'=>'Tjock']);
	}

}