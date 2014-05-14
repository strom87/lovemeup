<?php

use database\User;
use view\AuthModel;
use factory\UserFactory;

class AuthController extends BaseController {

	protected $authModel;
	protected $userFactory;

	public function __construct(AuthModel $model, UserFactory $factory)
	{
		$this->authModel = $model;
		$this->userFactory = $factory;
	}

	public function getIndex()
	{
		return View::make('auth.index')->with('model', $this->authModel);
	}

	public function getActivate($id, $token)
	{
		$success = false;

		try {
			if (User::find($id)->token == $token) {
				$this->userFactory->activate($id);
				$success = true;
			}
		} catch (Exception $e) { }

		return Redirect::to('/')->with('activated', $success);
	}
}
