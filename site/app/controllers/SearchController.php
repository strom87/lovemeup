<?php

use view\search\ByNameModel;

class SearchController extends BaseController {

	public function getByName($query)
	{
		$model = new ByNameModel($query);

		return View::make('search.index', compact('model'));
	}

}