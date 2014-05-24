<?php namespace api;

use Input;
use Response;
use database\State;

class ApiSearchController extends \BaseController {

	public function getCities($stateId)
	{
		$cities = [];

		foreach(State::with('cities')->find($stateId)->cities()->orderBy('name')->get() as $city)
		{
			$cities[] = (object)[
				'id'=>$city->id,
				'name'=>$city->name
			];
		}

		return ['cities'=>$cities];
	}

}