<?php

class RelationshipSearchSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		RelationshipSearch::truncate();

		RelationshipSearch::create(['name'=>'Vänskap']);
		RelationshipSearch::create(['name'=>'Förhållande']);
		RelationshipSearch::create(['name'=>'Kort romans']);
		RelationshipSearch::create(['name'=>'Engångs träff']);
	}

}