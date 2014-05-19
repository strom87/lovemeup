<?php

use view\home\HomeModel;

class HomeController extends BaseController {

	protected $homeModel;

	public function __construct(HomeModel $model)
	{
		$this->homeModel = $model;
	}

	public function getIndex()
	{
		return View::make('home.index')->with('model', $this->homeModel);
	}

}
