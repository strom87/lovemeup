<?php namespace database;

use User;
use UserDetail;
use UserRelation;
use UserAppearance;
use UserEmployment;
use validator\ValidatorMod;
use validator\ValidatorRules;

class UserDb extends ValidatorMod {

	public function make(array $attributes)
	{
		if (!$this->validate($attributes, ValidatorRules::makeUser(), null, true) || 
			!$this->validate($attributes, ValidatorRules::makeRelationship(), null, true)) {
			return false;
		}

		$user = new User([
			'gender_id'=>$attributes['gender'],
			'name'=>$attributes['name'],
			'email'=>$attributes['email'],
			'password'=>$attributes['password'],
			'birthYear'=>$attributes['birthYear'],
			'length'=>$attributes['length'],
			'acceptedRules'=>$attributes['acceptedRules']
		]);

		$uRelation = new UserRelation([
			'gender_id'=>$attributes['partnerGender'],
			'relationship_status_id'=>$attributes['relationshipStatus'],
			'relationship_serch_id'=>$attributes['relationshipSearch'],
			'minage'=>$attributes['minage'],
			'maxage'=>$attributes['maxage']
		]);

		$uDetail = new UserDetail([
			'children_id'=>1,
			'pet_id'=>1,
			'alcohol_id'=>1,
			'tobacco_id'=>1
		]);

		$uEmployment = new UserEmployment([
			'education_id'=>1,
			'work_id'=>1,
			'work_status_id'=>1
		]);

		$uAppearance = new UserAppearance([
			'eye_color_id'=>1,
			'hair_color_id'=>1,
			'physique_id'=>1
		]);

		$user->save();
		$user->userDetail()->save($uDetail);
		$user->userEmployment()->save($uEmployment);
		$user->userAppearance()->save($uAppearance);
		$user->userRelation()->save($uRelation);

		return true;
	}

}