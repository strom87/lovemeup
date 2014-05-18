<?php

class ProfileController extends BaseController {

	public function getIndex()
	{
		return View::make('profile.index');
	}

	public function getImages()
	{
		return View::make('profile.images');
	}

}