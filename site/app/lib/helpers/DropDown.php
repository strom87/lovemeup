<?php namespace helpers;

use helpers\Cache;
use helpers\Basic;
use database\Gender;
use database\State;
use database\City;
use database\RelationshipStatus;
use database\RelationshipSearch;

class DropDown {

	public static function years()
	{
		if (!Cache::has('years_list'))
		{
			$years = [];

			foreach(Basic::getYearsRange() as $year)
			{
				$years[$year] = $year;
			}

			Cache::put('years_list', $years);
		}

		return Cache::get('years_list');
	}

	public static function lengths()
	{
		if (!Cache::has('lengths_list'))
		{
			$lengths = [];

			foreach(Basic::getLengthRange() as $length)
			{
				$lengths[$length] = $length;
			}

			Cache::put('lengths_list', $lengths);
		}

		return Cache::get('lengths_list');
	}

	public static function genders()
	{
		if (!Cache::has('genders_list'))
		{
			$genders = Gender::all()->lists('name', 'id');
			
			Cache::put('genders_list', $genders);
		}

		return Cache::get('genders_list');
	}
	
	public static function relationshipStatuses()
	{
		if (!Cache::has('relationship_statuses_list'))
		{
			$statuses = RelationshipStatus::all()->lists('name', 'id');

			Cache::put('relationship_statuses_list', $statuses);
		}

		return Cache::get('relationship_statuses_list');
	}

	public static function relationshipSearches()
	{
		if (!Cache::has('relationship_searches_list'))
		{
			$searches = RelationshipSearch::all()->lists('name', 'id');

			Cache::put('relationship_searches_list', $searches);
		}

		return Cache::get('relationship_searches_list');
	}

	public static function states()
	{
		if (!Cache::has('states_list'))
		{
			$states = State::orderBy('name')->lists('name', 'id');

			Cache::put('states_list', $states);
		}

		return Cache::get('states_list');
	}

	public static function cities($state_id = null)
	{
		if (!Cache::has('cities_list') || !is_null($state_id))
		{
			if (is_null($state_id))
			{
				$state_id = 1;
			}

			$states = City::where('state_id', $state_id)->orderBy('name')->lists('name', 'id');

			Cache::put('cities_list', $states);
		}

		return Cache::get('cities_list');
	}
}