<?php

use view\search\SearchModel;
use view\search\ByNameModel;

class SearchController extends BaseController {

	protected $searchModel;

	public function __construct(SearchModel $searchModel)
	{
		//if (Session::has('search_model'))
		//{
		//	$this->searchModel = Session::get('search_model');
		//}
		//else
		//{
			$this->searchModel = $searchModel;
		//}
	}

	public function getIndex()
	{
		return View::make('search.index')->with('model', $this->searchModel);
	}

	public function getByName($query)
	{
		$model = new ByNameModel($query);

		return View::make('search.results', compact('model'));
	}

}