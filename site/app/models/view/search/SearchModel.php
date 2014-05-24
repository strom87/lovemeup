<?php namespace view\search;

use Auth;
use database\User;
use helpers\Basic;
use helpers\DropDown;

class SearchModel {

	public $minage;
	public $maxage;
	public $state;
	public $age;
	public $searchMyAge;
	public $hasProfilePicture;
	public $tobacco;
	public $alcohol;
	public $pet;
	public $children;
	public $physique;
	public $hairColor;
	public $eyeColor;
	public $workStatus;
	public $work;
	public $education;
	public $city;
	public $search;
	public $status;
	public $gender;

	public $ages;
	public $genders;
	public $states;
	public $cities;
	public $searches;
	public $statuses;

	public $childrens;
	public $alcohols;
	public $tobaccos;
	public $pets;

	public $educations;
	public $workStatuses;
	public $works;

	public $eyeColors;
	public $hairColors;
	public $physiques;

	public function __construct($searchValues = null)
	{
		if (is_null($searchValues))
		{
			$this->defaultValues();
		}
		else
		{
			$this->addValues($searchValues);
		}

		$this->age = Basic::calcAge();
		$this->ages = DropDown::ages();
		$this->states = DropDown::states();
		$this->cities = DropDown::cities($this->state);
		$this->searches = DropDown::relationshipSearches();
		$this->statuses = DropDown::relationshipStatuses();
		$this->childrens = DropDown::childrens();
		$this->alcohols = DropDown::alcohols();
		$this->tobaccos = DropDown::tobaccos();
		$this->pets = DropDown::pets();
		$this->educations = DropDown::educations();
		$this->workStatuses = DropDown::workStatuses();
		$this->works = DropDown::works();
		$this->eyeColors = DropDown::eyeColors();
		$this->hairColors = DropDown::hairColors();
		$this->physiques = DropDown::physiques();
		$this->genders = DropDown::genders();
	}

	private function addValues($values)
	{
		$this->minage = $values['minage'];
		$this->maxage = $values['maxage'];
		$this->state = $values['state'];
		$this->gender = $values['gender'];
		$this->searchMyAge = isset($values['search_my_age']);
		$this->hasProfilePicture = isset($values['has_profile_image']);
		$this->tobacco = isset($values['tobacco']) ? $values['tobacco'] : [];
		$this->alcohol = isset($values['alcohol']) ? $values['alcohol'] : [];
		$this->pet = isset($values['pet']) ? $values['pet'] : [];
		$this->children = isset($values['children']) ? $values['children'] : [];
		$this->physique = isset($values['physique']) ? $values['physique'] : [];
		$this->hairColor = isset($values['hair_color']) ? $values['hair_color'] : [];
		$this->eyeColor = isset($values['eye_color']) ? $values['eye_color'] : [];
		$this->workStatus = isset($values['work_status']) ? $values['work_status'] : [];
		$this->work = isset($values['work']) ? $values['work'] : [];
		$this->education = isset($values['education']) ? $values['education'] : [];
		$this->search = isset($values['search']) ? $values['search'] : [];
		$this->status = isset($values['status']) ? $values['status'] : [];
		$this->city = isset($values['city']) ? $values['city'] : [];
	}

	private function defaultValues()
	{
		$user = User::find(Auth::user()->id);

		$this->state = $user->state_id;
		$this->minage = $user->userRelation->minage;
		$this->maxage = $user->userRelation->maxage;
		$this->gender = $user->userRelation->gender_id;
		$this->searchMyAge = false;
		$this->hasProfilePicture = false;
		$this->tobacco = [];
		$this->alcohol = [];
		$this->pet = [];
		$this->children = [];
		$this->physique = [];
		$this->hairColor = [];
		$this->eyeColor = [];
		$this->workStatus = [];
		$this->work = [];
		$this->education = [];
		$this->search = [];
		$this->status = [];
		$this->city = [];
	}

}