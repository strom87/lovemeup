<?php

use database\Message;

class MessageSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Message::truncate();

		Message::create(['text'=>'hejsan']);
	}

}