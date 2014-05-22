<?php namespace view\search;

use helpers\Basic;
use helpers\DropDown;

class SearchModel {

	public $minage;
	public $maxage;
	public $state;
	public $age;

	public $ages;
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

	public function __construct()
	{
		$this->defaultValues();

		$this->age = Basic::calcAge();
		$this->ages = DropDown::ages();
		$this->states = DropDown::states();
		$this->cities = DropDown::cities();
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
	}

	private function defaultValues()
	{
		$this->minage = 18;
		$this->maxage = 100;
		$this->state = 9;
	}

}