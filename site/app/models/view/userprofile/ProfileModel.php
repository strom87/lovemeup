<?php namespace view\userprofile;

use Auth;
use database\User;
use helpers\Basic;
use helpers\DropDown;

class ProfileModel {

	public $user;
	public $ages;
	public $years;
	public $lengths;
	public $states;
	public $cities;
	public $genders;
	public $statuses;
	public $searches;
	public $profileImage;

	public function __construct()
	{
		$user = User::with('userRelation')->find(Auth::user()->id);

		$this->user = $user;
		$this->profileImage = Basic::getUserPorfilePicture($user);

		$this->ages = DropDown::ages();
		$this->years = DropDown::years();
		$this->lengths = DropDown::lengths();
		$this->genders = DropDown::genders();
		$this->states = DropDown::states();
		$this->cities = DropDown::cities($user->state_id);
		$this->statuses = DropDown::relationshipStatuses();
		$this->searches = DropDown::relationshipSearches();
	}

}