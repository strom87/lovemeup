<?php namespace view\profile;

use database\User;
use helpers\Basic;

class ProfileModel {

	public $id;
	public $age;
	public $name;
	public $gender;
	public $length;
	public $state;
	public $city;
	public $description;

	public $status;
	public $search;
	public $minage;
	public $maxage;
	public $partnerGender;

	public $eyeColor;
	public $hairColor;
	public $physique;

	public $work;
	public $workStatus;
	public $education;

	public $pet;
	public $children;
	public $alcohol;
	public $tobacco;

	public $images;
	public $profileImage;
	
	public function __construct($id)
	{
		$user = User::find($id);

		$this->id = $user->id;
		$this->name = $user->name;
		$this->gender = $user->gender->name;
		$this->state = $user->state->name;
		$this->city = $user->city->name;
		$this->length = $user->length.' cm';
		$this->description = explode("\n", $user->description);
		$this->age = Basic::calcAge($user->birth_year);

		$uRelation = $user->userRelation;
		$this->status = $uRelation->relationshipStatus->name;
		$this->search = $uRelation->relationshipSearch->name;
		$this->minage = $uRelation->minage;
		$this->maxage = $uRelation->maxage;
		$this->partnerGender = $uRelation->gender->name;

		$uAppearance = $user->userAppearance;
		$this->eyeColor = $uAppearance->eyeColor->name;
		$this->hairColor = $uAppearance->hairColor->name;
		$this->physique = $uAppearance->physique->name;

		$uEmployment = $user->userEmployment;
		$this->work = $uEmployment->work->name;
		$this->workStatus = $uEmployment->workStatus->name;
		$this->education = $uEmployment->education->name;

		$uDetail = $user->userDetail;
		$this->pet = $uDetail->pet->name;
		$this->children = $uDetail->children->name;
		$this->alcohol = $uDetail->alcohol->name;
		$this->tobacco = $uDetail->tobacco->name;

		$this->images = Basic::getUserImagesExceptProfile($user);
		$this->profileImage = Basic::getUserPorfilePicture($user);
	}
}