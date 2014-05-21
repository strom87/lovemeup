<?php namespace factory;

use database\User;
use validator\ValidatorMod;
use validator\ValidatorRules;

class UserDetailFactory extends ValidatorMod {

	public function __construct()
	{
		parent::__construct();
	}

	public function update($pid, $attributes)
	{
		$this->validate($attributes, ValidatorRules::updateDetail(), true);
		$this->validate($attributes, ValidatorRules::updateEmployment(), true);
		$this->validate($attributes, ValidatorRules::updateAppearance(), true);

		if ($this->failed()) return false;

		$user = User::find($pid);

		$user->userDetail()->update([
			'children_id'=>$attributes['children'],
			'pet_id'=>$attributes['pet'],
			'alcohol_id'=>$attributes['alcohol'],
			'tobacco_id'=>$attributes['tobacco']
		]);

		$user->userEmployment()->update([
			'education_id'=>$attributes['education'],
			'work_status_id'=>$attributes['work_status'],
			'work_id'=>$attributes['work']
		]);

		$user->userAppearance()->update([
			'eye_color_id'=>$attributes['eye_color'],
			'hair_color_id'=>$attributes['hair_color'],
			'physique_id'=>$attributes['physique']
		]);

		return true;
	}
}