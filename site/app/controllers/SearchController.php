<?php

use helpers\Search;
use view\search\SearchModel;
use view\search\ByNameModel;
use view\search\AdvancedModel;

class SearchController extends BaseController {

	protected $searchModel;

	public function __construct(SearchModel $searchModel)
	{
		if (Session::has('search_model'))
		{
			$this->searchModel = new SearchModel(Session::get('search_model'));
		}
		else
		{
			$this->searchModel = new SearchModel();
		}
	}

	public function getIndex()
	{
		return View::make('search.index')->with('model', $this->searchModel);
	}

	public function getByName($name)
	{
		$model = new ByNameModel(Search::byName($name));

		return View::make('search.results', compact('model'));
	}

	public function postAdvanced()
	{
		Session::put('search_model', Input::all());

		$model = new AdvancedModel(Search::advanced(Input::all()));
		return View::make('search.results', compact('model'));
	}

}