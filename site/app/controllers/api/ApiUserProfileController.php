<?php namespace api;

use Auth;
use Input;
use database\User;
use helpers\Basic;
use helpers\DropDown;
use image\ImageUpload;
use image\ImageRemove;
use factory\UserFactory;
use factory\ImageFactory;
use factory\UserDetailFactory;
use view\userprofile\ImagesUploadedModel;

class ApiUserProfileController extends \BaseController {

	protected $userFactory;
	protected $imageUpload;
	protected $imageFactory;
	protected $userDetailFactory;

	public function __construct(UserFactory $userFactory, UserDetailFactory $userDetailFactory, ImageFactory $imageFactory, ImageUpload $imageUpload)
	{
		$this->userFactory = $userFactory;
		$this->imageUpload = $imageUpload;
		$this->imageFactory = $imageFactory;
		$this->userDetailFactory = $userDetailFactory;
	}

	public function postEditProfile()
	{
		if ($this->userFactory->update(Auth::user()->id, Input::all()))
		{
			return ['pass'=>true];
		}

		return $this->userFactory->messages();
	}

	public function postEditDetails()
	{
		if ($this->userDetailFactory->update(Auth::user()->id, Input::all()))
		{
			return ['pass'=>true];
		}
		
		return $this->userDetailFactory->messages();
	}

	public function postImagesUpload()
	{
		if (!Input::hasFile('photos')) return 'false';

		if (!$this->imageUpload->validate(Input::file('photos')))
		{
			return 'false';
		}		

		$filenames = $this->imageUpload->upload(Input::file('photos'), Basic::getUserImagesFolderPath());

		foreach($filenames as $name)
		{
			$this->imageFactory->make(Auth::user()->id, $name);
		}

		$model = new ImagesUploadedModel($this->imageFactory->images);

		return ['message'=>trans('profile.images.success'), 'model'=>$model];
	}

	public function postEditImage($imageId)
	{
		if ($this->imageFactory->update(Auth::user()->id, $imageId, Input::all()))
		{
			return ['pass'=>true, 'id'=>$imageId];
		}

		return ['error'=>$this->imageFactory->messages(), 'id'=>$imageId];
	}

	public function postDeleteImage($imageId)
	{
		$image = User::find(Auth::user()->id)->images()->find($imageId);

		ImageRemove::remove(Basic::getUserImagesFolderPath(), $image->name);

		$image->delete();

		return $imageId;
	}

	public function getCities($id)
	{
		return DropDown::cities($id);
	}

}