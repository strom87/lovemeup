<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AlcoholSeeder');
		$this->call('ChildrenSeeder');
		$this->call('EducationSeeder');
		$this->call('CountrySeeder');
		$this->call('StateSeeder');
		$this->call('CitySeeder');
		$this->call('EyeColorSeeder');
		$this->call('HairColorSeeder');
		$this->call('GenderSeeder');
		$this->call('MessageSeeder');
		$this->call('PetSeeder');
		$this->call('PhysiqueSeeder');
		$this->call('TobaccoSeeder');
		$this->call('RelationshipSearchSeeder');
		$this->call('RelationshipStatusSeeder');
		$this->call('WorkSeeder');
		$this->call('WorkStatusSeeder');
		$this->call('UserSeeder');
		$this->call('UserRelationSeeder');
		$this->call('UserDetailSeeder');
		$this->call('UserEmploymentSeeder');
		$this->call('UserAppearanceSeeder');
		//$this->call('');
	}

}
