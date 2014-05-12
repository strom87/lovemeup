<?php

use page\AuthModel;

class AuthController extends BaseController {

	protected $authModel;

	public function __construct(AuthModel $model)
	{
		$this->authModel = $model;
	}

	public function getIndex()
	{
		return View::make('auth.index')->with('model', $this->authModel);
	}
}
