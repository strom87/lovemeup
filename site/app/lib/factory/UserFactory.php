<?php namespace factory;

use database\User;
use database\UserDetail;
use database\UserRelation;
use database\UserAppearance;
use database\UserEmployment;
use validator\ValidatorMod;
use validator\ValidatorRules;

class UserFactory extends ValidatorMod {

	private $user;
	private $password;

	public function __construct()
	{
		parent::__construct();
		
		$this->user = null;
		$this->password = null;
	}

	public function make(array $attributes)
	{
		$this->validate($attributes, ValidatorRules::makeUser(), true);
		$this->validate($attributes, ValidatorRules::makeRelationship(), true);
		
		if ($this->failed()) return false;

		$user = new User([
			'state_id'=>$attributes['state'],
			'city_id'=>$attributes['city'],
			'gender_id'=>$attributes['gender'],
			'name'=>$attributes['name'],
			'email'=>$attributes['email'],
			'password'=>$attributes['password'],
			'birth_year'=>$attributes['birth_year'],
			'length'=>$attributes['length'],
			'accepted_rules'=>isset($attributes['accepted_rules']),
			'token'=>str_random(50)
		]);

		$uRelation = new UserRelation([
			'gender_id'=>$attributes['partner_gender'],
			'relationship_status_id'=>$attributes['relationship_status'],
			'relationship_serch_id'=>$attributes['relationship_search'],
			'minage'=>18,
			'maxage'=>100
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

		$this->user = $user;

		return true;
	}

	public function newPassword(array $attribute)
	{
		$this->validate($attribute, ValidatorRules::newPassword(), false);
		
		if ($this->failed()) return false;

		$this->password = str_random(10);

		$id = User::where('email', $attribute['email'])->pluck('id');
		$user = User::find($id);
		$user->password = $this->password;
		$user->save();

		$this->user = $user;

		return true;
	}

	public function activate($id)
	{
		$user = User::find($id);
		$user->is_activated = true;
		$user->save();

		$this->user = $user;
	}

	public function pause($id, $status)
	{
		$user = User::find($id);
		$user->is_paused = $status;
		$user->save();

		$this->user = $user;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function getNewPassword()
	{
		return $this->password;
	}

}