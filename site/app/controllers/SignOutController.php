<?php

class SignOutController extends BaseController {

	public function getIndex()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}