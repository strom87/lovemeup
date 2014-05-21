<?php namespace view\userprofile;

use Auth;
use database\User;
use helpers\DropDown;

class DetailsModel {

	public $alcohol;
	public $children;
	public $education;
	public $eyeColor;
	public $hairColor;
	public $pet;
	public $physique;
	public $tobacco;
	public $workStatus;
	public $work;

	public $alcohols;
	public $childrens;
	public $educations;
	public $eyeColors;
	public $hairColors;
	public $pets;
	public $physiques;
	public $tobaccos;
	public $workStatuses;
	public $works;

	public function __construct()
	{
		$user = User::with('userEmployment', 'userDetail', 'userAppearance')->find(Auth::user()->id);

		$this->education = $user->userEmployment->education_id;
		$this->workStatus = $user->userEmployment->work_status_id;
		$this->work = $user->userEmployment->work_id;

		$this->pet = $user->userDetail->pet_id;
		$this->children = $user->userDetail->children_id;
		$this->alcohol = $user->userDetail->alcohol_id;
		$this->tobacco = $user->userDetail->tobacco_id;

		$this->eyeColor = $user->userAppearance->eye_color_id;
		$this->hairColor = $user->userAppearance->hair_color_id;
		$this->physique = $user->userAppearance->physique_id;

		$this->alcohols = DropDown::alcohols();
		$this->childrens = DropDown::childrens();
		$this->educations = DropDown::educations();
		$this->eyeColors = DropDown::eyeColors();
		$this->hairColors = DropDown::hairColors();
		$this->pets = DropDown::pets();
		$this->physiques = DropDown::physiques();
		$this->tobaccos = DropDown::tobaccos();
		$this->workStatuses = DropDown::workStatuses();
		$this->works = DropDown::works();
	}

}