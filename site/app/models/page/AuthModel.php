<?php namespace page;

use helpers\DropDown;

class AuthModel {

	public $years;
	public $lengths;
	public $genders;
	public $statuses;
	public $searches;

	public function __construct()
	{
		$this->years = DropDown::years();
		$this->lengths = DropDown::lengths();
		$this->genders = DropDown::genders();
		$this->statuses = DropDown::relationshipStatuses();
		$this->searches = DropDown::relationshipSearches();
	}

}