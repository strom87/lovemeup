<?php namespace view\auth;

use helpers\DropDown;

class AuthModel {

	public $years;
	public $lengths;
	public $genders;
	public $states;
	public $cities;
	public $statuses;
	public $searches;

	public function __construct()
	{
		$this->years = DropDown::years();
		$this->lengths = DropDown::lengths();
		$this->genders = DropDown::genders();
		$this->states = DropDown::states();
		$this->cities = DropDown::cities();
		$this->statuses = DropDown::relationshipStatuses();
		$this->searches = DropDown::relationshipSearches();
	}

}