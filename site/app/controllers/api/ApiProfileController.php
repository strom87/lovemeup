<?php namespace api;

use Auth;
use Input;
use database\User;
use helpers\Basic;
use image\ImageUpload;
use image\ImageRemove;
use image\ImageToSafeReturn;
use factory\ImageFactory;

class ApiProfileController extends \BaseController {

	protected $imageUpload;
	protected $imageFactory;

	public function __construct(ImageFactory $factory, ImageUpload $image)
	{
		$this->imageUpload = $image;
		$this->imageFactory = $factory;
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

		$safeReturn = new ImageToSafeReturn($this->imageFactory->images);

		return ['message'=>trans('profile.images.success'), 'images'=>$safeReturn];
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

}