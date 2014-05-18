<?php namespace view\userprofile;

use Auth;
use database\User;
use helpers\Basic;
use helpers\DropDown;

class ProfileModel {

	public $user;
	public $profileImage;
	
	public $years;


	public function __construct()
	{
		$user = User::find(Auth::user()->id);

		$this->user = $user;
		$this->profileImage = Basic::getUserPorfilePicture($user);
		$this->years = DropDown::years();
	}

}