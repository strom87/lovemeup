<?php namespace api;

use Auth;
use Input;
use helpers\Basic;
use image\ImageUpload;
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

		$fileNames = $this->imageUpload->upload(Input::file('photos'), Basic::getUserImagesPath());

		foreach($fileNames as $name)
		{
			$this->imageFactory->make(Auth::user()->id, $name);
		}

		return $fileNames;
	}

}