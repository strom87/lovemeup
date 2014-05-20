<?php

use database\User;
use view\userprofile\ImagesModel;
use view\userprofile\UserProfileModel;

class UserProfileController extends BaseController {

	protected $imagesModel;
	protected $userProfileModel;

	public function __construct(UserProfileModel $profile, ImagesModel $image)
	{
		$this->imagesModel = $image;
		$this->userProfileModel = $profile;
	}

	public function getIndex()
	{
		return View::make('userprofile.index')->with('model', $this->userProfileModel);
	}

	public function getImages()
	{
		$images = $this->imagesModel->images;
		return View::make('userprofile.images')->with('images', $this->imagesModel->images);
	}

}