<?php

use database\State;

class StateSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		State::truncate();

		State::create(array('country_id'=>1, 'name'=>'Stockholms län'));
		State::create(array('country_id'=>1, 'name'=>'Uppsala län'));
		State::create(array('country_id'=>1, 'name'=>'Södermanlands län'));
		State::create(array('country_id'=>1, 'name'=>'Östergötlands län'));
		State::create(array('country_id'=>1, 'name'=>'Jönköpings län'));
		State::create(array('country_id'=>1, 'name'=>'Kronobergs län'));
		State::create(array('country_id'=>1, 'name'=>'Kalmar län'));
		State::create(array('country_id'=>1, 'name'=>'Gotlands län'));
		State::create(array('country_id'=>1, 'name'=>'Blekinge län'));
		State::create(array('country_id'=>1, 'name'=>'Skåne län'));
		State::create(array('country_id'=>1, 'name'=>'Hallands län'));
		State::create(array('country_id'=>1, 'name'=>'Västra Götalands län'));
		State::create(array('country_id'=>1, 'name'=>'Värmlands län'));
		State::create(array('country_id'=>1, 'name'=>'Örebro län'));
		State::create(array('country_id'=>1, 'name'=>'Västmanlands län'));
		State::create(array('country_id'=>1, 'name'=>'Dalarnas län'));
		State::create(array('country_id'=>1, 'name'=>'Gävleborgs län'));
		State::create(array('country_id'=>1, 'name'=>'Västernorrlands län'));
		State::create(array('country_id'=>1, 'name'=>'Jämtlands län'));
		State::create(array('country_id'=>1, 'name'=>'Västerbottens län'));
		State::create(array('country_id'=>1, 'name'=>'Norrbottens län'));
	}

}