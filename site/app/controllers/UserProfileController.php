<?php

use database\User;
use view\userprofile\ImagesModel;
use view\userprofile\DetailsModel;
use view\userprofile\UserProfileModel;

class UserProfileController extends BaseController {

	protected $imagesModel;
	protected $detailsModel;
	protected $userProfileModel;

	public function __construct(UserProfileModel $profile, DetailsModel $details, ImagesModel $image)
	{
		$this->imagesModel = $image;
		$this->detailsModel = $details;
		$this->userProfileModel = $profile;
	}

	public function getIndex()
	{
		return View::make('userprofile.index')->with('model', $this->userProfileModel);
	}

	public function getDetails()
	{
		return View::make('userprofile.details')->with('model', $this->detailsModel);
	}

	public function getImages()
	{
		$images = $this->imagesModel->images;
		return View::make('userprofile.images')->with('images', $this->imagesModel->images);
	}

}