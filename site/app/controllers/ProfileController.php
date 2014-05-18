<?php

use database\User;
use view\userprofile\ImagesModel;
use view\userprofile\ProfileModel;

class ProfileController extends BaseController {

	protected $imagesModel;
	protected $profileModel;

	public function __construct(ProfileModel $profile, ImagesModel $image)
	{
		$this->imagesModel = $image;
		$this->profileModel = $profile;
	}

	public function getIndex()
	{
		return View::make('profile.index')->with('model', $this->profileModel);
	}

	public function getImages()
	{
		$images = $this->imagesModel->images;
		return View::make('profile.images')->with('images', $this->imagesModel->images);
	}

}